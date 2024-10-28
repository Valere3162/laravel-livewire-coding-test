<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Http;

class QuoteControllerTest extends TestCase
{
    /** @var QuoteController */
    private QuoteController $controller;

    /**
     * Set up the test environment.
     * Initialize controller and mock API responses.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new QuoteController();
        Http::fake([
            'https://api.kanye.rest/' => Http::response(['quote' => 'Test quote'], 200),
        ]);
    }

    /**
     * Test that the index method returns exactly five quotes.
     *
     * @test
     */
    public function test_index_returns_five_quotes(): void
    {
        $response = $this->controller->index();
        $quotes = json_decode($response->getContent());
        
        $this->assertCount(5, $quotes);
        $this->assertEquals('Test quote', $quotes[0]);
    }
}
