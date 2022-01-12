<?php

namespace Dealskoo\Admin;

class Permission
{
    private $key;
    private $name;
    private $description;

    public function __construct($key, $name, $description = '')
    {
        $this->key = $key;
        $this->name = $name;
        $this->description = $description;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

}
