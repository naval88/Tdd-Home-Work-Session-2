<?php

namespace Tests\Unit;

use App\Components\RawQuery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RawQueryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSelectAllColumns()
    {
        $this->assertEquals('select * from products', (new RawQuery)->select('products'));
    }
    
    public function testSpecificColumns()
    {
        $this->assertEquals('select id, name from products', (new RawQuery)->select('products',['column'=>['id', 'name']]));
    }

    public function testOrderByColumns()
    {
        $this->assertEquals('select id, name from products order by id desc', (new RawQuery)->select('products',
        	['column'=>['id', 'name'],
        	'orderby'=>['id', 'desc']]));
    }
	
    /*public function testAllColoumsOrderByMulitpleColumns()
    {
		$this->assertEquals('select * from products order by name asc, category asc', (new RawQuery)->select('products',
        	['orderby'=>['name', 'asc'],
        	'orderby'=>['category', 'asc']]));

    }*/

    public function testAllColoumsOrderByMulitpleColumns()
    {
		$this->assertEquals('SELECT id, name FROM products ORDER BY id DESC', (new RawQuery)->select('products',
		['column'=>['id', 'name'],
		'orderbycap'=>['id', 'DESC']]));
	}


}
