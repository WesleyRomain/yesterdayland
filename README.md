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
   cd yesterdayland

2. Composer dependencies installeren  
   composer install

3. Node dependencies installeren  
   npm install

4. .env-bestand aanmaken  
   cp .env.example .env

5. Applicatiesleutel genereren  
   php artisan key:generate

6. Database instellen in `.env`  
   DB_DATABASE=yesterdayland  
   DB_USERNAME=root  
   DB_PASSWORD=

7. Storage koppelen  
   php artisan storage:link

8. Migraties en seeders uitvoeren  
   php artisan migrate:fresh --seed

9. Vite starten (voor CSS en JS)  
   npm run dev

10. Project starten  
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

# Extra functionaliteiten

### Admin
- Admins krijgen een tabel van de bestellingen die gemaakt zijn
- Boodschappen volgens een component bij toevoegen, verwijderen en aanmaken nieuwe items (volgens een component)

### Seeders
- Default seeders toegevoegd: Start ticketverkoop, Yori de Tijdrotter (bewoner), FAQ's (categorieën + vragen)

## Extra hulpmiddelen - gebruik van AI

Bij de ontwikkeling van dit project is gebruikgemaakt van AI-tools als ondersteunen hulpmiddel, met name ChatGPT (OpenAI) en Microsoft Copilot.

De tools zijn ingezet voor:
- Het genereren van basisstructuren voor Laravel-controllers, models en views (om de auteur op weg te helpen, geenszins volledige aannames)
- Hulp bij het begrijpen en toepassen van Laravel- en PHP-concepten
- Het oplossen van syntax- en logische fouten

Alle door AI gegenereerde code is door de auteur (Wesley Romain) kritisch geëvalueerd, aangepast en geïntegreerd in het project.
De uiteindelijke architectuur, basislogica, validaties en functionaliteiten zijn zelfstandig uitgewerkt.
De auteur kan de volledige code toelichten en verantwoorden.


## Bronvermeldingen (APA-stijl)

Aertssens, T. (2023). *Web Essentials* [Cursus]. Erasmushogeschool Brussel.

Blade Templates – Laravel 11.x. (2026). *Laravel documentation*. Geraadpleegd op 2 januari 2026, in Bierbeek, via https://laravel.com/docs/11.x/blade

De Boeck, W. (2024). *Web Advanced* [Cursus]. Erasmushogeschool Brussel.

Heyman, B. (2025–2026). *Backend Web* [Cursus]. Erasmushogeschool Brussel.

Laravel Daily. (2026). *Admin User, Route Groups, Middleware*. Geraadpleegd op 27 december 2025, om 17:00 in Bierbeek, via https://laraveldaily.com/

Laravel. (2026). *Laravel documentation*. Geraadpleegd op https://laravel.com/docs

MDN Web Docs. (2026). *CSS reference*. Geraadpleegd op https://developer.mozilla.org/

Microsoft. (2026). *Microsoft Copilot – General development assistance*. Geraadpleegd via https://copilot.microsoft.com/

Nesbot, B. (2026). *Carbon PHP API documentation*. Geraadpleegd op https://carbon.nesbot.com/docs/

OpenAI. (2026). *ChatGPT – General programming assistance*. Geraadpleegd op https://chat.openai.com/

PHP Group. (2026). *PHP manual*. Geraadpleegd op https://www.php.net/docs.php

Sling Academy. (2026). *Eloquent: Define model with optional/nullable fields*. Geraadpleegd op 29 december 2025, via https://www.slingacademy.com/

Sling Academy. (2026). *Laravel Eloquent: How to add UNIQUE constraint*. Geraadpleegd op 29 december 2025, om 18:30, via https://www.slingacademy.com/

Stack Overflow. (2026). *Stack Overflow – Developer Q&A*. Geraadpleegd op https://stackoverflow.com

Tailwind Labs. (2026). *Tailwind CSS documentation*. Geraadpleegd op https://tailwindcss.com/docs

Unicode Consortium. (2026). *Unicode character reference*. Geraadpleegd op https://unicode.org/
