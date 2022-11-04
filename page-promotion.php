<?php

/* Template Name: All Promotions */

?>

<?php include(__DIR__.'/utils/random-picto.php');?>

<?php

$array_pictos = ['promo-one.jpg','promo-two.jpg'];

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
                    $intensity = get_field('valeur_promo') / 100;
                    ?> 
                    <div class="promotion-card" style='border-color:rgba(255, 125, 0, <?php echo $intensity?>);'>
                        <div class="absolute-info-frame">
                            <div>
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                        </div>
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
                        <div class="promotion-card__header">

                            <?php echo empty(get_the_post_thumbnail()) ?  '<img src="'.get_template_directory_uri().'/assets/images/'.get_random_picture($array_pictos).'" alt="promotype">' :  the_post_thumbnail();  ?>
                        </div>
                        <div class="promotion-card__body">
                            <h2><?php the_title()?></h2>
                            <?php echo empty(get_field('short_description')) ?  'pas de description :(' :  the_field('short_description');  ?>
                                <div class="meta">
                                    <span><?php the_field('valeur_promo');?> %</span>
                                    <!-- <span></span> -->
                                    <?php 
                                        if(get_field('promotions_associees')){
                                            $boutique_a = get_field('promotions_associees');
                                            foreach ( $boutique_a as $boutique ) {
                                                echo '<a href='.$boutique->guid.'><span style="color:blue;font-weight:bolder">'.$boutique->post_name.'&nbsp;</span></a>';
                                            }
                                        }
                                    ?>
                            </div>
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
