<?php

    function montheme_register_taxonomies(){
        
        register_taxonomy('type-promotion', ['promotion','post'], [
            'labels' => [
                'name' => 'type-promotion',
                'singular_name'     => 'Type-promotion',
                'search_items'      => 'Rechercher des types de promotions',
                'all_items'         => 'Tous les types de promotions',
                'edit_item'         => 'Editer le type de promotion',
                'update_item'       => 'Mettre à jour le type de promotion',
                'add_new_item'      => 'Ajouter un nouveau type de promotion',
                'new_item_name'     => 'Ajouter un nouveau type de promotion',
                'menu_name'         => 'Type de promotion',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);

        // register_taxonomy('letter-ranking', ['boutique'], [
        //     'labels' => [
        //         'name' => 'letter-ranking',
        //         'singular_name'     => 'Letter-ranking',
        //         'search_items'      => 'Rechercher des types de letter-ranking',
        //         'all_items'         => 'Tous les types de letter-ranking',
        //         'edit_item'         => 'Editer le type de letter-ranking',
        //         'update_item'       => 'Mettre à jour le type de letter-ranking',
        //         'add_new_item'      => 'Ajouter un nouveau type de letter-ranking',
        //         'new_item_name'     => 'Ajouter un nouveau type de letter-ranking',
        //         'menu_name'         => 'Type de letter-ranking',
        //     ],
        //     'show_in_rest' => true,
        //     'hierarchical' => true,
        //     'show_admin_column' => true,
        // ]);
        
        register_taxonomy('store', ['boutique'], [
            'labels' => [
                'name' => 'store',
                'singular_name'     => 'Store',
                'search_items'      => 'Rechercher des types de store',
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

?>