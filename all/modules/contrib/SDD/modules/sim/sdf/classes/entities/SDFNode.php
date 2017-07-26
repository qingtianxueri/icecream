<?php

namespace sdf\entities;

use stdClass;

class SDFNode extends SDFEntity {

	/**
	 * Author of the node
	 * @var SDFUser
	 */
	protected $user;

    function __construct() {
		$this->type = 'node';
		$this->nameField = 'title';
		parent::__construct();
    }


    protected function init() {
		$node = new stdClass();
		$user = new SDFUser();
		$node->uid = $user->getUid();
		$node->type = $this->bundle;
		$node->bundle = $this->bundle;
		$this->data = $node;
	}

	protected function load($nid) {
		$node = node_load($nid);
		if ($node) {
			$this->data = $node;
			$this->bundle = $node->type;
		}
	}

    /**
     * If the entity exists (usually checked entity id, such as nid, tid, uid, etc...)
     *
     * @return boolean
     */
    public function exists() {
        return $this->getNid() > 0;
    }


    public function getNid() {
		return $this->wrapper->nid->value();
	}

	public function getTitle() {
		return $this->wrapper->title->value();
	}

	public function setTitle($value) {
		$this->wrapper->title->set($value);
	}

	public function getBody() {
		return $this->wrapper->body->value->value();
	}

	public function setBody($value) {
		$this->wrapper->body->value->set($value);
	}

}
