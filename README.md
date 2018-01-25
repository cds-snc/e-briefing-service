# E-Briefing Service

This is a [Laravel](https://laravel.com/)-based backend to the [E-Briefing App](https://github.com/cds-snc/e-briefing-app).

Create and manage e-Briefing "binders" that can be installed on a mobile device and updated remotely through the e-Briefing App

This service allows you to: 
- Create a daily itinerary detailing meetings and events and include relevant documents, contacts, and biographies of participants
- Upload supporting documents and reference materials
- Create biographies of members of the delegation and people they will meet
- Free-form "articles" allow you to include any other information that doesn't fit anywhere else
- Collaborate with other members of your team

## Heads up!

This project is still early in development and some of the processes involved in running, installing, and loading data into
the app are meant to be temporary work-arounds until a more full-featured service can be rolled out.  See more details about
this over in the [E-Briefing App repository](https://github.com/cds-snc/e-briefing-app).

See also this [TODO](TODO.md) list for some of the features we think will be needed for this to be a more complete product.

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