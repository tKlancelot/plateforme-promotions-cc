<form id="searchform" action="/" method="get">
    <div>
        <!-- <label for="search">Search in <?php 
        // echo home_url( '/' ); 
        ?></label> -->
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="carrefour, adidas" />
        <input type="submit" alt="Search" value="search"/>
    </div>
</form>

<!-- src="<?php 
// bloginfo( 'template_url' ); 
?>/images/search.png"  -->