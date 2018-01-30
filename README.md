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
the app are meant to be temporary work-arounds until more of this functionality can be fleshed out. See more details about this over in the [E-Briefing App repository](https://github.com/cds-snc/e-briefing-app).

See also this [TODO](TODO.md) list for some of the features we think will be needed for this to be a more complete product.

## Running this project

### Clone and then install

```
git clone https://github.com/cds-snc/e-briefing-service.git
cd e-briefing-service
composer install
```

### Setup your environment file and configure your database

The default settings in .env.example should work with the included docker-compose.yml settings.  You may need to change
these if you're running some other way.

```
cp .env.example .env
```

### Start the service

You can then bring up a dev environment using the docker-compose file included by running:

```
docker-compose up
```

Alternatively, you may want to try [Laravel Valet](https://laravel.com/docs/5.5/valet) or 
[Laravel Homestead](https://laravel.com/docs/5.5/homestead)

### Migrate and seed the database

```
php artisan migrate
php artisan db:seed
```

This will create an Administrator account with the following credentials:

- username: admin@test.com
- password: secret

## API Key and Remote Sync

For the Remote Sync feature, the E-Briefing App must provide an Authorization token to access the package download
route.  This token is stored in the `users` table associated with the main admin user.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on how you can pitch in, and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.txt](LICENSE.txt) file for details.

-------------------------------------------------------------------

# Service de séance d’information électronique

Il s’agit d’un système principal basé sur [Laravel](https://laravel.com/) pour l’application de séance d’information électronique.

Créez et gérez des « reliures » de séance d’information électronique qui peuvent être installées sur un appareil mobile et mises à jour à distance au moyen de l’application de séance d’information électronique.

Ce service vous permet de :

*   créer un itinéraire quotidien détaillant les réunions et les événements en plus d’incorporer les documents, les coordonnés et les biographies des participants pertinents;
*   télécharger des documents de soutien et des documents de référence;
*   créer les biographies des membres de la délégation et des personnes qu’ils rencontreront;
*   les « articles » en format libre vous permettent d’inclure tout autre renseignement qui ne peut être placé dans les autres catégories;
*   collaborer avec les autres membres de votre équipe.

## Aperçu

Ce projet en est toujours aux premières étapes d’élaboration et certains des processus concernant le fonctionnement, l’installation et le téléchargement de données dans l’application sont des solutions de contournement temporaires jusqu’à ce que davantage de fonctions puissent être élaborées. Consultez d’autres renseignements à ce sujet dans le [répertoire E-Briefing App](https://github.com/cds-snc/e-briefing-app).

Consultez également cette liste [TODO](TODO.md) pour connaître certaines caractéristiques que nous pensons qui vous seront utiles pour que ce produit soit plus complet.

## Mise en œuvre de ce projet

### Cloner, puis installer

```
git clone https://github.com/cds-snc/e-briefing-service.git
cd e-briefing-service
composer install
```

### Installez votre fichier environnemental et configurez votre base de données

Les paramètres par défaut dans .env.example devraient fonctionner avec les paramètres docker-compose.yml inclus. Vous pourriez devoir les modifier si vous l’utilisez d’une autre manière.

```
cp .env.example .env
```

### Démarrez le service

Vous pouvez ensuite installer un environnement de développeur à l’aide du fichier docker-compose inclus en exécutant :

```
docker-compose up
```

Sinon, vous pourriez vouloir essayer [Laravel Valet](https://laravel.com/docs/5.5/valet) ou [Laravel Homestead](https://laravel.com/docs/5.5/homestead).

### Effectuez la migration et peuplez la base de données

```
php artisan migrate
php artisan db:seed
```

Cette opération créera un compte d’administrateur ayant les justificatifs d’identité suivants :

- nom d’utilisateur: admin@test.com
- mot de passe: secret

## Clé API et sync à distance

Pour la caractéristique de synchronisation à distance, l’application E‑Briefing doit fournir un jeton d’autorisation pour accéder à la voie de téléchargement du progiciel. Ce jeton est entreposé dans la tablette `users` associée à l’utilisateur de l’administration principal.

## Contribution

Veuillez lire le document [CONTRIBUTING.md](CONTRIBUTING.md) pour obtenir des renseignements sur la façon dont vous pouvez contribuer ainsi que sur le processus pour présenter des demandes de déchargement.

## Licence

Ce projet utilise la licence MIT – consultez le fichier [LICENSE.txt](LICENSE.txt) pour obtenir de plus amples renseignements.
