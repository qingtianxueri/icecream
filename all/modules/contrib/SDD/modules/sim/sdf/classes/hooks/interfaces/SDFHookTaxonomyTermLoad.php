<?php


namespace sdf\hooks\interfaces;


interface SDFHookTaxonomyTermLoad extends SDFHook {

    /**
     * @param array $terms An array of term objects, indexed by tid.
     * @return void
     */
    public function invokeTaxonomyTermLoad($terms);
}