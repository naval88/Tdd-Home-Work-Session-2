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
        $this->assertEquals('select id, name from products', (new RawQuery)->select('products',['id', 'name']));
    }

    public function testOrderByColumns()
    {
        $this->assertEquals('select id, name from products order by id desc', (new RawQuery)->select('products',['id', 'name'], ['id', 'desc']));
    }

}
