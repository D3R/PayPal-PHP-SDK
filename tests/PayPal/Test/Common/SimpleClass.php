<?php
namespace PayPal\Test\Common;

use PayPal\Common\PayPalModel;

class SimpleClass extends PayPalModel
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
}
