<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermUpdate extends SDFHookOp {

    public function invokeTaxonomyTermUpdate(SDFTerm $term);
}