<?php

namespace sdf\factories;

use sdf\exceptions\SDFStructException;
use sdf\structs\SDFFolderStruct;
use sdf\structs\SDFNodeStruct;
use sdf\structs\SDFStruct;
use sdf\structs\SDFTermStruct;
use sdf\structs\SDFUserStruct;

class SDFStructFactory extends SDFFactory {

    /**
     * Create an entity struct
     *
     * @param string $name Name of struct
     *
     * @throws \sdf\exceptions\SDFStructException
     * @return SDFStruct
     */
    public function createStruct($name) {
        switch ($name) {
            case 'node':
                return new SDFNodeStruct();
                break;
            case 'term':
                return new SDFTermStruct();
                break;
            case 'user':
                return new SDFUserStruct();
                break;
            case 'folder':
                return new SDFFolderStruct();
                break;
            default:
                throw new SDFStructException('Struct name ' . $name . ' is not found.');
        }
    }

}
