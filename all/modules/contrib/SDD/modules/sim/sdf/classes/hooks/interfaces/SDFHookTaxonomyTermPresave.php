<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermPresave extends SDFHookOp {

    public function invokeTaxonomyTermPresave(SDFTerm $term);
}