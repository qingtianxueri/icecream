<?php

namespace sdf\consts;

/**
 * Constants for hook names.
 *
 * @author taoyuanjian
 */
class SDFHookConsts {

    const HOOK_INIT = 'hook_init';
    const HOOK_MENU = 'hook_menu';
    const HOOK_MENU_ALTER = 'hook_menu_alter';
    const HOOK_ADMIN_PATH_ALTER = 'hook_admin_path_alter';

    const HOOK_BLOCK_INFO = 'hook_block_info';
    const HOOK_BLOCK_VIEW = 'hook_block_view';
    const HOOK_BLOCK_SAVE = 'hook_block_save';
    const HOOK_BLOCK_CONFIGURE = 'hook_block_configure';

    const HOOK_NODE_VIEW = 'hook_node_view';
    const HOOK_NODE_INSERT = 'hook_node_insert';
    const HOOK_NODE_UPDATE = 'hook_node_update';
    const HOOK_NODE_DELETE = 'hook_node_delete';
    const HOOK_NODE_PRESAVE = 'hook_node_presave';

    const HOOK_TAXONOMY_TERM_VIEW = 'hook_taxonomy_term_view';
    const HOOK_TAXONOMY_TERM_INSERT = 'hook_taxonomy_term_insert';
    const HOOK_TAXONOMY_TERM_UPDATE = 'hook_taxonomy_term_update';
    const HOOK_TAXONOMY_TERM_DELETE = 'hook_taxonomy_term_delete';
    const HOOK_TAXONOMY_TERM_PRESAVE = 'hook_taxonomy_term_presave';

    const HOOK_USER_VIEW = 'hook_user_view';
    const HOOK_USER_INSERT = 'hook_user_insert';
    const HOOK_USER_UPDATE = 'hook_user_update';
    const HOOK_USER_DELETE = 'hook_user_delete';
    const HOOK_USER_PRESAVE = 'hook_user_presave';

    const HOOK_FORM_ALTER = 'hook_form_alter';

    const HOOK_INSTALL = 'hook_install';
    const HOOK_UNINSTALL = 'hook_uninstall';
    const HOOK_SCHEMA = 'hook_schema';
}