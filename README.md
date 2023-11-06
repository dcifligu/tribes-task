<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Starting Tailwind CSS with npm run dev:

First, you need to ensure that you have Tailwind CSS installed and properly configured in your Laravel project. If you haven't set up Tailwind CSS yet, you can do so by following the official documentation: Getting Started with Tailwind CSS.

Once you have Tailwind CSS set up, you can include instructions on how to compile your assets using npm run dev in the README file:

### Starting Tailwind CSS with `npm run dev`

To compile your CSS assets with Tailwind CSS, run the following command in your Laravel project's root directory:

```
npm run dev
```

This command will process your CSS files, including your Tailwind CSS configuration, and generate the compiled CSS files in your project.

Make sure you have Node.js and npm installed on your system before running the command.

## Using Livewire and FilamentPHP

[Livewire](https://laravel-livewire.com) and [FilamentPHP](https://filamentapp.com) are powerful Laravel packages that simplify building interactive, dynamic web applications. Here's how to use them in your Laravel project:

### Livewire

[Livewire](https://laravel-livewire.com) is a full-stack framework for Laravel that enables you to build interactive interfaces using Laravel's server-side logic. It allows you to create components that combine the best of Laravel and JavaScript without writing any JavaScript.

To get started with Livewire in your Laravel project:

1. Install Livewire using Composer:

    ```
    composer require livewire/livewire
    Create a Livewire component using the Artisan command:
    ```

php artisan make:livewire MyComponent
Customize your Livewire component to define the behavior and data interactions.

Include the Livewire component in your Blade views and use it to build dynamic interfaces.

For more information and detailed documentation, refer to the Livewire documentation.

FilamentPHP
FilamentPHP is an elegant admin panel for Laravel that provides a clean, customizable interface for managing your application's data. It simplifies the process of creating admin panels for your Laravel applications.

To integrate FilamentPHP into your Laravel project:

Install FilamentPHP using Composer:

`composer require filament/filament`
Publish the configuration and assets:

```php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-assets
```

Set up your Filament resources, roles, and permissions in the config/filament.php configuration file.

Access the Filament admin panel in your application by visiting the designated URL (usually /filament).

FilamentPHP simplifies the process of building and customizing admin panels for your Laravel application. For comprehensive documentation and guides, visit the FilamentPHP documentation.

By leveraging Livewire and FilamentPHP, you can enhance the interactivity and administration of your Laravel project.

Make sure to customize this section with any specific setup or usage instructions that are relevant to your Laravel project. Additionally, consider providing links to the official documentation for both Livewire and FilamentPHP for more in-depth information.
