<aside>
    <!-- listing des catégories : taxo associée aux boutiques -->
    <div>
        <h2>listing des categories</h2>
        <ul>  
        <?php
            $args = array(
                'taxonomy' => 'store',
                'orderby' => 'name', // term_id
                "order" => "ASC",
                'hide_empty' => 0,
                'fields' => 'all',
                // 'exclude' => 1,
                'title_li'=>'',
                'show_count'=> 1
            );
            $cats = wp_list_categories( $args );
        ?>
        </ul>
    </div>

    <!-- listing des boutiques -->
    <div>
        <h2>listing des boutiques</h2>

        <?php
        $marchand =  new WP_Query(array(
            'post_type' => 'boutique'
        ));
        ?>
        <ul>
        <?php 
            while($marchand->have_posts()){
                $marchand->the_post(); ?>
                    <li><a href="<?php the_permalink()?>"><?php the_title();?></li></a>
                <?php
            }?>
        </ul>
    </div>
</aside>