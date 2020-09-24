<?php

/**
 * template name: lieu
 * template post type: places
 */

//obligatoire : récupère les variables globales de wordpress
$context = timber::get_context();

// on récupère le contenu du post actuel grâce à timberpost
$post = new timberpost();

// on ajoute la variable post (qui contient le post) à la variable
// qu'on enverra à la vue twig
$context['post'] = $post;



// tableau d'arguments pour modifier la requête en base
// de données, et venir récupérer uniquement les trois
// derniers articles

$args_events = [
    'post_type' => 'events',
    'order' => 'asc',
    'orderby' => 'date'
];
$args_places = [
    'post_type' => 'places',
    'posts_per_page' => -1,
];
// 'key' => 'date',
// 'orderby' => 'date',
// 'order' => 'desc',
// 'posts_per_page' => 1,

$args_services = [
    'post_type' => 'pubs',
    'posts_per_page' => -1,
];



//// récupère les articles en fonction du tableau d'argument $args_posts
//// en utilisant la méthode de timber get_posts
//// puis on les enregistre dans l'array $context sous la clé "posts"

$context['events'] = timber::get_posts($args_events);
$context['places'] = timber::get_posts($args_places);
$context['services'] = timber::get_posts($args_services);
// var_dump($context['places']);die;
// $context['labels'] = timber::get_posts($args_labels);
// $context['members'] = timber::get_posts($args_members);
// $context['lieux'] = timber::get_posts($args_lieux);
// $context = timber::context();
$context['dynamic_sidebar1'] = timber::get_widgets('home_footer_1');
$context['dynamic_sidebar2'] = timber::get_widgets('home_footer_2');
$context['dynamic_sidebar3'] = timber::get_widgets('home_footer_3');
$context['dynamic_sidebar4'] = timber::get_widgets('home_footer_4');
$context['dynamic_sidebar5'] = timber::get_widgets('home_footer_5');
$context['dynamic_sidebar6'] = timber::get_widgets('home_footer_6');
$context['dynamic_sidebar7'] = timber::get_widgets('home_footer_7');
$context['dynamic_sidebar8'] = timber::get_widgets('home_footer_8');
$context['dynamic_sidebar9'] = timber::get_widgets('home_footer_9');
// timber::render('single.twig', $context);
// $context['url'] = $_server["request_uri"];
// appelle la vue twig "template-event.twig" située dans le dossier views
// en lui passant la variable $context qui contient notamment ici les articles
timber::render('pages/templates/template-places.twig', $context);
