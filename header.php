<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="site de promotions, boutiques et centres commerciaux">
  <link rel="icon" href="<?= get_template_directory_uri() . '/assets/favicon/fav.png' ?>" />
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
                    <!-- <li><a href="<?php 
                      // echo get_home_url(); 
                    ?>">Page d'accueil</a></li> -->
                    <li><a href="<?php echo site_url('/store/all'); ?>">Toutes les boutiques</a></li>
                    <li><a href="<?php echo site_url('/all-offers');?>">Toutes les offres</a></li>
                    <hr/>
                    <?php
                      $args = array(
                          'taxonomy' => 'store',
                          'orderby' => 'name', // term_id
                          "order" => "ASC",
                          'hide_empty' => 0,
                          'fields' => 'all',
                          'exclude' => 1,
                          'exclude_tree'=>true,
                          'child_of' => 0,
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


