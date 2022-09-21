<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    // setUp method is build in and will run before each of test
    public function setUp()
    {
        $this->user = new User();
    }
    
    public function testThatWeCanGetTheFirstName()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLasttName()
    {
        $this->user->setLastName('Eilish');

        $this->assertEquals($this->user->getLastName(), 'Eilish');
    }

    public function testFulNameIsReturned()
    {
        $this->user->setFirstName('Piotr');
        $this->user->setLastName('Migdal');

        $this->assertEquals($this->user->getFullName(), 'Piotr Migdal');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $this->user->setFirstName('Piotr    ');
        $this->user->setLastName('    Migdal');
        $this->assertEquals($this->user->getFirstName(), 'Piotr');
        $this->assertEquals($this->user->getLastName(), 'Migdal');
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'p.f@fmail.com';

        $this->user->setEmail($email);

        $this->assertEquals($this->user->getEmail(), $email);
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $this->user->setFirstName('Piotr');
        $this->user->setLastName('Migdal');
        $this->user->setEmail('piotr.f@fmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Piotr Migdal');
        $this->assertEquals($emailVariables['email'], 'piotr.f@fmail.com');
    }
}