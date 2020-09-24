<?php
/*
  Plugin Name: Calendrier d'évènement de Saint Macaire
  Description: Plugin fournissant un widget de calendrier d'évènement
  Author: Entre 2 Web - Jérôme Suhard
  Version: 1.0.0
 */
add_action('widgets_init', 'register_calendrier_e2w');


// Mon premier widget dynamique
class calendrier_e2w extends WP_Widget {

    function __construct() {
        parent::__construct(
            'calendrier_e2w',
            esc_html__( 'CALENDRIER E2W', 'textdomain' ),
            array( 'description' => esc_html__( 'Affiche les coordonnées', 'textdomain' ), )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Nom',
            'id' => 'nom_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Adresse',
            'id' => 'adresse_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Email',
            'id' => 'email_email',
            'type' => 'email',
        ),
        array(
            'label' => 'Téléphone',
            'id' => 'tlphone_tel',
            'type' => 'tel',
        ),
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Output generated fields
        echo '<p>'.$instance['nom_text'].'</p>';
        echo '<p>'.$instance['adresse_text'].'</p>';
        echo '<p>'.$instance['email_email'].'</p>';
        echo '<p>'.$instance['tlphone_tel'].'</p>';
        
        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
            var_dump($instance);die;
        }
        return $instance;
    }
}

add_action( 'widgets_init', 'register_calendrier_e2w' );

function register_calendrier_e2w() {
    register_widget( 'calendrier_e2w' );
}
// Revenons un peu plus en détail sur le code ci-dessus. Contrairement au widget statique, nous avons ajouté un tableau contenant différents champs dynamiques. Dans la fonction widget(), nous affichons le contenu de ces champs. Les fonctions field_generator() et form() servent à afficher les champs dans le backend, tandis que la fonction update() permet de gérer l’update du contenu du widget.

// Maintenant que votre widget dynamique est créé, il ne vous reste plus qu’à le glisser dans la zone à widgets désirée et remplir ses différents champs :)

// widgets-dynamique

 

// Si vous ne voulez pas utiliser les champs mais que vous préférez avoir quelque chose de plus automatique, libre à vous d’aller chercher vos différents types de posts et de les afficher dynamiquement au sein du widget :)

 

// 4 - Désactiver les widgets par défaut
// À l’installation d’un site WordPress, plusieurs widgets sont ajoutés. Que ça soit dans un souci de confort pour l’éditeur du site ou de sûreté concernant la compatibilité avec le thème, désactiver ces widgets par défaut peut-être une bonne idée.

// Pour cela, nous allons devoir ajouter une fonction dans functions.php de notre thème parent. Nous allons l’appeler remove_default_widgets :

// add_action( 'widgets_init', 'remove_default_widgets' );
// function remove_default_widgets() {
// }
// À l’intérieur de cette fonction remove_default_widgets(), il nous faudra appeler la fonction unregister_widget() en y spécifiant quel widget nous désirons supprimer.
// Par exemple, si nous voulons enlever le widget du calendrier, nous ajouterons dans la fonction remove_default_widget() ce code-ci :


// unregister_widget( 'WP_Widget_Calendar' );
// La liste des différents widgets ajoutés par défaut par WordPress est consultable dans la documentation officielle de WordPress.

// Voici le code complet qui vous permettra d’enlever tous les widgets par défaut (code à ajouter dans functions.php) :

// add_action( 'widgets_init', 'remove_default_widgets' );

// function remove_default_widgets() {
//   unregister_widget( 'WP_Widget_Pages' ); // Le widget Pages
//   unregister_widget( 'WP_Widget_Calendar' ); // Le widget Calendrier
//   unregister_widget( 'WP_Widget_Archives' ); // Le widget Archives
//   unregister_widget( 'WP_Widget_Links' ); // Le widget Liens
//   unregister_widget( 'WP_Widget_Media_Audio' ); // Le widget Audio
//   unregister_widget( 'WP_Widget_Media_Image' ); // Le widget Image
//   unregister_widget( 'WP_Widget_Media_Video' ); // Le widget Vidéo
//   unregister_widget( 'WP_Widget_Media_Gallery' ); // Le widget Galerie
//   unregister_widget( 'WP_Widget_Meta' ); // Le widget Meta
//   unregister_widget( 'WP_Widget_Search' ); // Le widget Rechercher
//   unregister_widget( 'WP_Widget_Text' ); // Le widget de Texte
//   unregister_widget( 'WP_Widget_Categories' ); // Le widget Catégories
//   unregister_widget( 'WP_Widget_Recent_Posts' ); // Le widget Articles récents
//   unregister_widget( 'WP_Widget_Recent_Comments' ); // Le widget Commentaires récents
//   unregister_widget( 'WP_Widget_RSS' ); // Le widget RSS
//   unregister_widget( 'WP_Widget_Tag_Cloud' ); // Le widget Nuage d'étiquettes
//   unregister_widget( 'WP_Nav_Menu_Widget' ); // Le widget Menu personnalisé
//   unregister_widget( 'WP_Widget_Custom_HTML' ); // Le widget HTML personnalisé
// }
 

// 5 - Sources
// Codex WordPress Widgets : https://codex.wordpress.org/Widgetizing_Themes
// Codex WordPress Widgets par défaut : https://codex.wordpress.org/Function_Reference/unregister_widget
// Lire d'autres articles en rapport avec WordPress

 

 
// CATÉGORIES :
// TECH WEB

// TAGS :
// PHP WORDPRESS
// Vous avez aimé cet article ? Suivez-nous sur Facebook pour ne rien manquer !

