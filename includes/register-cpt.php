<?php


    function montheme_register_promotions() {

        $args = [
            'label' => 'Promotion',
            'labels' => array(
                'name' => 'Promotions',
                'singular_name' => 'Promotion',
                'all_items' => 'Tous les promotions',
                'add_new_item' => 'Ajouter un promotion',
                'edit_item' => 'Éditer la promotion',
                'new_item' => 'Nouvelle promotion',
                'view_item' => 'Voir la promotion',
                'search_items' => 'Rechercher parmi les promotions',
                'not_found' => 'Pas de promotion trouvée',
                'not_found_in_trash'=> 'Pas de promotion dans la corbeille'
            ),
            'public' => true,
            "publicly_queryable" => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-tag',
            'supports' => ['editor','title','thumbnail','post-formats'],
            'has_archive' => true,
        ];

        register_post_type('promotion',$args);
    }


    function montheme_register_marchand() {

        $args = [
            'label' => 'Boutique',
            'labels' => array(
                'name' => 'Boutiques',
                'singular_name' => 'Boutique',
                'all_items' => 'Toutes les boutiques',
                'add_new_item' => 'Ajouter une boutique',
                'edit_item' => 'Éditer la boutique',
                'new_item' => 'Nouvelle boutique',
                'view_item' => 'Voir la boutique',
                'search_items' => 'Rechercher parmi les boutiques',
                'not_found' => 'Pas de boutique trouvée',
                'not_found_in_trash'=> 'Pas de boutique dans la corbeille'
            ),
            'public' => true,
            "publicly_queryable" => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-cart',
            'supports' => ['editor','title','thumbnail','excerpt','post-formats'],
            'has_archive' => true,
        ];

        register_post_type('boutique',$args);
        // register_taxonomy_for_object_type( 'type-promotion', 'promotion' );

    }



?>