# Quotes App

A Laravel application that displays random Kanye West quotes using the Kanye REST API. Built with Laravel, Livewire, and Tailwind CSS.

## Features

- Displays 5 random Kanye West quotes
- Auto-refresh functionality with countdown timer
- Real-time quote updates using Livewire
- Responsive design with Tailwind CSS
- Error handling for API failures
- Unit and Feature tests
- RESTful API endpoint for quotes
- Docker containerization with Laravel Sail

## Requirements

- Docker
- Docker Compose
- PHP 8.2+
- Composer
- Node.js & NPM

## Installation

1. Clone the repository: https://github.com/Valere3162/laravel-livewire-coding-test.git

## Tests

- Unit tests are in the `tests/Unit` folder.
- Feature tests are in the `tests/Feature` folder.

## Docker Environment

The application uses Laravel Sail, which provides a Docker-based development environment. The following services are included:

- PHP 8.3
- MySQL 8.0
- Node.js for asset compilation

### Docker Services Configuration

The application runs with the following Docker services:

- **Laravel Application (laravel.test)**:
  - PHP 8.3 runtime
  - Exposed on port 8080
  - Includes Vite dev server on port 5173

- **MySQL Database**:
  - MySQL 8.0
  - Exposed on port 3306
  - Includes automatic testing database setup

## API Integration

### External API
The application integrates with the Kanye REST API (https://api.kanye.rest/) to fetch random Kanye West quotes.

### Internal API
The application provides its own REST API endpoint:

- GET `/api/quotes`: Returns an array of 5 random Kanye West quotes

## Project Structure

### Key Components

- `app/Livewire/Quotes.php`: Main Livewire component for quote display and refresh
- `resources/views/livewire/quotes.blade.php`: Quote display template
- `app/Http/Controllers/QuoteController.php`: API endpoint controller
- `tests/Feature/QuotesPageTest.php`: Feature tests for quotes functionality
- `tests/Unit/QuotesComponentTest.php`: Unit tests for Quotes component

### Frontend Assets

- Tailwind CSS for styling
- Livewire for real-time updates
- Vite for asset compilation

## Error Handling

The application includes comprehensive error handling:

- API failure detection and user feedback
- Graceful degradation when quotes cannot be fetched
- Error logging for debugging

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the MIT license.

## Acknowledgments

- [Laravel](https://laravel.com)
- [Livewire](https://livewire.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Kanye REST API](https://api.kanye.rest)



# Quick Commands Reference

## Project Setup Reference
   ```bash
   git clone <repository-url>

   cd quotes-app
   composer require laravel/sail --dev
   cp .env.example .env
   ./vendor/bin/sail up -d
   ./vendor/bin/sail composer install
   ./vendor/bin/sail npm install
   ./vendor/bin/sail artisan key:generate
```

Open a new terminal and run:

```bash
./vendor/bin/sail artisan session:table
./vendor/bin/sail artisan migrate
```
check if migrations are successful:
```bash
./vendor/bin/sail artisan migrate:status
```
navigate to the application

```bash
http://0.0.0.0/quotes
```
