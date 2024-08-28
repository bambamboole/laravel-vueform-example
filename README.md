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
# If no Herd or Valet setup exists
php artisan serve
```


## Things to tackle 
Here is a list of things I want to showcase with this repo:
* [x] Basic setup with Vueform
* [x] POC Update password form
* [ ] Show feedback of successful form submission
* [ ] Conditional fields (as needed for update profile info when the email is not verified it should show an extra link)
* [ ] Make a proper inertia Link component via StaticElement which does not suck

## Things NOT to tackle (for now)
* [ ] Add a form with a file upload. This is a bit more complex and should be tackled separately
* [ ] Form endpoint. We only pass endpoint and method and rest has to be implemented separately
* [ ] Validation. We will use the Laravel validation form the endpoint for now (maybe we can add pure frontend validation later)
