<?php

namespace sdf\structs;

use sdf\utils\SDFStr;

class SDFFieldStruct {

    /**
     * Field name
     *
     * @var string
     */
    protected $name;

    /**
     * Field instance info, loaded from field_info_instance().
     *
     * @var array
     */
    protected $infoInstance;

    /**
     * Field info, loaded from field_info_field().
     *
     * @var array
     */
    protected $infoField;

    /**
     * Field prefix
     *
     * @var string
     */
    protected $prefix;

    public function __construct($name) {
        $this->name = $name;
    }

    public function loadFieldInfo() {
        $name = $this->name;
        $this->infoField = field_info_field($name);
    }

    public function toGetter() {
        $name = $this->getName();
        $getname = $this->getCamelName();
        $out = "    public function get{$getname}() {\n";
        $out .= "        return \$this->wrapper->{$name}->value();\n";
        $out .= "    }\n";
        return $out;
    }

    public function toSetter() {
        $name = $this->getName();
        $setname = $this->getCamelName();
        $out = "    public function set{$setname}(\$value) {\n";
        $out .= "        \$this->wrapper->{$name}->set(\$value);\n";
        $out .= "    }\n";
        return $out;
    }

    public function getName() {
        return $this->infoInstance['field_name'];
    }

    public function getLabel() {
        return $this->infoInstance['label'];
    }

    public function getEntityType() {
        return $this->infoInstance['entity_type'];
    }

    public function getBundle() {
        return $this->infoInstance['bundle'];
    }

    public function getRefBundle() {
        $bundles = $this->infoField['settings']['handler_settings']['target_bundles'];
        $bundle = $this->getBundle();
        return $bundles[$bundle];
    }

    public function getRefType() {
        return $this->infoField['settings']['handler_settings']['target_type'];
    }

    public function setInfoInstance($infoInstance) {
        $this->infoInstance = $infoInstance;
    }

    public function setPrefix($prefix) {
        $this->prefix = $prefix;
    }

    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Get the function style(camel case) name, like FieldName.
     * The provided field prefix will be removed.
     * For example: "field_st_test", "st" as prefix, then "field_st" will be removed,
     * the final name will be "Test".
     * If no prefix provided, "field_" will be removed.
     *
     * @return string
     */
    protected function getCamelName() {
        $name = $this->getName();
        $prefix = $this->getPrefix();
        $replace = 'field_' . $prefix;
        if (strstr($name, $replace)) {
            $fname = str_replace($replace, '', $name);
        } else {
            $fname = str_replace('field_', '', $name);
        }
        $fname = SDFStr::toClass($fname);
        return $fname;
    }
}
