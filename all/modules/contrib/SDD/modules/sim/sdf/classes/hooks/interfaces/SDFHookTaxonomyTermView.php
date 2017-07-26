<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermView extends SDFHookOp {

    public function invokeTaxonomyTermView(SDFTerm $term, $viewMode, $langCode);
}