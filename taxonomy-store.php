<?php

get_header();

?>

<main>

    <h2>archive de la taxonomy store</h2>

<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
?>
Posts with the term: <?php echo get_queried_object()->name; ?>

<?php //Get the correct taxonomy ID by id
$term = get_term_by( 'id', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<?php // use the term to echo the description of the term 
echo term_description( $term, $taxonomy ) ?>


<?php if(have_posts()) :  ?>	
<?php while(have_posts()) :  ?>	
<?php the_post(); ?>		

<div class="post">
<h2><?php the_title(); ?></h2>
<?php the_content();?>

<div class="meta">
<?php 
$store = get_the_term_list( $post->ID, 'store', '<li>', '', '</li>'); ?>  
<?php echo $store ?>
</div><!-- meta -->

</div><!-- post -->


<?php endwhile;  ?>
<div class="clear"></div>


<?php endif; // end of the loop. ?>

</main>

<?php

get_footer();


?>