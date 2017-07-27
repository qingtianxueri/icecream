<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermUpdateTask extends SDFHookTask {

    public function updateTerm(SDFTerm $term);
}