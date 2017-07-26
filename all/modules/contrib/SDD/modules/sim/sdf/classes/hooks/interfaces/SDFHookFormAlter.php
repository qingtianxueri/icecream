<?php

namespace sdf\hooks\interfaces;

interface SDFHookFormAlter extends SDFHookOp {

    public function invokeFormAlter(&$form, $formState, $formId);
}