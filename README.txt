Excellent 💪 voici un **README clair, complet et professionnel** adapté à ton **projet Gestion de Vente**, en reprenant la structure d’un vrai projet Laravel **full stack** (backend Laravel + frontend intégré) avec **deux interfaces distinctes : une pour l’administrateur et une pour le vendeur** (plateforme de vente).

---

# 🛒 Gestion de Vente

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🧾 À propos du projet

**Gestion de Vente** est une application web complète développée avec **Laravel**.
Elle permet la gestion centralisée des ventes, produits, catégories, clients et utilisateurs avec deux interfaces principales :

* 🧑‍💼 **Interface Administrateur** : pour gérer les utilisateurs, les ventes, les produits, les statistiques et les rapports.
* 🛍️ **Interface Vendeur** : pour gérer les commandes, les clients et effectuer les ventes en temps réel via une interface simple et rapide.

Ce projet est conçu pour être **modulaire**, **sécurisé** et **rapide**, adapté à une utilisation en entreprise (gestion de stock, ventes quotidiennes, suivi des performances).

---

## ⚙️ Stack technique

* **Backend** : Laravel 11
* **Base de données** : PostgreSQL ou MySQL
* **Frontend** : Blade + Tailwind CSS (ou Vue.js si activé)
* **Authentification** : Laravel Breeze / JWT
* **Gestion des rôles** : Middleware (admin / vendeur)

---

## 🗄️ Configuration de la base de données

Dans ton fichier `.env`, configure ta base :

```env
APP_NAME=GestionVente
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=gestionvente
DB_USERNAME=username
DB_PASSWORD=password

JWT_SECRET=ton_secret_jwt
```

---

## 🚀 Installation du projet

```bash
# 1️⃣ Cloner le projet
git clone https://github.com/ToslinRazafy/Gestion-de-Vente.git
cd Gestion-de-Vente

# 2️⃣ Installer les dépendances backend
composer install

# 3️⃣ Créer le fichier .env
cp .env.example .env

# 4️⃣ Générer la clé d’application
php artisan key:generate

# 5️⃣ Configurer la base de données et migrer
php artisan migrate --seed

# 6️⃣ Lancer le serveur
php artisan serve
```

> Par défaut, l’application tourne sur :
> 👉 [http://localhost:8000](http://localhost:8000)

---

## 👤 Interfaces

### 🧑‍💼 Interface Administrateur

* Tableau de bord (ventes, revenus, activité récente)
* Gestion des produits, catégories et fournisseurs
* Gestion des utilisateurs (vendeurs)
* Suivi des commandes et statistiques
* Gestion du stock (ajout / suppression / alerte seuil)

### 🛍️ Interface Vendeur

* Interface simple de **point de vente (POS)**
* Enregistrement rapide des ventes et paiements
* Historique des transactions
* Accès limité aux produits autorisés
* Impression de reçus / factures

---

## 🧠 Fonctionnement général

* L’application repose sur un système **multi-rôles** :

  * `admin` → accès complet au back-office
  * `vendeur` → accès limité à la partie vente
* Les rôles sont gérés via des **middlewares** Laravel.
* Les produits, commandes et utilisateurs sont gérés à travers des **contrôleurs REST**.
* L’authentification est sécurisée par **JWT** et **bcrypt** pour les mots de passe.

---

## 🧰 Scripts utiles

```bash
# Lancer le serveur local
php artisan serve

# Rafraîchir la base avec données de test
php artisan migrate:fresh --seed

# Nettoyer le cache
php artisan optimize:clear
```


## 🧑‍💻 Auteur

**Toslin Razafitsotra**
💼 Développeur Full Stack