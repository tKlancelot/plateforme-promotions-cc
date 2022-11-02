<aside class="aside">
    <div class="aside__body">
        <div class="aside__body__item">
            <ul>
                <li><a href="<?php echo site_url('/all-offers');?>">toutes les offres</a></li>
                <hr/>
            </ul>
        </div>
        <div class="aside__body__item">
            <h2>date</h2>
            <ul>
                <?php
                // pour tous les post de type promo on recupere leur date
                // donc boucle sur tous les post 

                $args = array(  'post_type'=>'promotion',
                    'post_status'=>'publish',
                    'orderby'=>'post_date',
                    // 'order'=>'DESC'
                );
                $query = new WP_Query($args);
                if($query->have_posts())
                {
                    $publishedToday = [];
                    $publishedThisWeek = [];
                    // recuperer la date du jour 
                    $today = date(get_option('date_format'));
                    $tsToday = strtotime($today);

                    $currentTs = time();

                    // 86400 -> 1 jour
                    $yesterday = $currentTs - (86400); 
                    $lastweek = $tsToday - 604800;
                    echo '<li>Publié(es) aujourd\'hui</li><hr/>';

                    foreach ($query->posts as $post) {
                        // publié aujourd'hui
                        // date du post
                        $date = $post->post_date;
                        $tsPostDate = strtotime($date);
                        $storeA = get_field('promotions_associees',$post)[0]->guid;

                        if($tsPostDate > $yesterday){
                            array_push($publishedToday,[$post,$storeA]);
                        }
                    }
                    echo '';
                    for ($i = 0; $i < count($publishedToday);$i++){
                        // var_dump($publishedToday[$i][1]);
                        echo '<li><a href="'.$publishedToday[$i][1].'">'.$publishedToday[$i][0]->post_title.'</a></li>';
                        // echo '<li>'.$publishedToday[$i]->post_title.'</li>';
                        // echo '<span style="font-size:small">'.strtotime($publishedToday[$i]->post_date).'</span>';
                    }


                    // 604800 -> 1 semaine
                }
                ?>
            </ul>
        </div>

        <!-- listing des catégories : taxo associée aux boutiques -->
        <div class="aside__body__item">
            <h2>catégories</h2>
            <ul>  
            <?php
                $args = array(
                    'taxonomy' => 'store',
                    'orderby' => 'name', // term_id
                    "order" => "ASC",
                    'hide_empty' => 0,
                    'fields' => 'all',
                    // 'exclude' => 1,
                    'title_li'=>'',
                    'show_count'=> 1
                );
                $cats = wp_list_categories( $args );
            ?>
            </ul>
        </div>

        <div>
            <?php 
                // get_sidebar();
            ?>
        </div>


    </div>
</aside>