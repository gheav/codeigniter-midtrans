# About Project

This project is an implementation of Midtrans payment gateway using codeigniter
https://github.com/Midtrans/midtrans-php

## Server Requirements

PHP version 5.6 or newer is recommended.

It should work on 5.4.8 as well, but we strongly advise you NOT to run such old versions of PHP, because of potential security and performance issues, as well as missing features.

## Installation

- Copy this repository to your server directory
- Run `composer install` for the first time installation
- Copy your client secret key into `views/layouts/main.php`
- Copy your server secret key into `controllers/snap.php`
