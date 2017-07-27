<?php

namespace sdf_example\hookimpls;

use sdf\hooks\interfaces\SDFHookMenu;

class SDFExampleHookMenuImpl implements SDFHookMenu {

    public function invokeMenu() {

        $items = array();

        // Example taken from SDF temp page.
        $items['admin/sdf/example'] = array(
            'title' => 'Example',
            'description' => 'SDF Example page',
            'page callback' => 'sdf_example_page_example',
            'access arguments' => array(
                'administer content types'
            ),
            'file' => 'includes/pages/page.example.inc'
        );

        return $items;

    }

}
