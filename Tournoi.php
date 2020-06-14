<?php


class Tournoi {

	
	public function __construct() {
    register_activation_hook(__FILE__,array('Tournoi','install')); 
    register_deactivation_hook(__FILE__,array('Tournoi','desactivate'));
    register_uninstall_hook(__FILE__,array('Tournoi','uninstall'));
	}

	public function menu_html_tournoi()
  {
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p>Bienvenue sur la page de gestion des tournois</p>';
  }

  

  public static function install_db(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."Tournoi (id int(11) AUTO_INCREMENT PRIMARY KEY, name varchar(50)");
}

public static function uninstall_db(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."Tournoi;"); 
}

public static function install(){
    Tournoi::install_db();
}

public static function uninstall(){
    Tournoi::uninstall_db();
}

public static function desactivate(){

}


}

new Tournoi;