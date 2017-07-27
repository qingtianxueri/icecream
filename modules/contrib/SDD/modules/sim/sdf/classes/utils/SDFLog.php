<?php


namespace sdf\utils;


class SDFLog {

    /**
     * Equals to drupal_set_message type=status
     * @param $message
     */
    public static function setStatusMessage($message) {
        drupal_set_message($message, 'status');
    }

    /**
     * Equals to drupal_set_message type=warning
     * @param $message
     */
    public static function setWarningMessage($message) {
        drupal_set_message($message, 'warning');
    }

    /**
     * Equals to drupal_set_message type=error
     * @param $message
     */
    public static function setErrorsMessage($message) {
        drupal_set_message($message, 'error');
    }
} 