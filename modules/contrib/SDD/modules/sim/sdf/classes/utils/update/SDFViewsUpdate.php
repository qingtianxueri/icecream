<?php

namespace sdf\utils\update;

use sdf\exceptions\SDFUpdateException;
use view;

class SDFViewsUpdate extends SDFBaseUpdate {

    public function validate() {
        if (!$this->requireModule('views')) {
            $e = 'Views update: the required module "views" is not found.';
            throw new SDFUpdateException($e);
        }

        if (!$this->requireModule('views_ui')) {
            $e = 'Views update: the required module "views_ui" is not found.';
            throw new SDFUpdateException($e);
        }

        if (!$this->requireFolder('views')) {
            $e = 'Views update: the required folder "views" is not found.';
            throw new SDFUpdateException($e);
        }

        return TRUE;
    }

    public function update() {
        $path = $this->getUpdatePath('views');
        $dir = $this->scanDir('views');
        if (empty($dir)) {
            return;
        }
        foreach ($dir as $file) {
            $fullpath = $path . $file;
            // Read views object content.
            $content = file_get_contents($fullpath);
            if (empty($content)) {
                continue;
            }
            $view = '';
            views_include('view');
            eval($content);
            /* @var $view view */
            $view->update();
            $view->init_display();
            $view->save();
            views_ui_cache_set($view);
        }
    }

}
