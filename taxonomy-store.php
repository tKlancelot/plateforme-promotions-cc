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
            <?php 
                // get some info about the term queried
                $queried_object = get_queried_object(); 
                $taxonomy = $queried_object->taxonomy;
                $term_id = $queried_object->term_id; 
            ?>
            <div class="list-boutique-grid">


                <?php //Get the correct taxonomy ID by id
                $term = get_term_by( 'id', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

                <?php // use the term to echo the description of the term 
                // echo term_description( $term, $taxonomy ) ?>


                <?php if(have_posts()) :  ?>	
                <?php while(have_posts()) :  ?>	
                <?php the_post(); ?>	

                <!--  -->
                <div class="list-boutique-card">
                    <!-- <a href=<?php // echo get_the_permalink();?> class="list-boutique-card__header"> -->
                    <div class="list-boutique-card__header">
                        <?php the_post_thumbnail();?>
                    </div>
                    <div class="list-boutique-card__body">
                        <h2><?php the_title(); ?></h2>
                        <?php echo '<p>'.get_the_excerpt().'</p>'; ?>
                        <div class="meta">
                            <?php 
                            $store = get_the_term_list( $post->ID, 'store', '<li>', '', '</li>'); ?>  
                            <?php echo $store; ?>
                        </div>
                    </div>
                </div>
                <!-- </a> -->

                <?php endwhile;  ?>
                <?php endif; // end of the loop. ?>

            </div>
        </section>
    </div>

</main>

<?php

get_footer();


?>