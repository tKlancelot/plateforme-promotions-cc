<?php

get_header();

?>

<main id="front-page">

    <?php include(__DIR__.'/parts/aside.php');?>

    <section>
        <h2>listing des cards boutiques</h2>

        <?php
            $boutiques =  new WP_Query(array(
                'post_per_page' => '16',
                'post_type' => 'boutique'
            ));

            while($boutiques->have_posts()){
                $boutiques->the_post(); ?>

                <div class="boutique-card">
                    <ul>
                        <li><?php the_title()?>
                        <li><?php echo get_the_content() == '' ? 'description de la boutique : '. get_the_title() : the_content();?></li>
                        <li><a href=<?php the_permalink()?>>voir la boutique (voir single de la boutique et tous les coupons qu'elle répertorie)</a></li>
                        <li>horaires</li>
                            <?php 
                            if(get_field('coupons_associes')){?>
                                <li><?php $coupon_a = get_field('coupons_associes');
                                foreach ( $coupon_a as $coupon ) {
                                    echo '<span style="color:red;font-weight:bolder">'.$coupon->post_name.'&nbsp;</span>';
                                }
                                ?></li>
                                <?php
                            }?>
                    </ul>
                </div>

            <?php 
            }
        ?> 

    </section>


</main>

<?php 

get_footer();

?>

<?php
    // $terms = get_terms( array(
    //     'taxonomy' => 'type-coupon',
    //     'hide_empty' => false,
    // ) );
    // echo '<ul>';
    // foreach ( $terms  as $term ) {
    //     echo '<li><a href="'.get_term_link($term).'"/>'.$term->name.'</a></li>';
    // }
    // echo '</ul>';	
?>

<?php
    // $coupons =  new WP_Query(array(
    //     'post_per_page' => '16',
    //     'post_type' => 'coupon'
    // ));

    // while($coupons->have_posts()){
    //     $coupons->the_post(); 
        ?>
        <?php 
        // $discountValue = get_post_meta(get_the_ID(),DiscountValue::META_KEY,true);
        ?>
        <!-- <ul>
            <li><?php // the_title()?>
                <ul>
                    <li><?php //the_content();?> (apparaîtra au :hover)</li>
                    <li><a href=<?php // the_permalink()?>>voir le coupon (voir le magasin qui propose le coupon)</a></li>
                    <li><?php // echo $discountValue;?> %</li>
                    <li><?php //echo get_the_date('l j F Y' );?></li>
                </ul>
            </li>
        </ul> -->

    <?php 
    //}
?> 