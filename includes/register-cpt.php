<?php

    function montheme_register_taxonomies(){
        register_taxonomy('type-coupon', ['coupon','post'], [
            'labels' => [
                'name' => 'type-coupon',
                'singular_name'     => 'Type-coupon',
                'search_items'      => 'Rechercher des types de coupons',
                'all_items'         => 'Tous les types de coupons',
                'edit_item'         => 'Editer le type de coupon',
                'update_item'       => 'Mettre à jour le type de coupon',
                'add_new_item'      => 'Ajouter un nouveau type de coupon',
                'new_item_name'     => 'Ajouter un nouveau type de coupon',
                'menu_name'         => 'Type de coupon',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);

        register_taxonomy('store', ['boutique'], [
            'labels' => [
                'name' => 'store',
                'singular_name'     => 'Store',
                'search_items'      => 'Rechercher des type de store',
                'all_items'         => 'Tous les types de store',
                'edit_item'         => 'Editer le type de store',
                'update_item'       => 'Mettre à jour le type de store',
                'add_new_item'      => 'Ajouter un nouveau type de store',
                'new_item_name'     => 'Ajouter un nouveau type de store',
                'menu_name'         => 'Type de store',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);
    }


    function montheme_register_coupons() {

        $args = [
            'label' => 'Coupon',
            'labels' => array(
                'name' => 'Coupons',
                'singular_name' => 'Coupon',
                'all_items' => 'Tous les coupons',
                'add_new_item' => 'Ajouter un coupon',
                'edit_item' => 'Éditer le coupon',
                'new_item' => 'Nouveau coupon',
                'view_item' => 'Voir le coupon',
                'search_items' => 'Rechercher parmi les coupons',
                'not_found' => 'Pas de coupon trouvé',
                'not_found_in_trash'=> 'Pas de coupon dans la corbeille'
            ),
            'public' => true,
            "publicly_queryable" => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-tag',
            'supports' => ['editor','title','thumbnail','post-formats'],
            'has_archive' => true,
        ];

        register_post_type('coupon',$args);
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
            'supports' => ['editor','title','thumbnail','post-formats'],
            'has_archive' => true,
        ];

        register_post_type('boutique',$args);
        // register_taxonomy_for_object_type( 'type-coupon', 'coupon' );

    }



?>