<?php

//OBLIGATOIRE : Récupère les variables globales de Wordpress
$context = Timber::get_context();

// on récupère le contenu du post actuel grâce à TimberPost
$post = new TimberPost();

// on ajoute la variable post (qui contient le post) à la variable
// qu'on enverra à la vue twig
$context['post'] = $post;



// tableau d'arguments pour modifier la requête en base
// de données, et venir récupérer uniquement les trois
// derniers articles
$args_posts = [
    'post_type' => 'post',
];
$context['ex_terms'] = get_terms('event-type', 'orderby=slug&order=desc');


$args_acts = [
    'post_type' => 'events',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
        'meta_key' => 'begin',
        'orderby' => 'begin',
        'order' => 'ASC',
        
        
];
    

$args_taxos = [
    'post_type' => 'events',
    'taxonomy' => 'event-type',
    'orderby' => 'name',
    'posts_per_page' => -1,
];

$args_gals = [
    'post_type' => 'gals',

];
$args_events = [
    'post_type' => 'events',
    'meta_key' => 'begin',
    'orderby' => 'begin',
    'posts_per_page' => -1,
    'order' => 'ASC',
];
$args_places = [
    'post_type' => 'places',
    // 'meta_key' => 'ID',

    // 'meta_value' => 99,
    'posts_per_page' => '100',

];
$args_members = [
    'post_type' => 'members',
    'posts_per_page' => '200',
    'orderby' => 'date',
    'order' => 'ASC',
];
// 'key' => 'date',
// 'orderby' => 'date',
// 'order' => 'DESC',

$args_services = [
    'post_type' => 'pubs',
    'posts_per_page' => -1,
];


// $args_pmes = [
//     'post_type' => 'corps',
//     'posts_per_page' => -1, 
// ];

//// récupère les articles en fonction du tableau d'argument $args_posts
//// en utilisant la méthode de Timber get_posts
//// puis on les enregistre dans l'array $context sous la clé "posts"

$context['events'] = Timber::get_posts($args_events);
$context['places'] = Timber::get_posts($args_places);
$context['acts'] = Timber::get_posts($args_acts);
// var_dump($context['acts']);die;
// $context['pmes'] = Timber::get_posts($args_pmes);
$context['taxos'] = Timber::get_terms($args_taxos);

$context['gals'] = Timber::get_posts($args_gals);
$context['posts'] = Timber::get_posts($args_posts);
$context['members'] = Timber::get_posts($args_members);
// var_dump($context['members']);die;
// var_dump($context['gals']);die;
$context['services'] = Timber::get_posts($args_services);
// var_dump($context['taxos']);die;
// $context['labels'] = Timber::get_posts($args_labels);
// $context['members'] = Timber::get_posts($args_members);
// $context['lieux'] = Timber::get_posts($args_lieux);
// $context = Timber::context();
$context['dynamic_sidebar1'] = Timber::get_widgets('home_footer_1');
$context['dynamic_sidebar2'] = Timber::get_widgets('home_footer_2');
$context['dynamic_sidebar3'] = Timber::get_widgets('home_footer_3');
$context['dynamic_sidebar4'] = Timber::get_widgets('home_footer_4');
$context['dynamic_sidebar5'] = Timber::get_widgets('home_footer_5');
$context['dynamic_sidebar6'] = Timber::get_widgets('home_footer_6');
$context['dynamic_sidebar7'] = Timber::get_widgets('home_footer_7');
$context['dynamic_sidebar8'] = Timber::get_widgets('home_footer_8');
$context['dynamic_sidebar9'] = Timber::get_widgets('home_footer_9');
// var_dump($context['places']);die;
// Timber::render('single.twig', $context);
$context['url'] = $_SERVER["REQUEST_URI"];



// $context['places'] = Timber::get_posts($args_places);
// var_dump($context['contacts']);die;
// var_dump($context['fiches']);die;
// appelle la vue twig "page-31.twig" située dans le dossier views
// en lui passant la variable $context qui contient notamment ici les articles
Timber::render('pages/page-875.twig', $context);
