<?php
// function dr_adding_styles()
// {
//   wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
// }

// add_action('wp_enqueue_scripts', 'js_adding_styles');

add_theme_support('post-thumbnails');

register_nav_menus(array(
    'header-menu' => 'Header-menu',
    // 'footer-menu' => 'Footer-menu'

));

/** 
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
    require_once($composer_autoload);
    $timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    add_filter('template_include', function ($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });
    return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;







// fonction pour créer des variables globales, accessibles dans tous les fichiers twig
function add_to_context($data)
{

    // on appelle une instance de TimberMenu avec en parametre le menu qu'on veut récupérer
    //$data['menu'] = new TimberMenu('header-menu');
    $data['menu'] = new \Timber\Menu('header-menu');
    return $data;
}



// On ajoute le résultat de notre fonction au context de twig (contexte globale)
add_filter('timber/context', 'add_to_context');

//zone widget
// if (function_exists('register_sidebar')){
function sentinel_widgets_init()
{
register_sidebar(array(
    'name'          => 'Home Footer',
    'id'            => 'home_footer_1',
    'before_widget' => '<div class="white footer-widget col-12 col-md-4 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 2',
    'id'            => 'home_footer_2',
    'before_widget' => '<div class="white footer-widget col-12 col-md-8 m-a p-30 p-10"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 3',
    'id'            => 'home_footer_3',
    'before_widget' => '<div class="white footer-widget col-12 col-md-4 brd1 brd-c2 p-30 "><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 4',
    'id'            => 'home_footer_4',
    'before_widget' => '<div class="white footer-widget col-12 col-md-4 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 5',
    'id'            => 'home_footer_5',
    'before_widget' => '<div class="white footer-widget col-12 col-md-2 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 6',
    'id'            => 'home_footer_6',
    'before_widget' => '<div class="white footer-widget col-12 col-md-2 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 7',
    'id'            => 'home_footer_7',
    'before_widget' => '<div class="white footer-widget col-12 col-md-2 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'Home Footer 8',
    'id'            => 'home_footer_8',
    'before_widget' => '<div class="white footer-widget col-12 col-md-2 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));
register_sidebar(array(
    'name'          => 'header 9',
    'id'            => 'header_9',
    'before_widget' => '<div class="white footer-widget col-12 col-md-7 brd1 brd-c2 p-30"><p id="%1$s" class="widget %2$s">',
    'after_widget' => '</p></div>',
    'before_title' => '<h2 class="color4 p-10 bk3 w-80 m-a t-a-center">',
    'after_title' => '</h2>',
));
}
// }
add_action('widgets_init', 'sentinel_widgets_init');
// show admin bar 
function init_remove_support()
{
    $page_type = 'page';
    $post_type = 'post';

    remove_post_type_support($page_type, 'editor');
    remove_post_type_support($post_type, 'editor');
}
add_action('init', 'init_remove_support', 100);

function wpc_show_admin_bar()
{
    return true;
}
add_filter('show_admin_bar', 'wpc_show_admin_bar');
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function remove_menus()
{

    //    remove_menu_page( 'index.php' );                  //Dashboard
    //    remove_menu_page('edit.php');                   //Posts
    //    remove_menu_page( 'upload.php' );                 //Media
    //    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page('edit-comments.php');          //Comments
    //    remove_menu_page( 'themes.php' );                 //Appearance
    //    remove_menu_page( 'plugins.php' );                //Plugins
    //    remove_menu_page( 'users.php' );                  //Users
    //    remove_menu_page( 'tools.php' );                  //Tools
    //    remove_menu_page( 'options-general.php' );        //Settings

}
add_action('admin_menu', 'remove_menus');

add_action('init', 'my_custom_init');
function my_custom_init()
{
    register_post_type(
        'acts',
        array(
            'label' => 'Associations',
            'labels' => array(
                'name' => 'associations',
                'singular_name' => 'association',
                'all_items' => 'Tous les associations',
                'add_new_item' => 'Ajouter un association',
                'edit_item' => 'Éditer l\'association',
                'new_item' => 'Nouvel association',
                'view_item' => 'Voir l\'association',
                'search_items' => 'Rechercher parmi les associations',
                'not_found' => 'Pas d\'association',
                'not_found_in_trash' => 'Pas d\'association dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'acts'),
            'menu_position' => 2,
            'menu_icon' => 'dashicons-hammer',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true
        )
    );
    register_post_type(
        'corps',
        array(
            'label' => 'pmes',
            'labels' => array(
                'name' => 'pmes',
                'singular_name' => 'pme',
                'all_items' => 'Tous les pmes',
                'add_new_item' => 'Ajouter un pme',
                'edit_item' => 'Éditer la pme',
                'new_item' => 'Nouvelle pme',
                'view_item' => 'Voir la pme',
                'search_items' => 'Rechercher parmi les pmes',
                'not_found' => 'Pas de pme',
                'not_found_in_trash' => 'Pas de pme dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'corps'),
            'menu_position' => 3,
            'menu_icon' => 'dashicons-hammer',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true
        )
    );
    register_post_type(
        'pubs',
        array(
            'label' => 'sevices publics',
            'labels' => array(
                'name' => 'sevices publics',
                'singular_name' => 'sevice public',
                'all_items' => 'Tous les sevices publics',
                'add_new_item' => 'Ajouter un service',
                'edit_item' => 'Éditer le service public',
                'new_item' => 'Nouveau sevice public',
                'view_item' => 'Voir le sevice public',
                'search_items' => 'Rechercher parmi les sevices publics',
                'not_found' => 'Pas de sevice public',
                'not_found_in_trash' => 'Pas de sevice public dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'pubs'),
            'menu_position' => 3,
            'menu_icon' => 'dashicons-hammer',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true
        )
    );
    register_post_type(
        'members',
        array(
            'label' => 'members',
            'labels' => array(
                'name' => 'élus',
                'singular_name' => 'élu',
                'all_items' => 'Touss les élus',
                'add_new_item' => 'Ajouter un élu',
                'edit_item' => 'Éditer l\'élu',
                'new_item' => 'Nouvel élu',
                'view_item' => 'Voir l\'élu',
                'search_items' => 'Rechercher parmi les élus',
                'not_found' => 'Pas d\'élu',
                'not_found_in_trash' => 'Pas d\'élu dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'members'),
            'menu_position' => 4,
            'menu_icon' => 'dashicons-businessperson',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail'),
            'has_archive' => true
        )
    );

    register_post_type(
        'events',
        array(
            'label' => 'évènements',
            'labels' => array(
                'name' => 'évènements',
                'singular_name' => 'évènement',
                'all_items' => 'Tous les évènements',
                'add_new_item' => 'Ajouter un évènement',
                'edit_item' => 'Éditer l\'évènement',
                'new_item' => 'Nouvel évènement',
                'view_item' => 'Voir l\'évènements',
                'search_items' => 'Rechercher parmi les évènements',
                'not_found' => 'Pas d\"évènement',
                'not_found_in_trash' => 'Pas d\"évènement dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'events'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-calendar-alt',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true
        )
    );

    
    register_post_type(
        'places',
        array(
            'label' => 'lieux',
            'labels' => array(
                'name' => 'lieux',
                'singular_name' => 'lieu',
                'all_items' => 'Tous les lieux',
                'add_new_item' => 'Ajouter un lieu',
                'edit_item' => 'Éditer le lieu',
                'new_item' => 'Nouveau lieu',
                'view_item' => 'Voir le lieu',
                'search_items' => 'Rechercher parmi les lieux',
                'not_found' => 'Pas de lieu',
                'not_found_in_trash' => 'Pas de lieu dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'places'),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-location-alt',
            'capability_type' => 'post',
            'supports' => array('title', 'author', 'thumbnail', 'excerpt'),
            'has_archive' => true
        )
    );
    register_post_type(
        'contacts',
        array(
            'label' => 'Contacts',
            'labels' => array(
                'name' => 'contacts',
                'singular_name' => 'contact',
                'all_items' => 'Toutes les contacts',
                'add_new_item' => 'Ajouter un contact',
                'edit_item' => 'Éditer le contact',
                'new_item' => 'Nouveau contact',
                'view_item' => 'Voir le contact',
                'search_items' => 'Rechercher parmi les contacts',
                'not_found' => 'Pas de contact',
                'not_found_in_trash' => 'Pas de contact dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'contacts'),
            'menu_position' => 7,
            'menu_icon' => 'dashicons-phone',
            'capability_type' => 'post',
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true
        )
    );
    register_post_type(
        'gals',
        array(
            'label' => 'galeries',
            'labels' => array(
                'name' => 'galeries',
                'singular_name' => 'galerie',
                'all_items' => 'Toutes les galeries',
                'add_new_item' => 'Ajouter une galerie',
                'edit_item' => 'Éditer la galerie',
                'new_item' => 'Nouvelle galerie',
                'view_item' => 'Voir la galerie',
                'search_items' => 'Rechercher parmi les galeries',
                'not_found' => 'Pas de galerie',
                'not_found_in_trash' => 'Pas de galerie dans la corbeille'
            ),
            'public' => true,
            'rewrite'   => array('slug' => 'galeries'),
            'menu_position' => 8,
            'menu_icon' => 'dashicons-images-alt2',
            'capability_type' => 'post',
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true
        )
    );
    // taxonomies
    register_taxonomy(
        'acts_type',
        'acts',
        array(
            // 'label' => 'acts_type',
            'labels' => array(
                'name' => 'Type',
                'singular_name' => 'Type',
                'all_items' => 'Tous les types',
                'edit_item' => 'Éditer le type',
                'view_item' => 'Voir le type',
                'update_item' => 'Mettre à jour le type',
                'add_new_item' => 'Ajouter un type',
                'new_item_name' => 'Nouveau type',
                'search_items' => 'Rechercher parmi les types',
                'popular_items' => 'Types les plus utilisés',
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'corps_domain',
        'corps',
        array(
            'label' => 'domaine',
            'labels' => array(
                'name' => 'domaine ',
                'singular_name' => 'domaine',
                'all_items' => 'Tous les domaines',
                'edit_item' => 'Éditer le domaine',
                'view_item' => 'Voir le domaine',
                'update_item' => 'Mettre à jour le domaine',
                'add_new_item' => 'Ajouter un domaine',
                'new_item_name' => 'Nouveau domaine',
                'search_items' => 'Rechercher parmi les domaines',
                'popular_items' => 'domaines les plus utilisés'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'pubs_domain',
        'pubs',
        array(
            'label' => 'domaine',
            'labels' => array(
                'name' => 'domaine ',
                'singular_name' => 'domaine',
                'all_items' => 'Tous les domaines',
                'edit_item' => 'Éditer le domaine',
                'view_item' => 'Voir le domaine',
                'update_item' => 'Mettre à jour le domaine',
                'add_new_item' => 'Ajouter un domaine',
                'new_item_name' => 'Nouveau domaine',
                'search_items' => 'Rechercher parmi les domaines',
                'popular_items' => 'domaines les plus utilisés'
            ),
            'hierarchical' => true
        )
    );  
    register_taxonomy(
        'places-type',
        'places',
        array(
            'label' => 'place-type',
            'labels' => array(
                'name' => 'Types de lieux',
                'singular_name' => 'Type',
                'all_items' => 'Tous les types',
                'edit_item' => 'Éditer le type',
                'view_item' => 'Voir le type',
                'update_item' => 'Mettre à jour le type',
                'add_new_item' => 'Ajouter un type',
                'new_item_name' => 'Nouveau type',
                'search_items' => 'Rechercher parmi les types',
                'popular_items' => 'Types les plus utilisés'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'gals-type',
        'gals',
        array(
            'label' => 'gals-type',
            'labels' => array(
                'name' => 'Types de galerie',
                'singular_name' => 'Type',
                'all_items' => 'Tous les types',
                'edit_item' => 'Éditer le type',
                'view_item' => 'Voir le type',
                'update_item' => 'Mettre à jour le type',
                'add_new_item' => 'Ajouter un type',
                'new_item_name' => 'Nouveau type',
                'search_items' => 'Rechercher parmi les types',
                'popular_items' => 'Types les plus utilisés'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'member-type',
        'members',
        array(
            'label' => 'function',
            'labels' => array(
                'name' => 'fonction',
                'singular_name' => 'Fonction',
                'all_items' => 'Toutes les fonctions',
                'edit_item' => 'Éditer la fonction',
                'view_item' => 'Voir la fonction',
                'update_item' => 'Mettre à jour la fonction',
                'add_new_item' => 'Ajouter une fonction',
                'new_item_name' => 'Nouvelle fonction',
                'search_items' => 'Rechercher parmi les fonctions',
                'popular_items' => 'Fonctions les plus utilisées'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'member-com',
        'members',
        array(
            'label' => 'com',
            'labels' => array(
                'name' => 'commission',
                'singular_name' => 'Commission',
                'all_items' => 'Toutes les commissions',
                'edit_item' => 'Éditer la commission',
                'view_item' => 'Voir la commission',
                'update_item' => 'Mettre à jour la commission',
                'add_new_item' => 'Ajouter une commission',
                'new_item_name' => 'Nouvelle commission',
                'search_items' => 'Rechercher parmi les commissions',
                'popular_items' => 'commissions les plus utilisées'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'theme',
        'posts',
        array(
            'label' => 'theme',
            'labels' => array(
                'name' => 'theme',
                'singular_name' => 'Thème',
                'all_items' => 'Tous les thèmes',
                'edit_item' => 'Éditer le thème',
                'view_item' => 'Voir le thème',
                'update_item' => 'Mettre à jour le thème',
                'add_new_item' => 'Ajouter un thème',
                'new_item_name' => 'Nouveau thème',
                'search_items' => 'Rechercher parmi les thèmes',
                'popular_items' => 'Thèmes les plus utilisées'
            ),
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'event-type',
        'events',
        array(
            'label' => 'Type d\'évènement',
            'labels' => array(
                'name' => 'type d\'évènement',
                'singular_name' => 'Type d\'évènement',
                'all_items' => 'Tous les type d\'évènements',
                'edit_item' => 'Éditer le type d\'évènement',
                'view_item' => 'Voir le type d\'évènement',
                'update_item' => 'Mettre à jour le type d\'évènement',
                'add_new_item' => 'Ajouter un type d\'évènement',
                'new_item_name' => 'Nouveau type d\'évènement',
                'search_items' => 'Rechercher parmi les type d\'évènements',
                'popular_items' => 'Type d\'évènements les plus utilisées'
            ),
            'hierarchical' => true
        )
    );

    register_taxonomy_for_object_type('theme', 'post');
    register_taxonomy_for_object_type('event-type', 'events');
    register_taxonomy_for_object_type('acts_type', 'acts');
    register_taxonomy_for_object_type('corps_domain', 'corps');
    register_taxonomy_for_object_type('pubs_domain', 'pubs');
    register_taxonomy_for_object_type('member-type', 'members');
    register_taxonomy_for_object_type('member-com', 'members');
    register_taxonomy_for_object_type('gals-type', 'gals');
    register_taxonomy_for_object_type('type', 'places'); 
    
}


function custom_menu_order($menu_ord)
{
    if (!$menu_ord) return true;
    return array(
        'index.php', // this represents the dashboard link
        'edit.php?post_type=page', // this is the default page menu
        'edit.php', // this is the default POST admin menu
        'edit.php?post_type=acts', // acteurs
        'edit.php?post_type=pmes', // pmes
        'edit.php?post_type=pubs', // pubs
        'edit.php?post_type=events', //évènements
        'edit.php?post_type=places', //lieux
        'edit.php?post_type=contacts', //contacts
        'edit.php?post_type=gals', //galeries
        'edit.php?post_type=members', //elus
        // 'edit.php?post_type=refs', //références
        // 'edit.php?post_type=partners', //acteurs
        // 'edit.php?post_type=members', //membres 
        

    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');
add_filter('timber/twig', function ($twig) {
    $twig->addExtension(new Twig_Extension_StringLoader());

    $twig->addFilter(
        new Twig_SimpleFilter(
            'highlight',

            function ($text, array $terms) {

                $highlight = array();
                foreach ($terms as $term) {
                    $highlight[] = '<span class="highlight">' . $term . '</span>';
                }

                return str_ireplace($terms, $highlight, $text);
            }

        )
    );

    return $twig;
});

function wpc_excerpt_pages()
{
    add_meta_box('postexcerpt', __('Extrait'), 'post_excerpt_meta_box', 'page','post','acts', 'places', 'normal', 'core');
}
add_action('admin_menu', 'wpc_excerpt_pages');

add_action('after_setup_theme', 'my_adjust_image_sizes');
function my_adjust_image_sizes()
{
    //     //add an cropped image-size with 800 x 250 Pixels
    add_image_size('my-custom-image-size', 800, 250, true);
    add_image_size('my-custom-image-size', 1265, 550, true);


add_action('init', 'init_remove_support', 100);
// add_filter(‘widget_text’, ‘do_shortcode’);
}