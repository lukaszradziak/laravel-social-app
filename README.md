# laravel-social-app

Simple social application with realtime additionals. Build on Laravel 8 and Laravel Nova.

Online demo: https://social.lukaszradziak.pl/

![tests](https://github.com/lukaszradziak/laravel-social-app/workflows/tests/badge.svg)

## 📃 Libs

-   Laravel
-   Jetstream (login, register)
-   Echo/Pusher (realtime)
-   IDE Helper (vscode helper)
-   Acquaintances (friendships, likes, votes)

## 🎉 Features

-   Realtime Chat
-   Realtime User Status (Online/Offline) with delay 3s
-   Realtime Notifications
-   Notification when out of chat

## 🚙 Install without Nova

Before install run `php remove_nova.php && composer update`

## 🚗 Install

`cp .env.example .env`

`unzip ./nova-3.26.1.zip -d ./nova && mv ./nova/*/** nova/ && rm ./nova-3.26.1.zip`

`composer install`

`./vendor/bin/sail build && ./vendor/bin/sail up`

`./vendor/bin/sail artisan key:generate`

`./vendor/bin/sail artisan migrate`

`./vendor/bin/sail artisan db:seed`




## Run Queue - Chat and Online status

`./vendor/bin/sail artisan queue:work`

## Dev accounts

Admin: `admin@admin` `password`

Test: `test@test` `password`

## Preview

![image](https://user-images.githubusercontent.com/1611323/152175936-12041642-0afa-44fd-9f24-62f47630ac08.png)

![image](https://user-images.githubusercontent.com/1611323/152175894-1dff4004-620d-4398-a54e-199f58f5b7b1.png)

![image](https://user-images.githubusercontent.com/1611323/152175866-7c1e2350-2aed-4767-8ff7-fef0ca0ad9fe.png)

