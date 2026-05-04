# Laravel Biblioteka

Ovo je CRUD web aplikacija za upravljanje bibliotekom razvijena u Laravel frameworku.

## Funkcionalnosti

- Dodavanje knjiga
- Uređivanje knjiga
- Brisanje knjiga
- Pregled svih knjiga
- Login i registracija korisnika

## Tehnologije

- Laravel (PHP)
- MySQL
- Blade
- Bootstrap

## Instalacija

1. Klonirati projekat:
   git clone https://github.com/Maki1701SE/WPDprojekat.git

2. Ući u folder:
   cd biblioteka-laravel

3. Instalirati zavisnosti:
   composer install
   npm install

4. Kopirati .env fajl:
   cp .env.example .env

5. Generisati aplikacijski ključ:
   php artisan key:generate

## Baza podataka

Baza se nalazi u folderu:
database/dump/biblioteka.sql

Potrebno je:
- Kreirati bazu u phpMyAdmin
- Importovati navedeni SQL fajl

## Pokretanje aplikacije

php artisan serve
npm run dev
