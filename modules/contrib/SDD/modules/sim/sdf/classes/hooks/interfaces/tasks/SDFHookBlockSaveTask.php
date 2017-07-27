<?php


namespace sdf\hooks\interfaces\tasks;


interface SDFHookBlockSaveTask extends  SDFHookTask {

    public function saveBlock($edit);
}