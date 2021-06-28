<?php
class Configuration{
	
	private static $database= false;
   
	public static function init_config (){
		
            if(!self::$database){
		$configuration = parse_ini_file (CONFIGURATION.DS.'conf.ini',true);

		$database = $configuration['database'];
		
		self::$database = $database;
            }
            return self::$database;
	
		
			
		}
		
	public static function dataBase () {
		return self::$database;
	}
	
}


?>
