<?php
namespace PayPal\Test\Common;

use PayPal\Common\PayPalModel;

class ArrayClass extends PayPalModel
{

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTags($tags): void
    {
        if (!is_array($tags)) {
            $tags = [$tags];
        }

        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }
}
