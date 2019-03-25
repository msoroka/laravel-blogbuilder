# BlogBuilder

BlogBuilder to aplikacja blogowa oparta na Laravel 5.7.\
Wszystkie funkcjonalności zostały opisane w [dokumentacji](https://github.com/msoroka/laravel-blogbuilder/blob/master/documentation/User%20Stories.pdf).\
Dostępne są również [diagramy UML](https://github.com/msoroka/laravel-blogbuilder/tree/master/documentation/diagrams).\
Aplikacja jest dostępna pod adresem [https://blogbuilder.edu.pl](https://blogbuilder.edu.pl)/

### Uruchomienie

Aplikacja posiada skonfigurowany plik **docker-compose.yml** dzięki czemu można uruchomić ją za pomocą [Dockera](https://www.docker.com/) bez konieczności konfigurowania całego środowiska deweloperskiego. Poniżej kolejne kroki, które należy podjąć.

- Zbudowanie obrazu
```sh
$ docker-compose up
```
- Utworzenie zmiennej środowiskowej 
```sh
$ cp .env.example .env
```
 - Otworzenie pliku **.env** dowolnym edytorem tekstowym i ustawienie komunikacji z bazą danych
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=blogbuilder
DB_USERNAME=blog
DB_PASSWORD=blog123
```
 - Utworzenie klucza aplikacji, uruchomienie migracji i seederów
```sh
$ docker-compose exec app composer update
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:refresh --seed
```
- Aplikacja jest teraz dostępna pod adresem
```sh
localhost:8080
```
