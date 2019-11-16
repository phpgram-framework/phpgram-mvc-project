<?php
/**
 * phpgram mvc
 *
 * This File is part of the phpgram mvc framework
 *
 * Web: https://gitlab.com/grammm/php-gram/phpgram-mvc-project
 *
 * @license https://gitlab.com/grammm/php-gram/phpgram-mvc-projectblob/master/LICENSE
 *
 * @author Jörn Heinemann <joernheinemann@gmx.de>
 */

namespace App\Core\Factories;

class Lang extends Factories
{
	private static $_instance, $lang, $side, $langs=array();

	/**
	 * Läd die Sprachdatei
	 */
    private function getLangData()
	{
    	self::$langs=self::loadJSON(self::$lang_path.self::$lang.DIRECTORY_SEPARATOR.self::$side.".json");
	}

	/**
	 * Gibt die aktuel ausgewählte Sprache zurück
	 * Wenn keine gefunden wurde wird die Standardsprache gewählt
	 * @return bool|mixed
	 * Gibt die Sprache zurück
	 * oder false wenn es keine gibt
	 */
	public function islang()
	{
		$lang = SessionFactory::getSession()->get('user','lang');

		//wenn sprache nicht gesetzt setzte std sprache in die session
		if(!$lang){
			$lang=$this->getStdLang();

			SessionFactory::getSession()->set("user",[
				"lang"=>$lang
			]);
		}

		return $lang;
	}

	/**
	 * Ändert die aktuelle Sprache zur übergebenen Sprache
	 * Setzt die neue auch in den Cookie
	 * @param mixed $lang
	 */
	public static function changeLang($lang)
	{
		//session änderung
		SessionFactory::getSession()->set("user",[
			"lang"=>$lang
		]);
	}

	/**
	 * Gibt die Standardsprache zurück aus der configdatei
	 * @return mixed|string
	 */
	public function getStdLang()
	{
    	$langs=self::loadJSON(self::$lang_path."suplangs.json");
    	return $langs["stdlang"];
	}

	/**
	 * Gibt alle in der Configdatei enthaltenen Sprachen zurück
	 * @return mixed|array
	 */
	public function getAvaLang()
	{
    	$langs=self::loadJSON(self::$lang_path."suplangs.json");
    	unset($langs["stdlang"]);	//Index der Standardsprache wird hier nicht gebraucht
		return $langs;
	}

	/**
	 * Identifizert eine Sprache
	 * Gibt entweder den Namen der Sprache oder die Sprachid zurück
	 * @param int $id
	 * Der Name der Sprache u der die Id passt
	 * @param bool|string $q
	 * Die Id zu dem der Name passt
	 * @return bool|int|string
	 */
	public function getLangById($id,$q=false)
	{
		$langs=self::loadJSON(self::$lang_path."suplangs.json");

		//Gibt namen der Sprache zurück
		if(!$q){
			return $langs[$id];
		}

		//Sucht zu einem gegebenen Namen die Sprachid
		$key=array_search($id,$langs);

		if(is_bool($key)){
			return false;
		}

		return $key;
	}

	/**
	 * Gibt ein neues Objekt zurück
	 * @return Lang
	 */
	public static function lang()
	{
		if(!isset(self::$_instance)) {
			self::$_instance = new Lang();
		}
		return self::$_instance;
	}

    /**
     * Übergibt den richtigen Sprachstring
     * @param $side
	 * auf welcher Seite soll der String angezeigt werden
     * @param $part
	 * welcher Teil der Seite steht der String
     * @return mixed|string
     */
    public static function getLang($side,$part)
	{
		$lang = self::lang()->islang();	//Ausgewählte Sprache

        //wenn noch keine instance erzeugt bzw sprache geändert wurde
        if(!isset(self::$lang) || self::$side!=$side || self::$lang!=$lang || !isset(self::$langs)){
            self::$lang=$lang;
			self::$side=$side;
            self::lang()->getLangData(); //Sprachdatei
        }

        return self::$langs[$part];
    }

    public static function loadJSON($path)
	{
		$file = file_get_contents($path);

		return json_decode($file, true);
	}
}