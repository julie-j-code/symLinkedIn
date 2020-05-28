<?php

namespace App\Entity;

class User
{
    // protected: propriété peut être accédée par la classe elle-même et les classe héritant de la classe User
    // 3 niveaux
    protected $name;
    protected $email;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
