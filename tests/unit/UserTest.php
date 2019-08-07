<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase

{

  protected $user;

  public function setUp(): void
  {
    $this->user = new \App\Models\User;
  }

  /** @test */
  public function that_we_can_get_the_first_name()
  { 

    // Setting First Name
    $this->user->setFirstName('Billy');

    // Check if there is a Billy User
    $this->assertEquals($this->user->getFirstName(), 'Billy');

  }

  /** @test */
  public function that_we_can_get_the_last_name()
  { 

    // Setting Last Name
    $this->user->setLastName('Garrett');
    
    // Check if there is a Garrett User
    $this->assertEquals($this->user->getLastName(), 'Garrett');

  }

  /** @test */
  public function full_name_is_returned()
  {
  
    $this->user->setFirstName('Billy');
    $this->user->setLastName('Garrett');

    $this->assertEquals($this->user->getFullName(), 'Billy Garrett');
  }

  /** @test */
  public function first_and_last_name_are_trimmed()
  {
    $this->user->setFirstName('   Billy');
    $this->user->setLastName('    Garrett');

    $this->assertEquals($this->user->getFirstName(), 'Billy');
    $this->assertEquals($this->user->getLastName(), 'Garrett');
  }

  /** @test */
  public function email_adress_can_be_set()
  {
    $this->user->setEmail('billy@garrett.com');
    
    $this->assertEquals($this->user->getEmail(), 'billy@garrett.com');
  }

  /** @test */
  public function email_variables_contain_correct_values()
  {
    $this->user->setFirstName('Billy');
    $this->user->setLastName('Garrett');
    $this->user->setEmail('billy@garrett.com');

    $emailVariables = $this->user->getEmailVariables();

    // check if array has key full name and email
    $this->assertArrayHasKey('full_name', $emailVariables);
    $this->assertArrayHasKey('email', $emailVariables);

    // check if values are correct
    $this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
    $this->assertEquals($emailVariables['email'], 'billy@garrett.com');
  }
}