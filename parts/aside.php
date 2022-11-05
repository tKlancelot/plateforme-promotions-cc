<aside class="aside">
    <div class="aside__body">
        <div class="aside__body__item">
            <ul>
                <?php require(__DIR__.'/quick-menu.php');?>
            </ul>
        </div>
        <div class="aside__body__item">
            <h2>date</h2>
            <ul>
                <?php
                // pour tous les post de type promo on recupere leur date
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

        <!-- test de is_page  -->
        <?php
            if (is_page('all-offers')) {
                ?>
                    <div class="aside__body__item">
                        <h2>pourcentage de promotion</h2>
                        <div class="pill-group">
                            <button id="all">all</button>
                            <!-- // lister tous les types de boutons -->
                            <?php
                            $promo_array = [];
                            $loop = new WP_Query( array( 'post_type' => 'promotion') ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php $promo_array[] = get_field('valeur_promo');?>
                            <?php endwhile; wp_reset_query(); // end of the loop. ?>
                            <?php
                            $promos_array_unique = array_unique($promo_array);
                            foreach ($promos_array_unique as $promo_item){
                                echo '<button id='.$promo_item.'>'.$promo_item.'</button>';
                            }?>

                        </div>
                        <hr/>
                    </div>
                <?php
            }
            elseif (is_front_page()) {
                ?>
                    <!-- listing des catégories : taxo associée aux boutiques -->
                    <div class="aside__body__item">
                        <h2>catégories</h2>
                        <div id="store-categories" class="pill-group">  
                        <?php
                            $args2 = array(
                                'taxonomy' => 'store',
                                'orderby' => 'name', // term_id
                                "order" => "ASC",
                                'hide_empty' => 0,
                                'fields' => 'all',
                                'exclude' => 1,
                                'title_li'=>'',
                                'show_count'=> 1
                            );
                            $cats = get_categories( $args2 );
                        ?>
                        <?php
                            foreach($cats as $category) {
                                echo '<button id='.$category->slug.'>'.$category->name.'</button>';
                            }
                        ?>
                        </div>
                        <hr/>
                    </div>
                <?php
            }
        ?>




    </div>
</aside>

