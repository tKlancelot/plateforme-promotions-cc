<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="site de promotions, boutiques et centres commerciaux">
  <link rel="icon" href="<?= get_template_directory_uri() . '/assets/favicon/fav.png' ?>" />
  <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
  <script src="<?= get_template_directory_uri() .'/js/Filter.js'?>" type="module"></script>
  <script src="<?= get_template_directory_uri() .'/js/main.js'?>" type="module" defer></script>

  <?php
    if (is_page('all-offers')) {
    ?>
      <script src="<?= get_template_directory_uri() .'/js/promotions.js'?>" type="module"></script>
    <?php
    }
  ?>

  <?php 
    wp_head(); 
  ?>
</head>

<body>

    <header>
        <nav class="topbar">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'primary'
              // is_user_logged_in() ? 'logged-in-menu' : 'logged-out-menu'
            ));
          ?>
          <div>se connecter</div>
        </nav>

        <!-- on va faire un menu personnalisé ici avec un dropdown qui liste toutes les categories -->

        <nav class="navbar">
          <?php
            if ( function_exists( 'the_custom_logo' ) ) {
              the_custom_logo();
            }
          ?>
          <div class="menu">
            <div class="menu__drop-down">
              <ul>
                <li id="trigger"><span>Boutiques</span><span><i class="fa-sharp fa-solid fa-chevron-down"></i></span></li>
                <ul class="submenu">
                    <?php include_once(__DIR__.'/parts/quick-menu.php');?>
                    <?php
                      $args = array(
                          'taxonomy' => 'store',
                          'orderby' => 'name', // term_id
                          "order" => "ASC",
                          'hide_empty' => 0,
                          'fields' => 'all',
                          'title_li'=>'',
                          'show_count'=> 0
                      );
                      $cats = wp_list_categories( $args );
                    ?>
                  </ul>  
              </ul>
            </div>
            <div class="menu__search">
              <ul>
                <li><?php get_search_form(); ?></li>
              </ul>
            </div>
          </div>
        </nav>
        <?php
        ?>
    </header>


