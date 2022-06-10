# READY

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
6. Run `npm run dev` to generate the JS/CSS assets locally
7. Run `php artisan key:generate` to create application key
8. Run `./vendor/bin/sail up -d` to start Docker containers
9. Run `./vendor/bin/sail artisan migrate` to perform migrations
10. Go to [http://localhost](http://localhost) to see website

## License

READY is licensed under the [Apache-2.0 license](https://github.com/cjreed121/ready/blob/master/LICENSE).
