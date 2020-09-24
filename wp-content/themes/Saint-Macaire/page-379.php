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
$args_acts = [
    'post_type' => 'acts',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'           => 'title',
    'order'             => 'DESC'


];

$args_taxos = [
        'post_type' => 'acts', 
        'taxonomy' => 'acts_type',
        'orderby' => 'parent',
        'posts_per_page' => -1,
    ];

// $args_asso = [
//     'post_type' => 'acts',
 
//     'posts_per_page' => -1,
//     'post_status'    => 'publish',
//     'taxonomy' => 'type',
//     'slug' => 'association',
//     'orderby'           => 'menu_order',
//     'order'             => 'DESC'
// ];
$args_gals = [
    'post_type' => 'gals',

];
$args_events = [
    'post_type' => 'events',
    'order' => 'ASC',
    'orderby' => 'date'
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


// ];

// $args_labels = [
//     'post_type' => 'partners',

//     'meta_query' => [
//         'relation' => 'AND',
//         [
//             'taxonomy' => 'partner-type',
//             'compare' => 'LIKE'
//         ],
//     ],
// ];
// $args_lieux = [
//     'post_type' => 'places',
// ];

//// récupère les articles en fonction du tableau d'argument $args_posts
//// en utilisant la méthode de Timber get_posts
//// puis on les enregistre dans l'array $context sous la clé "posts"

$context['acts'] = Timber::get_posts($args_acts);
$context['taxos'] = Timber::get_terms($args_taxos);
// var_dump($context['taxos']);die;
$context['events'] = Timber::get_posts($args_events);
$context['places'] = Timber::get_posts($args_places);
$context['gals'] = Timber::get_posts($args_gals);
$context['posts'] = Timber::get_posts($args_posts);
$context['members'] = Timber::get_posts($args_members);
// var_dump($context['taxos']);die;
// var_dump($context['members']);die;
// var_dump($context['gals']);die;
$context['services'] = Timber::get_posts($args_services);
// var_dump($context['places']);die;
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
Timber::render('pages/page-379.twig', $context);
