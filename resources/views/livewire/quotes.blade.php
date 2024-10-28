<div class="container" wire:poll.60s="refreshQuotes">
    <h1 class="title">Kanye West Quotes</h1>
    <div class="timer">Next refresh in: <span id="countdown">60</span>s</div>
    <div class="quotes-wrapper">
        @if(count($quotes) > 0)
            <ul class="quote-list">
                @foreach($quotes as $quote)
                    <li class="quote-item">{{ $quote }}</li>
                @endforeach
            </ul>
        @else
            <p class="no-quotes-message">No quotes available. Try refreshing!</p>
        @endif
    </div>
    <button class="refresh-button" wire:click="refreshQuotes" wire:loading.attr="disabled">
        Refresh Quotes
    </button>

    <div wire:loading wire:target="refreshQuotes" class="loader-container">
        <div class="loader"></div>
    </div>

    <script>
        let countdown = 60;
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown <= 0) {
                countdown = 60;
            }
        }

        setInterval(updateCountdown, 1000);

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('quotesRefreshed', () => {
                countdown = 60;
                countdownElement.textContent = countdown;
            });
        });
    </script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            position: relative;
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .title {
            text-align: center;
            color: #333;
        }

        .quote-list {
            list-style-type: none;
            padding: 0;
        }

        .quote-item {
            padding: 10px;
            margin: 10px 0;
            background: #e9ecef;
            border-left: 5px solid #007bff;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .quote-item:hover {
            background: #d6d8db;
        }

        .refresh-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .refresh-button:hover {
            background-color: #0056b3;
        }

        .refresh-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .timer {
            text-align: right;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        .quotes-wrapper {
            position: relative;
            min-height: 200px;
        }

        .loader-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .refresh-button {
                font-size: 14px;
            }
        }

        .no-quotes-message {
            text-align: center;
            color: #666;
            font-style: italic;
        }
    </style>
</div>
