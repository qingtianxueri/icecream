<?php


namespace sdf\hooks\interfaces;


interface SDFHookNodeLoad extends SDFHook {

    /**
     * @param array $nodes
     *      An array of the nodes being loaded, keyed by nid.
     * @param array $types
     *      An array containing the node types present in $nodes.
     *      Allows for an early return for modules that only support certain node types.
     *      However, if your module defines a content type, you can use hook_load()
     *      to respond to loading of just that content type.
     * @return void
     */
    public function invokeNodeLoad($nodes, $types);
}