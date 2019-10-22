<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCurrencies()
    {
        $this->seed();
        $response = $this->get('/currencies');
        $response->assertStatus(200);
        $response->assertSee('data');
    }

    /**
     * @dataProvider currency
     */
    public function testGetCurrency($id, $code)
    {
        $this->seed();

        $response = $this->get('/currencies/' . $id);
        $response->assertStatus($code);
    }


    public function testExchange()
    {
        $this->seed();

        $response = $this->post('/exchange', [
            'from'   => 'USD',
            'to'     => 'EUR',
            'amount' => 100.0
        ]);

        $response->assertStatus(200);
        $response->assertSee('amount');
        $response->assertSee('from');
        $response->assertSee('to');

    }

    public function currency()
    {
        return [
            [0, 404],
            [1, 200]
        ];
    }
}
