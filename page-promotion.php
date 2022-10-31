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

        <section>
            <?php
                $promotions =  new WP_Query(array(
                    'post_per_page' => '16',
                    'post_type' => 'promotion'
                ));

                while($promotions->have_posts()){
                    $promotions->the_post(); 
                    ?>
                    <?php 
                    // $discountValue = get_post_meta(get_the_ID(),DiscountValue::META_KEY,true);
                    ?>
                    <ul>
                        <li><?php the_title()?>
                            <ul>
                                <li><?php the_content();?> (apparaîtra au :hover)</li>
                                <li><?php the_field('valeur_promo')?> %</li>
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
                    </ul>

                <?php 
                }
            ?> 

        </section>
    </div>

</main>

<?php

get_footer();

?>
