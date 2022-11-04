<?php

get_header();

?>

<main id="taxo-store" class="main">

    <div class="main__header">
        <h2>les boutiques
            <?php 
                $count = wp_count_posts('boutique');
                echo '('.$count->publish.')'
            ;?>
        </h2>
        <h4>Store(s) dans la catégorie : <?php echo get_queried_object()->name; ?></h4>
    </div>

    <div class="main__body">
        <?php require(__DIR__.'/parts/aside.php');?>

        <section>
            <?php require(__DIR__.'/parts/filters.php');?>

            <div class="list-boutique-grid">


                <?php //Get the correct taxonomy ID by id
                    $term = get_term_by( 'id', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
                    $letterRankings = get_the_terms(get_the_id(),'letter-ranking');
                ?>
                

                <?php // use the term to echo the description of the term 
                // echo term_description( $term, $taxonomy ) 
                    $boutiques =  new WP_Query(array(
                        'post_per_page' => '16',
                        'post_type' => 'boutique'
                    ));
                ?>

                <?php while(have_posts()){
                    the_post();
                        $url = get_the_permalink();
                    ?>
                        <div class="boutique-card" onclick="location.href='<?php the_permalink();?>';" style="cursor:pointer;">
                            <div class="boutique-card__header">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="boutique-card__body">
                                <h2><?php the_title(); ?></h2>
                                <?php echo '<p>'.get_the_excerpt().'</p>'; ?>
                                <div class="meta">
                                    <?php 
                                        $store = get_the_term_list( $post->ID, 'store', '<li>', '', '</li>'); 
                                    ?>  
                                    <?php echo $store; ?>
                                    <ul class="count">
                                        <?php 
                                            $promos = get_field('promotions_associees',$post->ID);
                                            if($promos){
                                                $nbPromos = [];
                                                foreach($promos as $promo){
                                                    $nbPromos[] = $promo; 
                                                }
                                                $count = sizeof($nbPromos);
                                                echo '<li>'.$count.'&nbsp;offre(s)</li>';
                                            }
                                        ?>
                                        <?php 
                                            // foreach($letterRankings as $letterRanking){
                                            //     echo '<li style="color:mediumblue;font-weight:bolder">'.$letterRanking->name.'&nbsp;</li>';
                                            // }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>

            </div>
        </section>
    </div>

</main>

<?php

get_footer();


?>