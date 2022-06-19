# READY

A web app to easily manage your coursework.

## Stack
* Laravel (PHP)
* Vue (TypeScript)
* PostgreSQL

## Installation

### Requirements:

* Docker
* Composer
* PHP

### Steps:

1. Clone the repo
2. Run `composer install`
3. Copy .env.example to .env
4. Configure .env file to local environment
5. Run `npm install` to install npm packages
6. Run `php artisan key:generate` to create application key
7. Run `./vendor/bin/sail up -d` to start Docker containers
8. Run `./vendor/bin/sail artisan migrate` to perform migrations
9. Run `sail npm run dev` to generate the JS/CSS assets
10. Go to [http://localhost](http://localhost) to see website

This uses Laravel sail to manage Docker containers for you.
You could alternatively use something like Valet or Homestead
which runs on your own system or in a virtual machine.

## License

READY is licensed under the [Apache-2.0 license](https://github.com/cjreed121/ready/blob/master/LICENSE).
