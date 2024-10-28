<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use App\Livewire\Quotes;

class QuotesPageTest extends TestCase
{
    /**
     * Test that the quotes page loads with a 200 status.
     *
     * @test
     */
    public function test_quotes_page_loads_successfully(): void
    {
        $response = $this->get('/quotes');
        $response->assertStatus(200);
    }

    /**
     * Test that the Livewire component is present on the page.
     *
     * @test
     */
    public function test_quotes_page_contains_livewire_component(): void
    {
        $response = $this->get('/quotes');
        $response->assertSeeLivewire('quotes');
    }
}
