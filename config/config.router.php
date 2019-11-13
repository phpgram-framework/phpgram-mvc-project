<?php
/**
 * Configdatei für das Routing
 */

//Soll Routingmethode geprüft werden
const CHECKRM = true;

//Soll der letze / von der URL ignoriert werden
const STRIM = true;

//Caching
//Sollen den Routes gecached werden
const ROUTECACHING=false;

//Cache der Routes
const ROUTECACHE="";

//Placeholder
/*
 * Hier können eigene Placeholder erstellt werden
 * https://courses.cs.washington.edu/courses/cse190m/12sp/cheat-sheets/php-regex-cheat-sheet.pdf
 */
use Gram\Route\Parser\StdParser;

/*
StdParser::addDataTyp('lang','de|en');
StdParser::addDataTyp('langs','es|ru|fr');
*/