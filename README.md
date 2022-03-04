# Projet : Tests_unitaires
*YNOV Aix-En-Provence 2022*

![example workflow](https://img.shields.io/github/workflow/status/GB-Titi/Tests_unitaires/CI?label=build)


## Contributeurs : 

- BARONI-QUINTAS Marco
- RUIZ Tom
- MATTEOLI Tristan

## Lancement de l'application

*Le .env est défini sur la base de donnée des tests : lessons_test afin de permettre la première étape : le lancement des tests.*

**Initilisation du projet**

>```
> git clone https://github.com/GB-Titi/Tests_unitaires.git
> cd Tests_unitaires
> cd .\Back\
> docker-compose build
> docker-compose up -d
>```


**Lancement des tests Back**

>```
> docker-compose exec app bash
> XDEBUG_MODE=coverage ./vendor/bin/phpunit  --coverage-html=out/
>```
> - Il faut ensuite lancer liveserveur à la racine du projet.
> - On se rend ensuite sur l'url 'http://127.0.0.1:5500/Back/out/index.html'

**Lancement des tests front**

> - Ouvrez un nouveau terminal puis tapez : 
> ```
> cd .\Front\
> npm install
> npm run test
> ```

**Lancement de l'application front**

> - Il faut tout d'abord modifier le fichier .env
> - Remplacez la ligne numéro 31 par : DATABASE_URL="mysql://root:root@db:3306/lesson_test_test"
> - Ouvrez un nouveau terminal puis tapez : 
> ```
> cd .\Front\
> npm install
> npm start
> ```
