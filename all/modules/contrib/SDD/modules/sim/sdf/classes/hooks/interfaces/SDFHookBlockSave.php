<?php

namespace sdf\hooks\interfaces;

interface SDFHookBlockSave extends SDFHookOp {

    public function invokeBlockSave($delta, $edit);
}