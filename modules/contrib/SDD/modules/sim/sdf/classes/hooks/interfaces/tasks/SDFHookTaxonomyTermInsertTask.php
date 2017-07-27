<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermInsertTask extends SDFHookTask {

    public function insertTerm(SDFTerm $term);
}