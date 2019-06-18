<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Model\Products;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class Session3Test extends TestCase
{
	use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testCreateUser()
    {
    	$data = array("name" => $this->faker->name(),
        	"email" => $this->faker->email(),
        	"password" => $this->faker->numerify('secret##')
        	);
        $user = factory(User::class)->create($data);
        $this->assertInstanceOf(User::class, $user);
        return $user->id;
    }

    public function testValidateFirst()
    {   
    	$data = array("name" => $this->faker->name(),
        	"email" => $this->faker->email(),
        	"password" => $this->faker->numerify('secret##')
        	);     
        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('name', $data);   
        $this->assertArrayHasKey('password', $data); 
        $validator = User::validateUser($data);
        $this->assertTrue($validator);
    }
	/**
	* @depends testCreateUser
	*/
    public function testCreateProductUsingDepends($user_id) {
    	$product_data = array("user_id" => $user_id,
    						"name" => $this->faker->name()
        				);
        $product = factory(Products::class)->create($product_data);     
        $this->assertInstanceOf(Products::class, $product);
    }
}
