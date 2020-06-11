<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->artisan('create-user');
        $this->assertEquals(1, User::count());

        $response = Http::get('https://www.brooksrunning.com.au/payment');
        $this->assertEquals(200, $response->status());
        $this->assertEquals('/cart', $response->effectiveUri()->getPath());
    }
}
