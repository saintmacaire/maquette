<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'c1_test4' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'c1e2w' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Kestufe12' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eRpd#CJj/KsHF04Z-qjjEd]dNn(>%oj/24I+YMZe,dU0TlzxLeq9t_X;KFbG<x_1' );
define( 'SECURE_AUTH_KEY',  'bsn ]_rs2$rT;f ;sB.=!oqwHI:1yIiFIE]PwCwSwldrI ESa7d&{96#Y|W8y5wq' );
define( 'LOGGED_IN_KEY',    '{5Jn{C#8IA&5V]j|85Is:&(A{~n9!.~10SUEuzz^]ah^lb]$hmS&F>w+1sQ,asl)' );
define( 'NONCE_KEY',        'RCrs}ln$ iB_TK9 46>XK8QQ-#S,d>1Osu_g7.Gk/rg:8rIo|`,_@9E~24w?ivp|' );
define( 'AUTH_SALT',        'a,4~NO@*G.,7}@#1>0}Ke1/2Ag[ZXk3 31t0:ZQizC2>QCuax(9ZO9_h0~h&PK,L' );
define( 'SECURE_AUTH_SALT', 'nk2{V)3dl$%`nIfS-fh;-anyG&Ooxhaq^qO@):OE/s6oU*n^+ 5;ek$0rwa@^Tgq' );
define( 'LOGGED_IN_SALT',   '1eI$Lzn)i2UkMiQG-61A<r7km7/{+$< 67RcLY/`Q3S!46}gI;-7V%7LEA<oEYO;' );
define( 'NONCE_SALT',       'MA}4TgwN%4-@k_h s2(D=]$y@2}BZz+R6Q=DiV9O;}r$VC7ivxx/2(*`fl3VT pU' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
