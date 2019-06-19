<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Model\Products;
use Validator;
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

	/**
	* @dataProvider ABProvider
	*/
    public function testA($a, $b, $c)
    {
       $this->assertEquals($a, $b);
       return $a;
    }
    /**
     * @dataProvider ABProvider
     */
    public function testB($a, $b, $c)
    {
       $this->assertEquals($a, $b);
       return $c;
    }
    public function ABProvider() 
    {
        return array(
          array(0, 0, 0),
          array(3, 3, 6),
          array(5, 5, 10),
        );
    }
	/**
	* @depends testA
	* @depends testB
	*/
    public function testC($a,$c) 
    {
       $this->assertEquals($c, $a+$a);
    }

    /**
     * @dataProvider urlProvider
     */
    public function testUrl($url) //Q6
    {
        $url = [
            'url'=>$url
        ];
        $rule = [
            'url'=>'required|url'
        ];
        $validator = Validator::make($url, $rule);
        $this->assertEquals('The url format is invalid.', $validator->errors()->first());
    }

    public function urlProvider()
    {
        return array(
          array('//invalid-url.com'),
          array('s//example.com')
        );
    }

    public function testAssertCount(): void 
    {
        $a = [5, 6, 9];        
        $this->assertCount(3, $a);
    }

}
