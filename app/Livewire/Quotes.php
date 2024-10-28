<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class Quotes extends Component
{
    public array $quotes = [];

    public function mount(): void
    {
        $this->fetchQuotes();
    }

    public function refreshQuotes(): void
    {
        try {
            $this->fetchQuotes();
            $this->dispatch('quotesRefreshed');
        } catch (\Exception $e) {
            $this->addError('api', 'Failed to fetch quotes. Please try again.');
        }
    }

    private function fetchQuotes(): void
    {
        $this->quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest/');
            if ($response->successful()) {
                $this->quotes[] = $response->json()['quote'];
            } else {
                throw new \Exception('Failed to fetch quote');
            }
        }
    }

    public function render(): View
    {
        return view('livewire.quotes');
    }
}
