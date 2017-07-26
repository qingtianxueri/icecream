<?php

use sdf\factories\SDFStructFactory;
use sdf\structs\SDFClassStruct;
use sdf\utils\SDFStr;

function sdf_struct_form() {
    $form = array();
    SDFStr::load('admin');

    $form['project_module_name'] = array(
        '#type' => 'textfield',
        '#title' => SDFStr::get('TITLE_PROJECT_MODULE_NAME'),
        '#description' => SDFStr::get('DESC_PROJECT_MODULE_NAME'),
        '#required' => TRUE,
        '#default_value' => variable_get('project_module_name'),
        '#maxlength' => 20,
    );

    $form['project_class_prefix'] = array(
        '#type' => 'textfield',
        '#title' => SDFStr::get('TITLE_PROJECT_CLASS_PREFIX'),
        '#description' => SDFStr::get('DESC_PROJECT_CLASS_PREFIX'),
        '#required' => TRUE,
        '#default_value' => variable_get('project_class_prefix'),
        '#maxlength' => 5,
    );

    /* $form['project_field_prefix'] = array(
        '#type' => 'fieldset',
        '#title' => SDFStr::get('TITLE_PROJECT_FIELD_PREFIX'),
    ); */

    $form['#submit'][] = 'sdf_struct_form_submit';
    return system_settings_form($form);
}

function sdf_struct_form_submit($form, $state) {

    $values = $state['values'];
    $module = strtolower($values['project_module_name']);
    $classPrefix = strtoupper($values['project_class_prefix']);

    $factory = new SDFStructFactory();
    $types = array(
        'folder',
        'node',
        'term',
        //'user',
    );
    foreach ($types as $type) {
        $struct = $factory->createStruct($type);
        if ($type != 'folder') {
            /** @var SDFClassStruct $struct */
            $struct->setClassPrefix($classPrefix);
        }
        $struct->setModule($module);
        $struct->createStruct();
    }

    // If no exception/error happens, things going well.
    $msg = SDFStr::get('MSG_MODULE_STRUCT_CREATED', array('!module' => $module));
    drupal_set_message($msg);
}
