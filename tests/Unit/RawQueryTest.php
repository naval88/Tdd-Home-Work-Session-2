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
}
