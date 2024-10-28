<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Livewire\Quotes;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

class QuotesComponentTest extends TestCase
{
    /**
     * Set up the test environment.Ra
     * Mock the Kanye REST API responses for consistent testing.
     */
    public function setUp(): void
    {
        parent::setUp();
        Http::fake([
            'https://api.kanye.rest/' => Http::response(['quote' => 'Test quote'], 200),
        ]);
    }

    /**
     * Test that component initializes with exactly five quotes.
     *
     * @test
     */
    public function test_component_mounts_with_five_quotes(): void
    {
        Livewire::test(Quotes::class)
            ->assertCount('quotes', 5)
            ->assertSee('Test quote');
    }

    /**
     * Test that refresh functionality updates quotes and dispatches event.
     *
     * @test
     */
    public function test_refresh_quotes_updates_quotes_array(): void
    {
        Livewire::test(Quotes::class)
            ->call('refreshQuotes')
            ->assertCount('quotes', 5)
            ->assertDispatched('quotesRefreshed');
    }

    /**
     * Test that quotes are properly rendered in the view.
     *
     * @test
     */
    public function test_quotes_are_rendered_in_view(): void
    {
        Livewire::test(Quotes::class)
            ->assertViewHas('quotes')
            ->assertSee('Test quote');
    }
}
