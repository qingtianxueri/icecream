<?php


namespace sdf\hooks\items;


abstract class SDFSimpleItem implements SDFItem {

    /**
     * Raw array item
     *
     * @var array
     */
    private $item;

    public function setElement($name, SDFItem $item) {
        $this->item[$name] = $item;
    }

    public function setAttribute($name, $value) {
        $this->item[$name] = $value;
    }

    public function getRawItem() {
        return $this->item;
    }

} 