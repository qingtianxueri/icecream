<?php


namespace sdf\hooks\hookimpls;


use sdf\hooks\interfaces\SDFHookMenu;

class SDFCoreHookMenuImpl implements SDFHookMenu {

    public function invokeMenu() {
        return array(
            'admin/sdf/struct' => array(
                'title' => 'SDF Struct',
                'page callback' => 'drupal_get_form',
                'page arguments' => array('sdf_struct_form'),
                'access arguments' => array('administer content types'),
                'file' => 'includes/admin/admin.sdf_struct.inc'
            ),
        );
    }
}