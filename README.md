# Test technique pour Gorilles

## Technologies utilisées

- **Environnement de développement :** Laragon
    - Apache, MySQL, HeidiSQL
- **Langages :** HTML, PHP, Javascript
- **Framework :** Laravel 8
    - **Moteur de template :** Blade
    - **ORM :** Eloquent
    
## Téléchargement & installation

Placez-vous dans le dossier où vous voulez cloner le repository puis entrez la commande :

```
git clone https://github.com/iArcadia/gorilles-test.git
```

Une fois le projet cloné en local, déplacez-vous à la racine de ce dernier, puis executez la commande suivante :

```
# Cette commande permet de créer les tables de la BDD à partir des fichiers de migrations
# puis de les remplir des jeux de tests via les fichiers de seed.
php artisan migrate --seed

# Si vous voulez revenir à cet état initial après avoir fait quelques tests, executez :
php artisan migrate:refresh --seed
```