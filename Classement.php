<?php


class Classement {

	
    public function __construct() 
    {
        register_activation_hook(__FILE__,array('Classement','install')); 
        register_deactivation_hook(__FILE__,array('Classement','desactivate'));
        register_uninstall_hook(__FILE__,array('Classement','uninstall'));
        add_action('admin_init', array($this, 'register_settings_classement'));
    }

    public function register_settings_classement()
    {
        add_settings_section('classement_section', 'Formulaire de création de classement', array($this, 'section_html'), 'classement_settings');
        add_settings_field('classement_titre', 'Titre du classement', array($this, 'titre_html'),'classement_settings', 'classement_section');

        register_setting('classement_settings', 'classement_titre');
    }

    public function section_html(){
        echo 'Renseignez les paramètres d\'envoi du classement.';
    }

    public function titre_html(){
        ?>
        <input type="text" name="classement_titre" value="<?php echo get_option('classement_titre')?>"/>
        <?php
    }


    public function menu_html_classement()
    {
        echo '<h1>'.get_admin_page_title().'</h1>';
        echo '<p>Bienvenue sur la page de gestion des classements</p>';
        ?>
        <form method="post" action="options.php">
            <?php settings_fields('classement_settings') ?>
            <?php do_settings_sections('classement_settings') ?>
            
            <?php submit_button(); ?>
        </form>
        <?php
    }

    public static function install_db(){
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."Classement (id int(11) AUTO_INCREMENT PRIMARY KEY, idTournoi int(11)");
    }

    public static function uninstall_db(){
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."Classement;"); 
    }

    public static function install(){
        Classement::install_db();
    }

    public static function uninstall(){
        Classement::uninstall_db();
    }

    public static function desactivate(){
   
    }
  



}

new Classement;
