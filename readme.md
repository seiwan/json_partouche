## Installation

Composer doit être installé sur le serveur.
Après le clonage du dépôt, exécuter les commandes suivantes dans le répertoire du projet pour que le formulaire soit pleinement fonctionnel :

````
$ composer update
````

````
$ sudo chgrp www-data -R bootstrap public storage
````

OU

````
$ sudo chmod 777 -R bootstrap public storage
````

````
$ php artisan storage:link
````

## Outils utilisés

- Ubuntu Server 16.04.5 LTS
- PHP 7.0.32
- Laravel 5.5.32 / Laravel Collective
- Bootstrap 3.4.0
- JQuery 3.3.1
- SASS
- NPM
- Composer

## Fichiers utilisés

- Routes : routes/web.php
- Contrôleur : app/Http/Controllers/FormController.php
- Vue : resources/views/form.blade.php
- Includes pour les inputs du formulaire : resources/views/includes
- CSS : resources/assets/css
- JS : ressources/assets/js
- Validation du formulaire côté serveur : app/Http/Request/GenerateJsonRequest.php
- Messages d'erreur pour la validation : resources/lang/fr/validation.php
- Ajout de la règle "http" pour validation : app/Providers/AppServiceProvider.PHP
- Stockage des fichiers : public/storage (lien vers storage/app/public)
