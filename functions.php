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

    // theme supports widget
    add_theme_support('widgets');
    add_theme_support('widgets-block-editor');

    // ajouter le support de titres dynamiques
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support( 'post-thumbnails', array( 'post', 'promotions' ) );
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


// enregistrement d'une sidebar
function mytheme_register_sidebar(){
    register_sidebar();
}

add_action('init','mytheme_register_sidebar');

function enqueue_styles()
{
    wp_enqueue_style('font-awesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css",array(),'6.2.0','all');   
    wp_enqueue_style('main-css',get_template_directory_uri()."/style.css",array(),'1.0.0','all');
}

function enqueue_scripts()
{
    $version = wp_get_theme()->get('Version');   
}

add_action('wp_enqueue_scripts','enqueue_styles');
add_action('wp_enqueue_scripts','enqueue_scripts');


include(__DIR__.'/includes/register-cpt.php');
include(__DIR__.'/includes/register-taxonomies.php');

add_action('init', 'montheme_register_promotions'); // Le hook init lance la fonction
add_action('init', 'montheme_register_marchand');
add_action('init', 'montheme_register_taxonomies');

require_once(__DIR__.'/metaboxes/phone-number.php');
PhoneNumber::register();


// Remove p tags from category description
remove_filter('the_content','wpautop');

// gestion de la direction a double sens de la relation des cpt
function bidirectional_acf_update_value( $value, $post_id, $field  ) {
    
    // vars
    $field_name = $field['name'];
    $field_key = $field['key'];
    $global_name = 'is_updating_' . $field_name;
    
    
    // bail early if this filter was triggered from the update_field() function called within the loop below
    // - this prevents an inifinte loop
    if( !empty($GLOBALS[ $global_name ]) ) return $value;
    
    
    // set global variable to avoid inifite loop
    // - could also remove_filter() then add_filter() again, but this is simpler
    $GLOBALS[ $global_name ] = 1;
    
    
    // loop over selected posts and add this $post_id
    if( is_array($value) ) {
    
        foreach( $value as $post_id2 ) {
            
            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);
            
            
            // allow for selected posts to not contain a value
            if( empty($value2) ) {
                
                $value2 = array();
                
            }
            
            
            // bail early if the current $post_id is already found in selected post's $value2
            if( in_array($post_id, $value2) ) continue;
            
            
            // append the current $post_id to the selected post's 'related_posts' value
            $value2[] = $post_id;
            
            
            // update the selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);
            
        }
    
    }
    
    
    // find posts which have been removed
    $old_value = get_field($field_name, $post_id, false);
    
    if( is_array($old_value) ) {
        
        foreach( $old_value as $post_id2 ) {
            
            // bail early if this value has not been removed
            if( is_array($value) && in_array($post_id2, $value) ) continue;
            
            
            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);
            
            
            // bail early if no value
            if( empty($value2) ) continue;
            
            
            // find the position of $post_id within $value2 so we can remove it
            $pos = array_search($post_id, $value2);
            
            
            // remove
            unset( $value2[ $pos] );
            
            
            // update the un-selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);
            
        }
        
    }
    
    
    // reset global varibale to allow this filter to function as per normal
    $GLOBALS[ $global_name ] = 0;
    
    
    // return
    return $value;
    
}

add_filter('acf/update_value/name=promotions_associees', 'bidirectional_acf_update_value', 10,3);

// définition du nombre de caractères affichées pour un extrait
function wpdocs_custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function loadDirectory() { ?>
    <script type="text/javascript">
        var theme_directory = "<?php echo get_template_directory_uri() ?>";
        var templateUrl = '<?= get_home_url(); ?>';
    </script> 
<?php 
} 

add_action('wp_head', 'loadDirectory');


?>
