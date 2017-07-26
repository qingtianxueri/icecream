<?php

namespace sdf\utils;

class SDFBatch {

    /**
     * Drupal batch array
     *
     * @var array
     */
    private $batch;

    /**
     * URL to redirect when batch finished.
     *
     * @var string
     */
    private $redirect;

    public function __construct() {
        $this->batch = array();
    }

    /**
     * Setup the batch.
     *
     * @return void
     */
    public function setup() {
        // Use default displaying result message for the batch operations if none.
        if (empty($this->batch['finished'])) {
            $this->setFinishedCallback('batch_finished');
        }
        batch_set($this->batch);
    }

    /**
     * Run the batch process.
     *
     * DO NOT call this in form submit,
     * once the batch is setup, it'll automatically run with form submission.
     *
     * @return void
     */
    public function process() {
        batch_process($this->redirect);
    }

    public function addOperation($func, array $args) {
        $this->batch['operations'][] = array(
            $func,
            $args
        );
    }

    public function setRedirect($url) {
        $this->redirect = $url;
    }

    public function setTitle($title) {
        $this->batch['title'] = $title;
    }

    public function setInitMessage($msg) {
        $this->batch['init_message'] = $msg;
    }

    public function setProgressMessage($msg) {
        $this->batch['progress_message'] = $msg;
    }

    public function setErrorMessage($msg) {
        $this->batch['error_message'] = $msg;
    }

    public function setFinishedCallback($callback) {
        $this->batch['finished'] = $callback;
    }

    public function setFile($file) {
        $this->batch['file'] = $file;
    }

}
