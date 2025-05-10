# 🌊 Blue Waves - Hostel Management Application

Blue Waves est une application web conçue pour optimiser la gestion quotidienne d'un hostel. Développée avec Laravel pour le back-end et HTML/CSS/JavaScript pour le front-end, elle centralise les opérations de réservation, gestion des chambres, des clients, et des activités pour offrir une expérience utilisateur fluide et moderne.

---

## 🧩 Sommaire

- [📌 Introduction](#-introduction)
- [❓ Problématique](#-problématique)
- [🎯 Objectifs](#-objectifs)
- [🧰 Fonctionnalités](#-fonctionnalités)
- [🏗️ Architecture Technique](#-architecture-technique)
- [🎨 Conception UI/UX](#-conception-uiux)
- [🛠️ Installation et Lancement](#-installation-et-lancement)
- [🧪 Tests](#-tests)
- [🚀 Déploiement](#-déploiement)

---

## 📌 Introduction

L’application **Blue Waves** vise à offrir une solution intuitive et efficace pour gérer les opérations internes d’un hostel. Elle permet un accès centralisé, sécurisé et à distance via n’importe quel appareil connecté.

---

## ❓ Problématique

Les hostels sont souvent confrontés à une gestion manuelle ou décentralisée des opérations telles que les réservations, la gestion des chambres ou encore le suivi des clients. Cela entraîne :
- Des erreurs de planification
- Des pertes de données
- Une baisse d’efficacité générale

**Blue Waves** vise à résoudre ces problèmes par la centralisation et la digitalisation des processus de gestion.

---

## 🎯 Objectifs

- ✅ Centraliser la gestion de l’hostel (réservations, chambres, clients, activités)
- ✅ Améliorer l’expérience utilisateur avec une interface simple et responsive
- ✅ Permettre une gestion à distance via tout appareil connecté

---

## 🧰 Fonctionnalités

### 🔑 Authentification & rôles
- Connexion sécurisée avec rôles :
  - Administrateur
  - Employé
  - Client

### 🛏️ Gestion des chambres
- Visualisation en temps réel des disponibilités
- Catégorisation : dortoirs, chambres privées
- Prix par type de chambre
- Ajout, modification et suppression de chambres

### 📆 Gestion des réservations
- Saisie des dates de séjour, type de chambre, prix
- Gestion des annulations et modifications
- Historique des réservations

### 👥 Gestion des clients
- Enregistrement des coordonnées
- Mise à jour des informations
- Accès client à ses réservations

### 🏄 Gestion des activités
- Liste des activités proposées
- Tarification par type d’activité
- Disponibilités en temps réel
- Réservations d’activités

### 📊 Tableau de bord
- Statistiques clés :
  - Revenu total
  - Nombre de réservations
  - Taux d’occupation
  - Paiements effectués

---

## 🏗️ Architecture Technique

### Front-End
- **HTML5** : structure des pages
- **CSS3** : design responsive
- **JavaScript** : interactivité

### Back-End
- **Laravel (PHP 8+)**
  - Routes et contrôleurs
  - ORM Eloquent
  - Middleware d'accès

### Base de données
- **MySQL**
  - Tables : `clients`, `reservations`, `rooms`, `activities`, `users`
  - Requêtes optimisées

### Hébergement
- Serveur compatible PHP 8+
- HTTPS activé

---

## 🎨 Conception UI/UX

- **Tableau de bord clair** avec graphiques, alertes et données clés
- **Responsive design** : compatible smartphones, tablettes, desktop
- **Formulaires ergonomiques** pour faciliter la saisie utilisateur

---

## 🛠️ Installation et Lancement

```bash
# 1. Cloner le projet
git clone https://github.com/ifital/fils_rouge.git
cd blue-waves

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier d'environnement
cp .env.example .env

# 4. Générer la clé de l'application
php artisan key:generate

# 5. Configurer la base de données dans le fichier .env

# 6. Migrer les tables
php artisan migrate --seed

# 7. Lancer le serveur de développement
php artisan serve

---

## Links

- **Link For all:** [View all Links](https://linktr.ee/abdelalilatifi3);

