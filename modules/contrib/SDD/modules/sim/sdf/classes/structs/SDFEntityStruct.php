<?php

namespace sdf\structs;

use sdf\consts\SDFConst;
use sdf\exceptions\SDFStructException;
use sdf\utils\SDFStr;

abstract class SDFEntityStruct extends SDFClassStruct {

    /**
     * Entity type
     *
     * @var string
     */

    protected $type;

    /**
     * The module name of the entity
     * Used to call hook_entity_info
     *
     * @var string
     */
    protected $entityModule;

    /**
     * Project module
     *
     * @var string
     */
    protected $module;

    /**
     * The base class name, like Node, Term, User
     *
     * @var string
     */
    protected $baseClass;

    /**
     * Fields of the entity
     *
     * @var array (bundle => SDFFieldStruct)
     */
    protected $fields;

    /**
     * Class prefix
     *
     * @var string
     */
    protected $classPrefix;

    /**
     * Field prefix
     *
     * @var string
     */
    protected $fieldPrefix;

    /**
     * Excluded bundles.
     *
     * @var array
     */
    protected $excludes = array(
        'content_block',
        'content_page',
        'homepage',
        'landing_page',
        'webform'
    );

    public function __construct($type, $entityModule, $class) {
        $this->type = $type;
        $this->entityModule = $entityModule;
        $this->baseClass = $class;
        $this->loadEntityInfo();
    }

    public function setClassPrefix($prefix) {
        $this->classPrefix = $prefix;
    }

    public function setFieldPrefix($prefix) {
        $this->fieldPrefix = $prefix;
    }

    /**
     * Load entity info
     *
     * @throws SDFStructException
     * @return void
     */
    protected function loadEntityInfo() {
        $type = $this->type;
        $module = $this->entityModule;
        $info = module_invoke($module, 'entity_info');
        if (empty($info)) {
            $error = SDFStr::get('EXCEPTION_ENTITY_INFO_NOT_FOUND', array(
                '!type' => $type
            ));
            throw new SDFStructException($error);
        }

        $bundles = $info[$type]['bundles'];
        foreach ($this->excludes as $ex) {
            if (isset($bundles[$ex])) {
                unset($bundles[$ex]);
            }
        }
        foreach ($bundles as $bundle => $unused) {
            $this->loadBundleInfo($bundle);
        }
    }

    /**
     * Load bundle info, must loadEntityInfo first
     *
     * @param string $bundle Bundle name
     */
    protected function loadBundleInfo($bundle) {
        $type = $this->type;
        $fields = field_info_instances($type, $bundle);
        foreach ($fields as $name => $info) {
            // No need for default body field.
            if ($name == 'body') {
                continue;
            }

            $field = new SDFFieldStruct($name);
            $field->setPrefix($this->fieldPrefix);
            $field->loadFieldInfo();
            $field->setInfoInstance($info);
            $this->fields[$bundle][] = $field;
        }
    }

    /**
     * If the entity has real bundle.
     * For user entity, drupal default user has no bundle,
     * we use user roles to create classes as replacement of bundle.
     *
     * @return boolean
     */
    protected function hasBundle() {
        return TRUE;
    }

    /**
     * Build a set of literal classes
     *
     * @throws SDFStructException
     */
    public function createStruct() {
        $this->requirement();
        $this->createBaseClass();
        if (empty($this->fields)) {
            return;
        }
        foreach ($this->fields as $bundle => $fields) {
            $this->createEntityClass($bundle, $fields);
            $this->createBusinessClass($bundle, $fields);
        }
    }

    protected function createBaseClass() {

        $prefix = SDFStr::toClass($this->classPrefix);
        $baseClass = SDFStr::toClass($this->baseClass);
        $filebase = SDFConst::ROOT_PROJECT . '/' . $this->module;

        // Base classes do not overwrtie.
        $filename = "$filebase/classes/entities/base/{$prefix}{$baseClass}.php";
        if (file_exists($filename)) {
            return;
        }

        // Create base class
        $out = "<?php \n\n";
        $out .= "class {$prefix}{$baseClass} extends SDF{$baseClass} {\n\n";
        $out .= "    public function __construct() {\n";
        $out .= "        parent::__construct();\n";
        $out .= "    }\n\n";
        $out .= "}\n\n";
        file_put_contents($filename, $out);
    }

    protected function createEntityClass($bundle, $fields) {
        $prefix = SDFStr::toClass($this->classPrefix);
        $baseClass = SDFStr::toClass($this->baseClass);
        $filebase = SDFConst::ROOT_PROJECT . '/' . $this->module;
        $class = SDFStr::toClass($bundle);
        $folder = strtolower($baseClass) . 's';
        // Build the classes for bundles.
        $out = "<?php \n\n";
        $out .= "require_once '{$this->module}/classes/entities/base/{$prefix}{$baseClass}.php';";
        $out .= "\n\n";
        $out .= "class {$prefix}{$class}{$baseClass} extends {$prefix}{$baseClass} {\n\n";
        $out .= "    public function __construct() {\n";
        if ($this->hasBundle()) {
            $out .= "        \$this->bundle = '{$bundle}';\n";
        }
        $out .= "        parent::__construct();\n";
        $out .= "    }\n\n";
        foreach ($fields as $field) {
            /* @var $field SDFFieldStruct */
            $getter = $field->toGetter();
            $setter = $field->toSetter();
            $out .= $getter . "\n";
            $out .= $setter . "\n";
        }
        $out .= "}\n";
        $filename = "{$filebase}/classes/entities/{$folder}/{$prefix}{$class}{$baseClass}.php";
        file_put_contents($filename, $out);
    }

    protected function createBusinessClass($bundle, $fields) {

        $prefix = SDFStr::toClass($this->classPrefix);
        $baseClass = SDFStr::toClass($this->baseClass);
        $filebase = SDFConst::ROOT_PROJECT . '/' . $this->module;
        $class = SDFStr::toClass($bundle);
        $folder = strtolower($baseClass) . 's';

        // Business classes do not overwrite.
        $filename = "{$filebase}/classes/business/{$folder}/{$prefix}{$class}{$baseClass}Business.php";
        if (file_exists($filename)) {
            return;
        }

        // Build the classes for bundle for business logic.
        $out = "<?php \n\n";
        $out .= "require_once '{$this->module}/classes/entities/{$folder}/{$prefix}{$class}{$baseClass}.php';";
        $out .= "\n\n";
        $out .= "class {$prefix}{$class}{$baseClass}Business extends {$prefix}{$class}{$baseClass} {\n\n";
        $out .= "    public function __construct() {\n";
        $out .= "        parent::__construct();\n";
        $out .= "    }\n\n";
        $out .= "}\n";
        file_put_contents($filename, $out);
    }

}
