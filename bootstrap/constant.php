<?php
/**
 * Konstante Pfade für das Framework
 */

//Allgemeine Ordner Diese nicht ändern!
define("APPPATH",ROOTPATH.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR);
define("GRAMCONFIG",ROOTPATH.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR);
define("RESOURCES",ROOTPATH.DIRECTORY_SEPARATOR."resources".DIRECTORY_SEPARATOR);

//Templates
define("VIEWS",APPPATH."Views".DIRECTORY_SEPARATOR);
define("TEMPLATES",VIEWS."templates".DIRECTORY_SEPARATOR);
define("TEMPCACHE",VIEWS."cache".DIRECTORY_SEPARATOR);

//Userdata
define("STORAGE",ROOTPATH.DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR);

use Gram\Mvc\Lib\Factories\Factories;

Factories::setUser('\App\Model\User');
Factories::setViewOptions(TEMPLATES);
Factories::setLangPath(GRAMCONFIG."/text/");