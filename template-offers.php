<?php /* Template Name: All offers */ ?>


<?php

get_header();

?>



<main id="all-offers" class="main">

    <div class="main__header">
        <h2>listing coupon test</h2>    
    </div>

    <div class="main__body">
        <?php include(__DIR__.'/parts/aside.php');?>

        <section>
            <?php
                $coupons =  new WP_Query(array(
                    'post_per_page' => '16',
                    'post_type' => 'coupon'
                ));

                while($coupons->have_posts()){
                    $coupons->the_post(); 
                    ?>
                    <?php 
                    // $discountValue = get_post_meta(get_the_ID(),DiscountValue::META_KEY,true);
                    ?>
                    <ul>
                        <li><?php // the_title()?>
                            <ul>
                                <li><?php the_content();?> (apparaîtra au :hover)</li>
                                <!-- <li><a href=<?php // the_permalink()?>>voir le coupon (voir le magasin qui propose le coupon)</a></li> -->
                                <li><?php the_field('valeur_promo')?> %</li>
                                <?php 
                                if(get_field('coupons_associes')){?>
                                    <li><?php $boutique_a = get_field('coupons_associes');
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
