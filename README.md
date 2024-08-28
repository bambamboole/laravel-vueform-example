# Laravel Vueform Example

This repo is used to demonstrate how to use Vueform with Laravel and to reproduce issues.

It consists of:
* Laravel 11 Breeze with Tailwind, Inertia, Vue and TypeScript
* Plain Vueform installation as described in their docs
* PHP classes (DTOs) to build up forms in the backend in (/app/Forms)
* A Vue wrapper component to inject the correct values and handle the submission via inertias useForm
* A POC for the update password form


## Installation

```bash
cp .env.example .env
composer install
npm install
npm run build
```

## Usage

```bash
# Vite dev server
npm run dev
```

```bash
# If no Herv or Valet setup exists
php artisan serve
```
