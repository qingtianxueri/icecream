<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermDeleteTask extends SDFHookTask {

    public function deleteTerm(SDFTerm $term);
}