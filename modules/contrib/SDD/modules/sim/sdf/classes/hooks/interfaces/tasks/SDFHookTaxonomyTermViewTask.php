<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermViewTask extends SDFHookTask {

    public function viewTerm(SDFTerm $term, $viewMode, $langCode);
}