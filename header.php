<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="site de coupons marchands et centres commerciaux">
  <link rel="icon" href="<?= get_template_directory_uri() . '/assets/favicon/fav.png' ?>" />
  <?php 
        wp_head(); 
      ?>
</head>

<style>

  html,body,*{
    box-sizing: border-box;
    margin:0;
    padding: 0;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  
  header,footer{
    background-color: #000;
    height: 7.2vw;
    color:#fff;
  }

  #front-page,#all-offers{
    display: flex;
    min-height: 48vw;
    border:8px solid red;
  }

  aside,section{
    padding: 2rem;
  }

  section ul,aside ul{
    margin:1rem auto;
  }


</style>

<body>

    <header>
        <!-- on va faire un menu personnalisé ici avec un dropdown qui liste toutes les categories -->
        <nav>
          <ul>
            <li>boutiques</li>
            <ul>
              <li><a href="<?php echo get_home_url(); ?>">toutes les boutiques</a></li>
              <li><a href="<?php echo site_url('/all-offers');?>">toutes les offres</a></li>
              <ul class="submenu">
                <li>touts les types de store</li>
                <?php
                  $args = array(
                      'taxonomy' => 'store',
                      'orderby' => 'name', // term_id
                      "order" => "ASC",
                      'hide_empty' => 0,
                      'fields' => 'all',
                      // 'exclude' => 1,
                      'title_li'=>'',
                      'show_count'=> 0
                  );
                  $cats = wp_list_categories( $args );
                ?>
              </ul>
            </ul>  
          </ul>
        </nav>
        <?php
          // wp_nav_menu( array(
            // 'theme_location' => 'primary'
            // is_user_logged_in() ? 'logged-in-menu' : 'logged-out-menu'
          // ));
        ?>
    </header>