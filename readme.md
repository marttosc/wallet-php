# Wallet

Wallet it's a college project without no commercial intent and was made using [Laravel](http://laravel.com/), a PHP framework.

The objective of this project is create an application to manage your credit cards in a simple way.

## Install

This project was configured using [Laravel Homestead](https://laravel.com/docs/5.2/homestead), but if you don't use it you can set up an environment with the minimum requirements of the Laravel (see docs).

To install follow these steps:

* Clone the repo.

`git clone https://github.com/marttosc/wallet-php.git wallet && cd wallet`

* Install the Composer's dependencies and then the NPM dependencies.

`composer install && npm install`

* Run the migrations and seeds. This will create all tables and create the credit card flags.

`php artisan migrate:install && php artisan migrate && php artisan db:seed`

Wallet already comes with CSS and JavaScript compiled, but if you added some extra asset, you must run Gulp to compile it again.

## Themes

Wallet uses two templates: one for the dashboard pages and other for the principal site pages.

The first template is AdminLTE and was created by Abdullah Almsaeed. You can check and download it [here](https://github.com/almasaeed2010/AdminLTE).

The second template is Pluto and was created by GrayGrids. You can check and download it [here](https://graygrids.com/item/pluto-material-design-free-bootstrap-template/).

## To-do

* [ ] Modify the site page
* [x] Create dashboard and site namespaces
* [x] Create views
* [x] Remove some stuff from auth scaffold
* [x] Create `app/models` folder
* [x] Create the models
* [x] Create the migrations
* [x] Generate the auth scaffold (see [Laravel docs](https://laravel.com/docs/5.2/authentication))

## License

The Wallet project is open-sourced software licensed under the [Apache License](https://opensource.org/licenses/Apache-2.0).
