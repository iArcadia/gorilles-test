# Test technique pour Gorilles

## Technologies utilisées

- **Environnement de développement :** Laragon
    - Apache, MySQL, HeidiSQL
- **Langages :** HTML, PHP, Javascript (+ jQuery)
- **Framework :** Laravel 8
    - **Moteur de template :** Blade
    - **ORM :** Eloquent
    
## Téléchargement

Placez-vous dans le dossier où vous voulez cloner le repository puis entrez la commande :

```shell
git clone https://github.com/iArcadia/gorilles-test.git
```

Une fois le projet téléchargé, éditez le fichier `.env` situé à la racine, et mettez à jour les informations de l'application et/ou de la BDD si besoin.

(*principalement `APP_URL` suivant l'url que votre environnement donnera au projet, et les lignes `DB_`*)

Puis, en ligne de commandes, déplacez-vous à la racine du projet, puis executez la commande suivante :

```shell
# Cette commande permet de créer les tables de la BDD à partir des fichiers de migrations
# puis de les remplir des jeux de tests via les fichiers de seed.
php artisan migrate --seed

# Si vous voulez revenir à cet état initial après avoir fait quelques tests, executez :
php artisan migrate:refresh --seed
```

## Fonctionnalités

### Fonctionnalités techniques

- ✅ Tables de la BDD (via les *migrations* : `database/migrations/`)
- ✅ Insertion en BDD (via les *seeders* : `database/seeders`)
- ✅ Routing (`routes/web.php` pour la lecture (web), `routes/api.php` pour la lecture et la modification (**API Rest**))
- ✅ Modèles (`app/Models/`)
- ✅ Contrôleurs (`app/Http/Controllers`)
- ✅ Vues (`resources/views/`)

### Fonctionnalités pratiques

- ✅ (`users` et `events`) Interface pour afficher la liste des éléments et leurs détails. Interface avec un formulaire pour insérer et éditer un élément.
- ✅ (`reservations`) Interface pour afficher les réservations dans **les détails d'un événement**. L'ajout et la suppression de réservations se font dans **l'édition d'un événement**.
- ✅ Tous les ajouts, modifications et suppressions se font en **AJAX** en appelant les endpoints de l'**API Rest**.

## L'API

Chaque endpoint renvoie une réponse au format JSON.

### Users

```
GET     /api/user
GET     /api/user/get
POST    /api/user/store
PUT     /api/user/update
DELETE  /api/user/destroy
```

### Events

```
GET     /api/event
GET     /api/event/get
POST    /api/event/store
PUT     /api/event/update
DELETE  /api/event/destroy
```

### Reservations

```
GET     /api/reservation
GET     /api/reservation/get
POST    /api/reservation/store
DELETE  /api/reservation/destroy
```