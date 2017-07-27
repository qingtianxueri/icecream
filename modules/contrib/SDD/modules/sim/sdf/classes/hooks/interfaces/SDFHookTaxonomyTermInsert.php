<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermInsert extends SDFHookOp {

    public function invokeTaxonomyTermInsert(SDFTerm $term);
}