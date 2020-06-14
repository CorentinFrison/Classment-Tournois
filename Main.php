<?php

 /*
 Plugin Name: Classements-Tournois
 Description: Classements-Tournois
 Author: Frison Corentin
 License: GPL3
 Text Domain: Classements-Tournois
 Version: 1.0.0
 */

class Main {

	
	public function __construct() {

        include_once plugin_dir_path( __FILE__ ).'/Classement.php';
        include_once plugin_dir_path( __FILE__ ).'/Tournoi.php';
		add_action('admin_menu', array($this, 'add_admin_menu'));

    }
    	

	public function add_admin_menu()
  {
    add_menu_page('Classements-Tournois', 'Classement-Tournois', 'manage_options', 'main', array($this, 'menu_html_main'));
    add_submenu_page('main', 'Gestions des Classements', 'Classements', 'manage_options', 'classements', array('Classement', 'menu_html_classement'));
    add_submenu_page('main', 'Gestions des Tournois', 'Tournois', 'manage_options', 'tournois', array('Tournoi', 'menu_html_tournoi'));
  }

  

  public function menu_html_main()
  {
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
  }

}
        
new Main;