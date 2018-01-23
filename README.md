# E-Briefing Service

This is a [Laravel](https://laravel.com/)-based backend to the [E-Briefing App](https://github.com/cds-snc/e-briefing-app).

## Running this project

### Clone and then install

```
git clone https://github.com/cds-snc/e-briefing-service.git
cd e-briefing-service
composer install
```

### Setup your environment file and configure your database

```
cp .env.example .env
```

### Start the service

You can then bring up a dev environment using the docker-compose file included by running:

```
docker-compose up
```

Or you may want to try [Laravel Valet](https://laravel.com/docs/5.5/valet) or [Laravel Homestead](https://laravel.com/docs/5.5/homestead)

### Migrate and seed the database

```
php artisan migrate
```

This will create an Administrator account with the following credentials:

- username: admin@test.com
- password: secret