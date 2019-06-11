# Smart Forms


### Naslov projekta:
Smart Forms 

### Mentor: Boštjan Kežmah

### Kazalo:

[Besedilo naloge](#naša-naloga)

[Verzije in funkcionalnosti](#verzije-in-funkcionalnosti)

[Zahteve in namestitev v sistem](#namestitev)

[Poročilo](#poročilo)

### Naša naloga
Pametni obrazci so namenjeni uporabnikom, ki želijo sestaviti obrazce oziroma vloge in osebam, ki želijo izpolniti vloge. S pomočjo spletnega urejevalnika lahko ustvarimo željeno vsebino in s pomočjo gradnikov definiramo vnosna polja za potrebne podatke. Pri izpolnjevanju takšne vloge ni klasičnega pisanja na list papirja, ampak nas čarovnik za izpolnjevanje vodi skozi celotno vsebino pri čemer vnašamo podatke v vnosna polja. Po končanem postopku imamo opcijo shranjevanja izpolnjene vloge v naš profil in pretvorbo v pdf obliko.

### Specifikacije
- Kreiranje obrazcov in vlog s pomočjo gradnikov
- Shranjevanje vlog
- Pregled in iskanje vlog
- Izpolnjevanje
- Shranjevanje izpolnjenih obrazcev
- Prenos izpolnjenih vlog v .pdf, .docx, .odf obliki
- Pošiljanje vlog po E-pošti

### Tehnologije
- Laravel
- Php
- Materialize
- Eloquent (ORM)

### Okolje
- Visual Studio Code
- Xampp

## Verzije in funkcionalnosti

| Verzija           | Funkcionalnosti|
| ----------------- |------------------------------|
| `1.0`             | `- Osnutek strani in registracija in vpis uporabnika`                             |
| `2.0`             | `- Delujoča podatkovna baza z osnovnimi tabelami`                                 |
| `3.0`             | `- Implementacija shranjevanja obrazcev v podatkovno bazo`                        |
| `4.0`             | `- Implementacija izpolnjevanja obrazcev in pretvorba v različne formate`         |
| `5.0`             | `- Implementacija urejanja obrazcev in uporabnika`                                |
| `6.0`             | `- Zadnji popravki in testirana delujoča končna verzija z vsemi funkcionalnostmi` |

## Namestitev

### Zahteve in namestitev za razvijalce
Za namestitev potrebujete:
- XAMPP ali drugo podobno orodje
- Laravel

V direktoriju XAMPP poiščite mapo "htdocs" (default path:C:\xampp\htdocs) in vanj položite celoten projekt [Pametni Obrazci](https://github.com/luks104/praktikum_2019/tree/master/Praktikum2). V istem direktoriju XAMPP-a poiščite mapo "apache", nato odprite mapo "conf" in nazadnje odprite mapo "extra" (default path:C:\xampp\apache\conf\extra). Odprite datoteko "httpd-vhosts.conf" in dodajte:

```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/Praktikum2/public"
    ServerName praktikum2.test
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost> 
```
Nato kot administrator odprite datoteko "hosts" ki se nahaja na direktoriju: (C:\Windows\System32\drivers\etc) ter dodajte:
```
127.0.0.1 localhost
127.0.0.1 praktikum2.test
```

Zaženite program XAMPP in poženite Apache in mySQL procesa z klikom na gumb "Start".

<img alt="[Slika]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/XAMPP.png" width="500">

Dostopajte do podatkovne baze na spletnem naslovu (http://localhost/phpmyadmin) in naredite novo podatkovno bazo poimenovano "praktikum".

<img alt="[SlikaBaza]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/kreiranje_baze.png" width="500">

Iz github repositorija v mapi "podatkovna baza" prenesite datoteko ["praktikum.sql"](https://github.com/luks104/praktikum_2019/blob/master/praktikum.sql) in jo shranite na željeno mesto.

V levem stolpcu izberite kreirano bazo ("praktikum") in izberite "Uvozi" v zgornjem navigacijskem meniju. Datoteko "praktikum.sql", ki ste jo prenesli v prejšnem koraku izberite z pomočjo gumba "Izberite datoteko". Nazadnje še poženete skripto z pomočjo gumba "Izvedi" v spodnjem delu strani.

<img alt="[SlikaBazaVnos]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/skripta.png" width="800">

Dostopajte do spletne strani preko URL naslova: praktikum2.test

## Zahteve in namestitev za končne uporabnike
Za namestitev potrebujete:
- FTP dostop (izberite enega od ponudnikov)
- klient ["WinSCP"](https://winscp.net/eng/download.php) (ali ekvivalenten program)
- zadosten prostor na disku
- zadostno hitrost interneta

V nadzorni plošči ustvarite novo podatkovno bazo in jo poimenujte"praktikum". Ustvarite nov račun z poljubnim uporabniškim imenom in geslom ter mu omogočite dostop do kreirane baze "praktikum". Iz github repositorija prenesite datoteko ["praktikum.sql"](https://github.com/luks104/praktikum_2019/blob/master/praktikum.sql) in jo shranite na poljubno mesto na vašem računalniku. Na nadzorni plošči izberite dostop do konfiguracije vaše podatkovne baze "praktikum" (v večini primerov je link poimenovan "phpMyAdmin"). Odprla se vam bo stran, na kateri lahko urejate podatkovno bazo. V zgornjem navigacijskem meniju izberite "Uvozi" (angl. "Import") in pritisnite na gumb "Izberite datoteko" (angl. "Choose file"). Izberite datoteko ["praktikum.sql"](https://github.com/luks104/praktikum_2019/blob/master/praktikum.sql), katero ste prenesli na svoj računalnik. Po končanem izboru, spremembe še potrdite z pritiskom na gumb "Izvedi" (angl. "Go").  Baza je ustvarjena.

<img alt="[SlikaBazaVnos]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/skripta.png" width="800">

Odprite klient "WinSCP" in vnesite vaše podatke za vpis v vaš račun ponudnika storitev FTP. Po uspešnem vpisu se vam bodo naložile vaše datoteke. 

<img alt="[SlikaWInSCP]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/WinSCP.png" width="600">

Prenesite celoten projekt ["Praktikum2"](https://github.com/luks104/praktikum_2019/tree/master/Praktikum2) in ga shranite na vaš računalnik. V klientu "WinSCP" ustvarite novo mapo z imenom "Praktikum2" in vanj prenesite vso vsebino iz projekta, ki ste ga shranili na vaš računalnik, razen mape "public".

<img alt="[SlikaIzborDatotek]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/Izbor_datotek.png" width="600">

V WinSCP poiščite mapo "public_html" in vanj prenesite vso vsebino iz mape "public", ki se nahaja v prenešenem projektu.

<img alt="[SlikaPublic]" src="https://github.com/luks104/praktikum_2019/blob/master/Porocilo/public.png" width="700">

Po uspešnem prenosu vsebine projekta, v klientu "WinSCP" odprite mapo "public_html", in odprite datoteko index.php. V tej datoteki boste spremenili dve vrstici kode:

```
23 |
24 | require __DIR__.'/../vendor/autoload.php'; ---> require __DIR__.'/../Praktikum2/vendor/autoload.php';
25 |
```
in
```
37 |
38 | $app = require_once __DIR__.'/../materialize/app.php'; ---> $app = require_once __DIR__.'/../Praktikum2/materialize/app.php';
39 |
```

Nato v klientu "WinSCP" odprite mapo "Praktikum2" in v njen poiščite datoteko ".env", ki jo odprete. V njej poiščite odsek za podatkovno bazo in jo uredite:

```
8  |
9  |   DB_CONNECTION=mysql
10 |   DB_HOST=127.0.0.1
11 |   DB_PORT=3306
12 |   DB_DATABASE= ---> Ime vaše baze, ki ste ga nastavili ob kreiranju <---
13 |   DB_USERNAME= ---> Uporabniško ime, ki ima dostop do vaše baze <---
14 |   DB_PASSWORD= ---> Geslo za dostop do vaše baze <---
15 |
```

V mapi "public_html" ustvarite novo datoteko po imenu "Symlink-create.php" in jo odprite. Noter vstavite spodaj prikazano vrstico in shranite.

```
<?php
symlink('/home/---> ime vaše mape pri ponudniku <---/Praktikum2/storage/app/public', home/---> ime vaše mape pri ponudniku <---/public_html/storage);
```

V brskalniku v url vrstico napišite: www.--> vaš url <---.com/Symlink-create.php, kar bo pognalo kodo v datoteki, ki smo jo ustvarili prej in nam omogočilo nalaganje in ogled slik na vaši spletni strani.

Vaša spletna stran je na voljo za uporabo.


Dostopajte do spletne strani preko vašega URL naslova.

## Poročilo

## Ekipa


| [<img alt="Tomaž Zajc" src="https://avatars2.githubusercontent.com/u/49161955?s=400&v=4" width="117">](https://github.com/KnightFury1) | [<img alt="Jure Turk" src="https://github.com/Jurkko.png" width="117">](https://github.com/Jurkko) | [<img alt="Marko Zmazek" src="https://avatars0.githubusercontent.com/u/39406652?s=400&v=4" width="117">](https://github.com/zmazk123) | [<img alt="Luka Gričar" src="https://avatars2.githubusercontent.com/u/33715913?s=400&v=4" width="117">](https://github.com/luks104) |
| ------------- | ------------- | ------------- | ------------- |
| <b>Kowalski</b> | <b>Private</b> | <b>Skipper</b> | <b>Rico</b> |
| Tomaž Zajc | Jure Turk | Marko Zmazek | Luka Gričar |


