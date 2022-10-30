<?php

get_header();

?>

<main id="front-page">
    <aside>
        <h2>listing des categories</h2>
        <?php
            $args = array(
                'taxonomy' => 'category',
                'orderby' => 'name', // term_id
                "order" => "ASC",
                'hide_empty' => 0,
                'fields' => 'all',
                'exclude' => 1,
                'show_count'=> 1
            );
            $cats = wp_list_categories( $args );
        ?>

        <h2>listing des boutiques</h2>
    </aside>

    <section>
        <h2>custom post type :  coupons</h2>

        <?php
            $coupons =  new WP_Query(array(
                'post_per_page' => '4',
                'post_type' => 'coupon'
            ));

            while($coupons->have_posts()){
                $coupons->the_post(); ?>
                <?php $discountValue = get_post_meta(get_the_ID(),DiscountValue::META_KEY,true);?>
                <ul>
                    <li><?php the_title()?>
                        <ul>
                            <li><?php the_content();?> (apparaîtra au :hover)</li>
                            <li><a href=<?php the_permalink()?>>voir le coupon (voir le magasin qui propose le coupon)</a></li>
                            <li><?php echo $discountValue;?> %</li>
                            <li><?php echo (get_the_category($coupons->ID)[0]->name)?></li>
                            <!-- <li> -->
                                <?php 
                                // echo (get_the_terms($coupons->ID,'type-coupon')[0]->name)
                                ?>
                            <!-- </li> -->
                            <li><?php echo get_the_date('l j F Y' );?></li>
                        </ul>
                    </li>
                </ul>

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