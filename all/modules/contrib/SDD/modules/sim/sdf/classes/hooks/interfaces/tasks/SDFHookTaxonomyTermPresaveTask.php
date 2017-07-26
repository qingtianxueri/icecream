<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFTerm;

interface SDFHookTaxonomyTermPresaveTask extends SDFHookTask {

    public function presaveTerm(SDFTerm $term);
}