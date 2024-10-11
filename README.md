# F5-challenge

<img src="https://jorgebenitezlopez.com/github/symfony.jpg">

# CRUD de imágenes con Symfony

Todo proyecto crece y es mejor utilizar un framework de calidad como Symfony que está muy bien construido, es Open Source y sigue los mejores y más actuales paradigmas de programación: MVC

Utilizo Bootrstrap por simplificar el proceso de maquetación

He optado por SQLite para la base de datos por su facilidad de configuración y al ser un sistema compacto

Utilizo JS y Tooltipster para la validaciones

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP: PHP 8.2.3 (cli). Por ejemplo se puede descargar en OSX con: https://formulae.brew.sh/formula/php
- Composer: https://getcomposer.org/download/

# Pasos para la instalación de Symfomy y paquetes

- symfony new image-gallery  --version=5.4
- composer require symfony/orm-pack (Sin docker)
- composer require symfony/maker-bundle
- composer require form validator twig-bundle security-csrf annotations
- composer require --dev symfony/profiler-pack
- composer require symfony/form
- composer require symfony/validator
- composer require --dev symfony/test-pack 

# Configuración y creación de entidades

- Instalar y actualizar dependencias. composer update
- Modificamos el .env para que genere un sqlite (https://www.sqlite.org/index.html)
- php bin/console doctrine:schema:update --force (Actualizamos la base de datos)
- Ejecutar el servidor:  symfony server:start
- Para ejecutar los Tests: php bin/phpunit tests/ImageTest.php

# Referencias

https://symfony.com/doc/5.4/security/user_providers.html
https://jnjsite.com/symfony-tutorial-5-los-controladores-y-el-enrutamiento/
https://symfony.com/doc/5.4/forms.html
https://symfony.com/doc/5.4/testing.html
https://github.com/symfony/panther#testing-usage

# Tareas pendientes

- Utilizar un S3 de Amazon para subir las imágenes.
- Hacer un login




