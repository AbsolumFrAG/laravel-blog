# Maquette Excalidraw

## Accueil

![](Accueil%20Blog.png)

## Panel Admin
![](Admin%20Blog.png)

# Démarrer le projet

```
git clone git@github.com:AbsolumFrAG/laravel-blog.git
cd laravel-blog
composer install
php artisan key:generate
php artisan storage:link
```

Après avoir rempli les variables d'environnement pour se connecter à la BDD exécutez les commandes suivantes :

```
php artisan migrate:fresh
php artisan serve
npm install
npm run dev
```

Ouvrir la page http://localhost:8000.

Pour ouvrir le panel administrateur, accédez à cet URL : http://localhost:8000/admin.
