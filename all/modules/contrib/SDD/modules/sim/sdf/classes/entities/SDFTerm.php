<?php

namespace sdf\entities;

use stdClass;

class SDFTerm extends SDFEntity {
    
    public function __construct() {
        $this->type = 'taxonomy_term';
        parent::__construct();
    }

    protected function init() {
        $this->data = new stdClass();
    }

    protected function load($tid) {
        $term = taxonomy_term_load($tid);
        if ($term) {
        	$this->data = $term;
        }
    }

    public function getTid() {
        return $this->wrapper->tid->value();
    }

    /**
     * If the entity exists (usually checked entity id, such as nid, tid, uid, etc...)
     *
     * @return boolean
     */
    public function exists() {
        return $this->getTid() > 0;
    }
}
