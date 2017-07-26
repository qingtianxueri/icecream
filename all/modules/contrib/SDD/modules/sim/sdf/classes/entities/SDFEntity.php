<?php

namespace sdf\entities;

use EntityDrupalWrapper;
use EntityFieldQuery;
use sdf\exceptions\SDFEntityException;
use stdClass;

abstract class SDFEntity {

    /**
     * Entity wrapper
     *
     * @var EntityDrupalWrapper
     */

    protected $wrapper;

    /**
     * Entity type
     *
     * @var string
     */
    protected $type;

    /**
     * Entity bundle
     *
     * @var string
     */
    protected $bundle;

    /**
     * The field for the entity name. Default to "name".
     * e.g. node field "title" is its name, term field "name" is its name.
     *
     * @var string
     */
    protected $nameField = 'name';

    /**
     * Drupal entity object
     *
     * @var stdClass
     */
    protected $data;

    public function __construct() {

    }

    /**
     * Init the entity object.
     */
    protected abstract function init();

    /**
     * Load the entity object. Returns the object itself ($this)
     *
     * @param integer $id Id of the entity.
     *
     * @return SDFEntity
     */
    protected abstract function load($id);

    /**
     * If the entity exists (usually checked entity id, such as nid, tid, uid, etc...)
     *
     * @return boolean
     */
    public abstract function exists();

    /**
     * Load entity by id
     *
     * @param integer $id
     * @param bool $throwsIfNoResult
     *      Throws SDFEntityException if no result matches,
     *      this is good that you know what you are searching for,
     *      and you are responsible for the result.
     *      Set this to FALSE if you are sure that the conditions can be no result.
     *
     * @throws SDFEntityException
     *
     * @return SDFEntity
     */
    public function loadById($id, $throwsIfNoResult = TRUE) {
        if (!is_integer($id)) {
            throw new SDFEntityException("Invalid entity id, expected integer, actual $id");
        }

        $this->load($id);
        $this->initWrapper();
        if (!$this->exists() && $throwsIfNoResult) {
            throw new SDFEntityException('No result found by id: ' . $id);
        }
        return $this;
    }

    /**
     * Load entity by name
     *
     * @param string $name
     * @param bool $throwsIfNoResult
     *      Throws SDFEntityException if no result matches,
     *      this is good that you know what you are searching for,
     *      and you are responsible for the result.
     *      Set this to FALSE if you are sure that the conditions can be no result.
     *
     * @throws SDFEntityException
     * @see loadByConditions
     *
     * @return SDFEntity
     */
    public function loadByName($name, $throwsIfNoResult = TRUE) {
        if (!is_string($name)) {
            throw new SDFEntityException("Invalid entity name, expected string, actual $name");
        }

        // Drupal 7 provides some function like _load_multiple with a parameter $conditions,
        // thus we can simply pass $name to $conditions,
        // but, this _load_multiple function is deprecated, and will be removed in Drupal 8.
        // Recommanded way to load with conditions is using EntityFieldQuery.
        $conditions = array();
        // If bundle is set, search name within this bundle.
        if ($this->bundle) {
            $conditions['type'] = $this->bundle;
        }
        $conditions[$this->nameField] = $name;
        $this->loadByConditions($conditions, $throwsIfNoResult);
        return $this;
    }

    /**
     * Load by Drupal entity object.
     *
     * @param stdClass $entity
     * @return $this
     */
    public function loadByDrupalEntity(stdClass $entity) {
        $this->data = $entity;
        $this->initWrapper();
        return $this;
    }

    /**
     * Case from other SDF Entity in the same entity type.
     * This usually used to cast from super class of entity to subclass of entity.
     * This simulates class cast from Java except that this cast is not type-safe.
     *
     * @param SDFEntity $entity
     * @throws SDFEntityException
     * @return $this
     */
    public function loadBySDFEntity(SDFEntity $entity) {
        $from = $entity->getType();
        $to = $this->getType();
        if ($from != $to) {
            $e = "Case from different entity type (from $from to $to) is disallowed.";
            throw new SDFEntityException($e);
        }
        $this->loadByDrupalEntity($entity->getData());
        return $this;
    }

    /**
     * Load entities by conditions.
     *
     * @param array $conditions A set of key-value conditions
     * @param bool $throwsIfNoResult
     *      Throws SDFEntityException if no result matches,
     *      this is good that you know what you are searching for,
     *      and you are responsible for the result.
     *      Set this to FALSE if you are sure that the conditions can be no result.
     *
     * @throws SDFEntityException
     *
     * @return SDFEntity
     */
    public function loadByConditions(array $conditions, $throwsIfNoResult = TRUE) {
        $query = new EntityFieldQuery();
        $query = $query->entityCondition('entity_type', $this->type);
        foreach ($conditions as $key => $value) {
            $query = $query->propertyCondition($key, $value);
        }
        $results = $query->execute();
        if (empty($results) && $throwsIfNoResult) {
            throw new SDFEntityException('No result found by conditions: ' . json_encode($conditions));
        }
        $results = array_keys($results[$this->type]);
        $this->load($results[0]);
        $this->initWrapper();
        return $this;
    }

    /**
     * Init the entity object to be ready for creation.
     */
    public function create() {
    	$this->data = new stdClass();
        $this->init();
        $this->initWrapper();
    }

    /**
     * Save the entity object.
     */
    public function save() {
        $this->wrapper->save();
    }

    /**
     * Delete the entity object.
     */
    public function delete() {
        $this->wrapper->delete();
    }

    protected function initWrapper() {
    	$this->wrapper = entity_metadata_wrapper($this->type, $this->data);
    }

    public function getBundle() {
        if (!$this->bundle) {
            $this->bundle = $this->wrapper->getBundle();
        }
        return $this->bundle;
    }

    public function getType() {
        return $this->type;
    }

    public function getData() {
        return $this->data;
    }

}
