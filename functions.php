<?php

//Liste les éléments que le thème peut supporter (img, thumbnails etc.)
function theme_supports()
{
    //titre personnalisé
    add_theme_support('title-tag');
    //Vignette sur les articles

    add_theme_support('post-thumbnails');

    // Gestion des menus
    add_theme_support('menus');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Nouvelles tailles par défaut
    add_image_size('post-thumbnail', 210, 297);

    // ajouter le support de titres dynamiques
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support( 'post-thumbnails', array( 'post', 'coupons' ) );
}


add_action('after_setup_theme','theme_supports');


// enregister des menu locations 
function mytheme_register_menus()
{
    $locations = array(
        'primary' => 'top menu',
        'footer' => 'footer menu'
    );

    register_nav_menus($locations); 
}

add_action('init','mytheme_register_menus');


function enqueue_styles()
{
    // $version = wp_get_theme()->get('Version');
    // wp_enqueue_style('font-awesome',get_template_directory_uri()."/assets/fontawesome/css/all.css",array(),'6.1.2','all');   
    wp_enqueue_style('main-css',get_template_directory_uri()."/style.css",array(),'1.0.0','all');
}

function enqueue_scripts()
{
    // $version = wp_get_theme()->get('Version');
    wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.6.0.slim.min.js",[],'3.6.0',false);
    // wp_enqueue_script('main-script',get_template_directory_uri()."/js/main.js",[],$version,'all');
    // wp_enqueue_script('jquery-progress-bar',"https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.js",[],'0.6.1',false);
    // wp_enqueue_script('gsap', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js",[],'3.10.4',false);
    // wp_enqueue_script('gsap-scroll-trigger', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js",[],'3.10.4',false);
    // wp_enqueue_script('gsap-observer', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/Observer.min.js",[],'3.10.4',false);
    // wp_enqueue_script('gsap-scrollTo', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollToPlugin.min.js",[],'3.10.4',false);
    // wp_enqueue_script('splide-slide', "https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js",[],'4.0.7',true);
    // chargement de three.js

    // wp_enqueue_script('three-js', "https://cdnjs.cloudflare.com/ajax/libs/three.js/0.145.0/three.min.js",[],'0.145.0',true);
    // wp_enqueue_script('gltf-loader', "https://cdn.rawgit.com/mrdoob/three.js/master/examples/js/loaders/GLTFLoader.js",[]);

}


add_action('wp_enqueue_scripts','enqueue_styles');
add_action('wp_enqueue_scripts','enqueue_scripts');

include(__DIR__.'/includes/register-cpt.php');

add_action('init', 'montheme_register_coupons'); // Le hook init lance la fonction
add_action('init', 'montheme_register_marchand');
add_action('init', 'montheme_register_taxonomies');


require_once(__DIR__.'/metaboxes/discount-value.php');
require_once(__DIR__.'/metaboxes/associated-boutique.php');

DiscountValue::register();
AssociatedBoutique::register();


// Remove p tags from category description
// remove_filter('the_content','wpautop');