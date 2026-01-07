# Yesterdayland - Festival website

Een moderne Laravel-webapplicatie voor het tonen en beheren van festivalinformatie zoals nieuws, FAQ, gebruiksbeheer, etc. 
Dit in het kader van de opdracht "Laravel", Backend Web (Bachelor TI - 2e jaar).

# Installatie

### Vereisten
- PHP 8.2+
- Composer
- Database-software (voor de migrations: bv. MySQL, SQLite, ...)
- Composer
- Node.js + NPM

### Stappen
1. Project clonen
git clone <github-url>
2. Composer install (voor Carbon, Eloquent, routing, Blade, Hashing, enz.)
Composer dependencies installeren
3. Node dependencies installeren (voor CSS, JS en Vite)
npm install
4. env (lokale variabelen) aanmaken
cp .env.example .env
5. Applicatiesleutel genereren
php artisan key:generate
6. In .env database instellen
7. Storage koppelen
php artisan storage:link
8. Migraties + seeders uitvoeren
php artisan migrate:fresh --seed
9. npm run dev
Om Vite + CSS te laten werken
10. Starten project
php artisan serve

# Functionaliteiten

### Gebruikers & Gebruiksbeheer
- Registratie & login.
- Mogelijkheid om paswoord opnieuw in te stellen + remember me.
- Publiek toegankelijke gebruikerspagina's.
- Opties voor de gebruikers om hun account aan te passen (indien ingelogd).
- Gebruiker kan ook een admin zijn, dit geeft toegang tot extra functionaliteiten.
- Create, Read, Update en Delete (CRUD) om gebruikers te beheren (enkel admin).
- Standaard seeder voor admin-gebruiker;

### Nieuws & nieuwsbeheer
- Overzicht van de nieuwsitems.
- Detailpagina per nieuwsitem.
- CRUD-functies voor admin-gebruikers: toevoegen, verwijderen of bewerken van items.
- One-to-Many relatie: een admin kan meerdere nieuwsitems publiceren, één nieuwsitem hoort bij één admin.
- Extra functionaliteit: standaard seeder voor aankondiging ticketverkoop.

### FAQ
- Overzicht van de FAQ-categorieën met bijhorende vragen.
- CRUD-functies voor admin-gebruikers, zowel voor categorieën als vragen.

### Contactformulier
- Eenvoudig contactformulier om vragen te stellen.
- Verzoeken komen in het logbestand terecht (Men kan ook een mailserver instellen, indien gewenst).




