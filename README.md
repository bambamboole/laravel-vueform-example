# Laravel Vueform Example

This repo is used to demonstrate how to use [Vueform](https://github.com/vueform/vueform) with Laravel and to reproduce issues.

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

```bash
# Seed database
php artisan migrate:fresh --seed
```

You can login via `test@example.com` and `password`

## Things to tackle 
Here is a list of things I want to showcase with this repo:
* [x] Basic setup with Vueform
* [x] POC Update password form
* [x] Show feedback of successful form submission
* [x] POC Update profile form
* [x] Conditional fields (as needed for update profile info when the email is not verified it should show an extra link) -> It is kinda working but needs a page refresh since something is not reactive (maybe)
* [x] Make a proper inertia Link component which does not suck. -> use custom element -> https://vueform.com/docs/creating-elements
* [ ] Should we reimplement [inertias useForm](https://github.com/inertiajs/inertia/blob/master/packages/vue3/src/useForm.ts) or should we continue to build upon it ? -> we will reimplement it and use it as inspiration
* [ ] Filled fields have changed border color 

## Things NOT to tackle (for now)
* [ ] Add a form with a file upload. This is a bit more complex and should be tackled separately
* [ ] Form endpoint. We only pass endpoint and method and rest has to be implemented separately
* [ ] Validation. We will use the Laravel validation form the endpoint for now (maybe we can add pure frontend validation later)
