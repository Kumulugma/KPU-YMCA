Praca zaliczeniowa z przedmiotu: Nowoczesne techniki programowanie

INSTALACJA
------------
### Pakiety

W pierwszej kolejności należy pobrać repozytorium.
Będąc w katalogu root repozytorium należy wykonac komendę:

~~~
composer install
~~~

### Kontener

Drugim krokiem jest zbudowanie kontenera.
Zależnie od konfiguracji należy wykonac komendę:
~~~
docker-compose up
~~~

lub

~~~
docker-compose build
docker-compose up
~~~

W przypadku problemów z budową kontenera można dodać parametr --no-cache

### Host

W przypadku systemu Windows w pliku: C:\Windows\System32\drivers\etc\hosts należy dodać wirtualny host np.

~~~
127.0.0.1	ymca
~~~

### Baza danych

Po uruchomieniu kontenera należy przejść do kontenera i wykonać jeszcze migracje poprzez uruchomienie komendy.

~~~
php yii migrate
~~~