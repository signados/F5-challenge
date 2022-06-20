# forF5
Prueba técnica

¡Hola!

El repo está en Github: https://github.com/signados/forF5
En producción está funcionando con Apache en: https://jorgebenitezlopez.com/
Aquí dejo un vídeo de la instalación: https://jorgebenitezlopez.com/uploads/instalacion.mp4


REQUISITOS

    Github CLI: https://cli.github.com/

    Composer: https://getcomposer.org/download/

    Symfony CLI: https://symfony.com/download

INSTALACIÓN

    Clonar: gh repo clone signados/forF5; cd forF5

    Instalar dependencias: composer install

    Crear la bsade de datos local:
        php bin/console doctrine:schema:create

    Ejecutar el servidor:  symfony server:start

    Probar en: http://127.0.0.1:8000/

    También se puede probar en Apache con MAMP apuntado el host a la carpeta /public

    Para ejecutar los Tests: php bin/phpunit tests/ImageTest.php

EXPLICACIÓN

    Utilizo el framework Symfony porque sigen las mejores prácticas en desarrollo web y estoy acostumbrado a trabajar con él. Utilizo la versión 5.4 para trabajar con el php 7.4 que tengo en mi máquina local.
    
    Utilizo Bootrstrap por simplificar el proceso de maquetación

    He optado por SQLite para la base de datos por su facilidad de configuración y al ser un sistema compacto

    Utilizo JS y Tooltipster para la validaciones

    He probado la aplicación en diferentes navegadores y dispositivos y con el estámdar de html: https://validator.w3.org/nu/?doc=https%3A%2F%2Fjorgebenitezlopez.com%2F y la accesibilidad con: https://www.tawdis.net/

    He intentando simplificar todo al máximo



