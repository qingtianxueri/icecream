<?php


namespace sdf\hooks\interfaces\tasks;


interface SDFHookFormAlterTask extends SDFHookTask {

    public function alterForm(&$form, $formState);
}