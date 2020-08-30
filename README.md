# StarrySky
*And it shall be bestowed upon you, the Star which you have longed for-*

## About StarrySky

StarrySky is websystem for **RevueStarlight**, based on the Laravel framework.

## Setup

```
# Install dependencies
composer install

# Generate APP_KEY
php artisan key:generate

# Fill .env
cp .env.example .env && nano .env

# Laravel-admin install
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install

# Deploy image files
cp -r /path/to/images ./public/image

# Create admin user
php artisan admin:create-user
```

**Note :** When deploy to production, remember to disable the `admin` user or change the password after setup.

The initial password for the "Admin" user is `admin`.
Not disabling the "Admin" user or changing the password is at risk to your app.

## Serve

```
php artisan serve
```

## License

StarrySky is licensed under the **MIT License**.
