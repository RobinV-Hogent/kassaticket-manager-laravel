# Stappen

- Backend
    - Model: Kassaticket aanmaken
    - Controller: endpoint voor het formulier / waarschijnlijk gewoon de "/" route
    - Plek voor de geuploade bestanden op te slaan (bestandsnaam wordt opgeslagen als path in string vorm)
    - Validation: in een aparte file uitwerken

**(EXTRA: admin route voor de totale weergave "/admin-view")**

- Frontend

    - Bootstrap klaarzetten voor gebruik
    - Formulier opstellen (geen error messages vergeten, span elementen)


## Actuele Uitwerking

**Kassaticket model, migration, repository, etc & Database correct ingesteld**

Ten eerste heb ik een model genaamd 'Kassaticket' aangemaakt door gebruik te maken van het commando 'php artisan make:model -mcsr', '-mcsr' heeft er ook direct voor gezorgd dat de migration, controller, seeder en repository file werden aangemaakt

Vervolgens heb ik de migration file aangevuld met de data die opgeslagen moet worden in de database. (2026_03_28_190723_create_kassatickets_table)

De defaults heb ik behouden (id, timestamps), daarnaast heb ik nog drie extra string velden toegevoegd een klant, email en ticket_path die het pad van de afbeelding bijhoudt

Nu kan ik de database updaten naar de nieuwe versie door het commando: php artisan migrate.

Maar eerst voor ik de database kan updaten ga ik eerst de database klaarzetten voor gebruik. Hiervoor moet ik een aantal environment variables aanpassen in de '.env' file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kassaticket_manager
DB_USERNAME=root
DB_PASSWORD=
```

Als ik nu opnieuw de migration wil uitvoeren (php artisan migrate), dan krijg ik de optie op direct de database te genereren vanuit de terminal waarop ik 'yes' op antwoord.

**Authentication via Breeze**

Hiervoor moet ik een package installeren adhv.

```
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
```

Dit maakt nieuwe views voor dashboard, login, register, ...

Als de user kan inloggen dan wil ik dat die wordt gezien als een admin (dit doe ik nu al op voorhand voor wanneer ik de extra admin-view pagina aanmaak, ook wil ik niet dat iedereen zomaar aan de storage aankan, de storage is de plek waar de kassatickets in zullen worden geupload)

**Validation voor wanneer er een formulier gesubmit wordt**

Hiervoor ge ik een request file aanmaken genaamd 'StoreKassaticketRequest' door het commando: php artisan make:request StoreKassaticketRequest

de authorize methode mag van mij true teruggeven dit zorgt ervoor dat eender wie een inzending kan maken

in de rules function definieer ik de regels voor de toevoeging van een nieuw kassaticket.

```
public function rules(): array
{
    return [
        'klant' => 'required|max:100',
        'email' => 'required|email',
        'ticket_path' => 'required'
    ];
}
```

**Front-end**

Ik ga de homepage "/" die de welcome.blade.php file toont hernoemen naar toevoeging_kassaticket en de contents uit de blade file verwijderen

Ik heb Bootstrap toegevoegd aan de applicatie gebruik makend van de node package manager (npm).

Nadat ik de homepage ("/") heb leeggemaakt ben ik bootstrap elementen beginnen toevoegen, waaronder inputs voor de naam, email en een foto van het kassaticket, en ook nog een submit knop.

Deze inputvelden bevinden zich in een formulier die naar een route met de naam 'kassaticket.store' een POST request sturen.

De store method kijkt na ofdat de doorgestuurde data correcte data bevat, indien dit niet het geval is toont de homepage errors.

Die errors heb ik zelf messages gegeven, deze staan in StoreKassaticketRequest.

Vervolgens heb ik de homepagina opgeruimd met bootstrap.


**Toevoeging van de admin-dashboard**

Ten eerste wil ik een nieuwe route aanmaken genaamd admin-dashboard.

```
//web.php

Route::get('/admin-dashboard', [KassaticketController::class, 'admin'])->name('kassaticket.admin');
```

Nu aangezien ik ook twee vershillende pagina's heb is het misschien niet slecht om een layout file aan te maken.

Ik heb hiervoor gewoon gebruik gemaakt van de bestaande app.blade.php layout file. Nu gebruiken "/" en "/admin-dashboard" de app layout.

Hierdoor kijgen beide views een navigation bar bovenaan waar de user kan navigeren tussen verschillende pagina's zoals login, homepage (Kassaticket toevoegen), admin dashboard.

De user kan ook uitloggen aan de hand van de dropdown.

Nu komt de uitwerking van de admin pagina zelf.
Ik will de data tonen in een tabel weergave, waardoor de user kan pagineren




