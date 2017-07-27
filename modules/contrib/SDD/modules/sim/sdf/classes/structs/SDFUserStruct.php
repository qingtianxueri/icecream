<?php

namespace sdf\structs;

use sdf\consts\SDFConst;

class SDFUserStruct extends SDFEntityStruct {

    public function __construct() {
        parent::__construct('user', 'user', 'User');
    }

    /**
     * Override
     * Use role for user instead of bundle.
     *
     * @see SDFEntityStruct::loadEntityInfo()
     */
    protected function loadEntityInfo() {
        parent::loadEntityInfo();

        // Drupal default user has no bundle,
        // here we rename to "default"
        if (isset($this->fields['user'])) {
            $this->fields['default'] = $this->fields['user'];
            unset($this->fields['user']);
        }

        $roles = user_roles();
        // Remove default roles.
        $excludes = SDFConst::listDefaultRoles();
        foreach ($excludes as $rid) {
            if (isset($roles[$rid])) {
                unset($roles[$rid]);
            }
        }
        foreach ($roles as $role) {
            $role = str_replace(' ', '_', $role);
            // Let the role name take the position of bundle, with same fields as default.
            $this->fields[$role] = $this->fields['default'];
        }
    }

    protected function hasBundle() {
        return FALSE;
    }

}
