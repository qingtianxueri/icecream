<?php

namespace sdf\structs;

class SDFNodeStruct extends SDFEntityStruct {

    public function __construct() {
        parent::__construct('node', 'node', 'Node');
    }

}