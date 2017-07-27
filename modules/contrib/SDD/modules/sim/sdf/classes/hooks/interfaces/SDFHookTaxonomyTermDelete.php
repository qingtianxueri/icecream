<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermDelete extends SDFHookOp {

    public function invokeTaxonomyTermDelete(SDFTerm $term);
}