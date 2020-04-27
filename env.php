<?php

//Datenbank
//für lokalen Betrieb anpassen!
//Driver
putenv("DB_DRIVER=mysql");
//Host
putenv("DB_HOST=127.0.0.1");
//Port der Db
putenv("DB_PORT=3306");
//Datenbankname
putenv("DB_NAME=");
//DB user
putenv("DB_USER=");
//DB user Passwort
putenv("DB_USER_PW=");

//___________________________________________________________________

//lokale Installation
define("ROOTPATH",__DIR__.DIRECTORY_SEPARATOR);
putenv("ROOT_URL=");
putenv("ROOT_URL_PATH=");

//___________________________________________________________________