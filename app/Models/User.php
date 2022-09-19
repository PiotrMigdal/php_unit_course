<?php
namespace App\Models;

class User
{
    protected $first_name;
    protected $last_name;
    protected $email;

    public function setFirstName($firstName)
    {
        $this->first_name = trim($firstName);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastName)
    {
//        return 'Billy';
        $this->last_name = trim($lastName);
    }

    public function getLastName()
    {
//        return 'Eilish';
        return $this->last_name;
    }

    public function getFullName()
    {
//        return 'Piotr Migdal';
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}