<?php

/* Template Name: All Promotions */

?>


<?php

get_header();

?>



<main id="all-offers" class="main">

    <div class="main__header">
        <h2>toutes les promotions</h2>    
    </div>

    <div class="main__body">
        <?php include(__DIR__.'/parts/aside.php');?>

        <div class="promotion-grid">
            <?php
                $promotions =  new WP_Query(array(
                    'post_per_page' => '16',
                    'post_type' => 'promotion'
                ));

                while($promotions->have_posts()){
                    $promotions->the_post(); 
                    ?>

                    <div class="promotion-card">
                        <?php 
                            $typePromotions = get_the_terms($promotions->ID,'type-promotion');
                            foreach ($typePromotions as $typePromotion){
                                if($typePromotion->name == 'sponsored-promotion'){
                                    echo '<div id="sponsored"><div>promo sponsorisée</div></div>';
                                } else{
                                    //rien
                                };
                            };
                        ?>
                        <div class="promotion-card__header" style='background-color:#60ee40<?php the_field('valeur_promo');?>'>
                            <span><?php the_field('valeur_promo');?> %</span>
                        </div>
                        <div class="promotion-card__body">
                            <li><?php the_title()?>
                                <ul>
                                    <li><?php the_content();?> (apparaîtra au :hover)</li>
                                    <li><?php the_field('short_description')?></li>
                                    <?php 
                                    if(get_field('promotions_associees')){?>
                                        <li><?php $boutique_a = get_field('promotions_associees');
                                        foreach ( $boutique_a as $boutique ) {
                                            echo '<a href='.$boutique->guid.'><span style="color:blue;font-weight:bolder">'.$boutique->post_name.'&nbsp;</span></a>';
                                        }
                                        ?></li>
                                        <?php
                                    }?>
                                </ul>
                            </li>
                        </div>
                    </div>

                <?php 
                }
            ?> 
        </div>
    </div>

</main>

<?php

get_footer();

?>
