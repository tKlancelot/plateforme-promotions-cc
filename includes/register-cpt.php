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
            'menu_position' => 5,
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-tag',
            'supports' => ['editor','title','thumbnail','post-formats','custom-fields'],
            'has_archive' => true,
            'taxonomies' => array('category')

        ];

        register_post_type('coupon',$args);
    }


    function montheme_register_marchand() {

        $args = [
            'label' => 'Marchand',
            'public' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-cart',
            'supports' => ['editor','title','thumbnail'],
            'has_archive' => true,
            'taxonomies' => array('category')
        ];

        register_post_type('marchand',$args);
        // register_taxonomy_for_object_type( 'type-coupon', 'coupon' );

    }



?>