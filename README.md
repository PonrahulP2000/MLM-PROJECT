## Project Name

Interview Task

MLM software

## Requirements

Before you get started, ensure you have the following installed:

- PHP >= 8.1
- Composer
- MySQL

## Installation Process
Step-by-step guide to set up the project locally:
```bash
# Clone the repository
git clone https://github.com/PonrahulP2000/MLM-PROJECT.git

# Navigate to the project directory
cd MLM_PROJECT

# Install dependencies

composer install
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install && npm run dev 
# Set up the .env file
 
 create database on MYSQL and save that name on .env file

# Database Migrations

php artisan migrate

# Run the Project

-php artisan serve 

# For referral registration
 -http://127.0.0.1:8000/register/{user_id}
