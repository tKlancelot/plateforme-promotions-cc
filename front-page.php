<?php

get_header();

?>

<div class="heading">
    <!-- a déplacer dans main lorsqu'on fera le front -->
    <h2>listing des cards boutiques
        <?php 
            $count = wp_count_posts('boutique');
            echo '('.$count->publish.')'
        ;?>
    </h2>
</div>

<main id="front-page">

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
                

                <div class="boutique-card">
                    <div class="boutique-card__header">
                        <?php the_post_thumbnail();?>
                    </div>
                    <div class="boutique-card__body">
                        <ul>
                            <li><?php the_title()?>
                            <li><?php echo get_the_content() == '' ? 'description de la boutique : '. get_the_title() : the_content();?></li>
                            <li><a href=<?php the_permalink()?>>voir la boutique + coupons-A</a></li>
                            <li>horaires</li>
                            <li>
                                <?php 
                                    foreach($terms as $term){
                                        echo '<span style="color:mediumblue;font-weight:bolder">'.$term->name.'&nbsp;</span>';
                                    }
                                ?>
                            </li>  
                            <?php 
                            if(get_field('coupons_associes')){?>
                                <li><?php $coupon_a = get_field('coupons_associes');
                                foreach ( $coupon_a as $coupon ) {
                                    echo '<span style="color:red;font-weight:bolder">'.$coupon->post_name.'&nbsp;</span>';
                                }
                                ?></li>
                                <?php
                            }?>
                            <li><?php echo $phoneNumber ?></li>
                        </ul>
                    </div>
                </div>

            <?php 
            }
        ?> 

        </div>

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