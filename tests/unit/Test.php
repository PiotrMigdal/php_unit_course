<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new User();

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLasttName()
    {
        $user = new User();

        $user->setLastName('Eilish');

        $this->assertEquals($user->getLastName(), 'Eilish');
    }

    public function testFulNameIsReturned()
    {
        $user = new User();
        $user->setFirstName('Piotr');
        $user->setLastName('Migdal');

        $this->assertEquals($user->getFullName(), 'Piotr Migdal');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new User();
        $user->setFirstName('Piotr    ');
        $user->setLastName('    Migdal');
        $this->assertEquals($user->getFirstName(), 'Piotr');
        $this->assertEquals($user->getLastName(), 'Migdal');

    }

    public function testEmailAddressCanBeSet()
    {
        $user = new User();
        $email = 'p.f@fmail.com';

        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new User();
        $user->setFirstName('Piotr');
        $user->setLastName('Migdal');
        $user->setEmail('piotr.f@fmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Piotr Migdal');
        $this->assertEquals($emailVariables['email'], 'piotr.f@fmail.com');

    }
}