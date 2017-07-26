<?php


namespace sdf\hooks\items;


interface SDFItem {

    /**
     * Set or add item as sub item.
     *
     * @param string $name
     * @param SDFItem $item
     * @return void
     */
    public function setElement($name, SDFItem $item);

    /**
     * Set attribute
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function setAttribute($name, $value);

    /**
     * Get raw array item.
     *
     * @return array
     */
    public function getRawItem();

}