<?php

namespace sdf\utils;

class SDFFormElement {

    private $name;
    private $element;

    public function __construct($name, array $element = array()) {
        $this->name = $name;
        $this->element = $element;
    }

    public function addElement(SDFFormElement $elem) {
        $this->element[$elem->getName()] = $elem->getElement();
    }

    public function setTitle($title) {
        $this->element['#title'] = $title;
    }

    public function setType($type) {
        $this->element['#type'] = $type;
    }

    public function setAccess($access) {
        $this->element['#access'] = $access;
    }

    public function addAttribute($name, $value) {
        $this->element['#attributes'][$name] = $value;
    }

    public function disable() {

    }

    public function hide() {

    }

    public function validate() {

    }

    public function getName() {
        return $this->name;
    }

    public function getElement() {
        return $this->element;
    }

}
