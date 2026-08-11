# DataLens

DataLens is a powerful, lightweight, and beautiful database management GUI and SQL editor for Laravel applications. It provides a seamless interface to view tables, execute raw SQL queries, and manage records across multiple database connections directly within your Laravel environment.

## Features

- **Multi-Database Support:** Switch between all your configured Laravel database connections.
- **Table Viewer:** Browse, search, sort, and paginate through your database tables.
- **Dynamic CRUD:** Add, edit, and delete rows with dynamic form inputs based on column types, automatically handling auto-generated primary keys.
- **SQL Editor:** Write and execute raw SQL queries with a powerful Monokai-themed editor (powered by CodeMirror) featuring syntax highlighting.
- **Result Set Viewer:** Instantly see the results of your SQL queries in a beautifully formatted data table.
- **Theme Manager:** Fully responsive UI built with Tailwind CSS, supporting Light, Dark, and System modes globally.
- **Livewire & Alpine:** Fast, SPA-like experience powered by Laravel Livewire 3 and Alpine.js.

## Installation

You can install the package via composer:

```bash
composer require laravel-egypt/datalens --dev
```

*(Note: DataLens is primarily intended for development environments. If you need it in production, ensure you properly configure access gates/middleware.)*

Publish the assets and configuration:

```bash
php artisan vendor:publish --tag="datalens-assets"
php artisan vendor:publish --tag="datalens-config"
```

## Usage

Once installed, simply navigate to `/datalens` in your browser to access the dashboard.

```text
http://your-app.test/datalens
```

### Configuration

You can customize DataLens behavior by editing the published `config/datalens.php` file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | DataLens Route Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where DataLens will be accessible from.
    |
    */
    'path' => env('DATALENS_PATH', 'datalens'),
    
    /*
    |--------------------------------------------------------------------------
    | DataLens Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each DataLens route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware.
    |
    */
    'middleware' => ['web', \LaravelEgypt\DataLens\Http\Middleware\EnsureUpToDate::class], // Adjust based on actual package middleware
];
```

## Screenshots

*(Placeholder for screenshots of Table Viewer, SQL Editor, and Dark Mode)*

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Laravel Egypt](https://github.com/laravel-egypt)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
