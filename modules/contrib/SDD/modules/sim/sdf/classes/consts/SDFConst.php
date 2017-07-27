<?php

namespace sdf\consts;

/**
 * Constants for common stuff.
 *
 * @package sdf\consts
 */
class SDFConst {

    /**
     * Root path
     * ROOT_SDD: root path to SDD module
     * ROOT_PROJECT: root path to project specific module
     */
    const ROOT_SDD = 'profiles/SDD/modules/sim';
    const ROOT_PROJECT = 'sites/all/modules/sim';

    /**
     * Drupal default roles.
     * 1 => anonymous user
     * 2 => authenticated user
     */
    const USER_ANONYMOUS = 1;
    const USER_AUTHENTICATED = 2;

    /**
     * SDD default roles
     * 3 => editor
     * 4 => web master
     */
    const USER_EDITOR = 3;
    const USER_WEBMASTER = 4;

    /**
     * Drupal file systems uri
     */
    const FILE_SYSTEM_PUBLIC = 'public://';
    const FILE_SYSTEM_PRIVATE = 'private://';

    /**
     * Update instance class constatns
     */
    const UPDATE_ENTITY = 1;
    const UPDATE_VIEWS = 2;
    const UPDATE_DB = 3;
    const UPDATE_PHP = 4;


    public static function listDefaultRoles() {
        return array(
            self::USER_ANONYMOUS,
            self::USER_AUTHENTICATED,
            self::USER_EDITOR,
            self::USER_WEBMASTER,
        );
    }
}
