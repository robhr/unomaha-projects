NitroManage (CSCI 4830 Group Project)
============
[![Build Status](https://img.shields.io/badge/build-passing-green.svg)](https://github.com/xorob/csci-4830-nitromanage) [![Build Status](https://img.shields.io/badge/dependencies-up%20to%20date-green.svg)](https://github.com/xorob/csci-4830-nitromanage/blob/master/composer.json)  [![Live Demo](https://img.shields.io/badge/demo-offline-red.svg)](https://github.com/robhr/csci-4830-nitromanage)

NitroManage is a CRM platfrom intended to handle the management and data collection of customers spreading across multiple small-scale projects.

## Setup
1. Clone the NitroManage repository: `git clone https://github.com/robhr/csci-4830-nitromanage`

2. `cd` into the directory where the repository was saved

3. Install Composer Dependencies: `composer install`

4. Install NPM Dependencies: `npm install`

5. Create a copy of your .env file: `cp .env.example .env`

6. Generate an app encryption key: `php artisan key:generate`

7. Create an empty database for our application

8. In your .env file, add your database information so laravel can connect to it

9. Migrate the database (and optionally seed it): `php artisan migrate:refresh --seed`

10. Run `npm run dev` to generate the development bundles

11. Run `php artisan serve`, then the application should be accessible at: http://localhost:8000

## Notes
+ You can generate API documentation with the following command: `php artisan api:generate --routePrefix="api/*"`. The default output path for the documentation is `public/docs` and can be changed with the `--output` parameter.
