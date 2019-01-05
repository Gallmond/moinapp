# Test app for moin

## Assumptions
- Environment has php7.1+, composer, laravel installed already with correct permissions and PATH settings.
- I used homebrew for PHP7.1+
- https://getcomposer.org/download/ for composer
- composer global require "laravel/installer" for laravel
- composer global require "laravel/valet" for local testing

## Local installation
```
$ composer create-project laravel/laravel appformoin
$ valet secure appformoin
$ cd appformoin
$ php artisan --version
Laravel Framework 5.7.19
```

## After pulling from repo
```
$ git clone https://github.com/Gallmond/moinapp.git
Cloning into 'moinapp'...
[...]
Resolving deltas: 100% (9/9), done.
$ cd moinapp
$ composer isntall
$ cp .env.example .env
$ php artisan key:generate
Application key set successfully.
$ cd ..
$ valet secure moinapp
```
At this point visiting moinapp.dev should run the site