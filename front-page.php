<?php

get_header();

?>



<main id="front-page" class="main">

    <div class="main__header">
        <h2>les boutiques
            <?php 
                $count = wp_count_posts('boutique');
                echo '('.$count->publish.')'
            ;?>
        </h2>
    </div>

    <div class="main__body">
        <?php include(__DIR__.'/parts/aside.php');?>

        <section>


            <div class="boutique-grid">


            <?php
                $boutiques =  new WP_Query(array(
                    'post_per_page' => '16',
                    'post_type' => 'boutique'
                ));

                while($boutiques->have_posts()){
                    $boutiques->the_post(); ?>
                    
                    <?php
                        $phoneNumber = get_post_meta(get_the_ID(),PhoneNumber::META_KEY,true);
                        $terms = get_the_terms(get_the_id(),'store');
                    ?>
                    
                    <a href=<?php the_permalink();?>>
                        <div class="boutique-card">
                            <div class="boutique-card__header">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="boutique-card__body">
                                <!-- <ul> -->
                                    <h3><?php the_title()?></h3>
                                    <!-- <li> -->
                                        <?php 
                                        // echo get_the_content() == '' ? 'description de la boutique : '. get_the_title() : the_content();
                                        ?>
                                    <!-- </li> -->
                                    <h4>horaires</h4>
                                    <p>
                                        <?php 
                                            foreach($terms as $term){
                                                echo '<span style="color:mediumblue;font-weight:bolder">'.$term->name.'&nbsp;</span>';
                                            }
                                        ?>
                                    </p>  
                                    <?php 
                                    if(get_field('promotions_associees')){?>
                                        <h5><?php $promotion_a = get_field('promotions_associees');
                                        $count = count($promotion_a);
                                            echo $count === 1 ? '<span>'.$count. ' offre</span>' : '<span>'.$count. ' offres</span>';
                                        ?></h5>
                                        <?php
                                    }?>
                                    <h6><?php echo $phoneNumber ?></h6>
                                </ul>
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

