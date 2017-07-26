<?php

require_once drupal_get_path('module', MODULE_NAME) . '/src/YAMLConfigSettings.php';

function c2dTheme_preprocess_views_view_table(&$vars) {
  $yaml_settings = new YAMLConfigSettings;
  $yaml_settings->load(drupal_get_path('module', MODULE_NAME) . '/yml/c2dIdlimit.yml');

  if ($vars['view']->name == 'c2d'){
    foreach ($vars['rows'] as $k => $row ) {
      $row['C2d_idname'];
      $row['C2d_idlimit'];
      $limit_settings = $yaml_settings->get($row['C2d_idname']);
      if (!empty($limit_settings['limit-max']) && !empty($limit_settings['limit-min'])) {
        if (floatval($limit_settings['limit-min']) < floatval($limit_settings['limit-max'])) {
          if (floatval($row['C2d_idlimit']) < floatval($limit_settings['limit-min'])) {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-red';

          } elseif (floatval($row['C2d_idlimit']) > floatval($limit_settings['limit-max'])) {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-green';
          } else {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-yellow';
          }
        }

        if (floatval($limit_settings['limit-min']) > floatval($limit_settings['limit-max'])) {
          if (floatval($row['C2d_idlimit']) > floatval($limit_settings['limit-min'])) {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-red';

          } elseif (floatval($row['C2d_idlimit']) < floatval($limit_settings['limit-max'])) {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-green';
          } else {

            $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-yellow';
          }
        }
      }

      if (!empty($limit_settings['limit-max']) && empty($limit_settings['limit-min'])) {
        if (floatval($row['C2d_idlimit']) > floatval($limit_settings['limit-max'])) {
          $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-green';
        }

      }

      if (empty($limit_settings['limit-max']) && !empty($limit_settings['limit-min'])) {
        $vars['field_classes']['C2d_idlimit'][$k] .= ' backgroud-color-red';
      }

      if (empty($limit_settings['limit-max']) && empty($limit_settings['limit-min'])) {

      }
    }
  }
}