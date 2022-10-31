<?php 


class AssociatedBoutique {

    // relation entre boutique et coupons 

    const META_KEY = 'associated_boutique';

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'boutique associée',[self::class,'render'],'coupon','normal');
    } 

    public static function render($post){

        $value = get_post_meta($post->ID,self::META_KEY,true);

        // global $post;
        // $selected_boutique = get_post_meta( $post->ID, 'boutique', true );
        $all_boutiques = get_posts( array(
            'post_type' => 'boutique',
            'numberposts' => -1,
            'orderby' => 'post_title',
            'order' => 'ASC'
        ) );

        ?>
        <label for=<?php self::META_KEY?>>Boutique associée</label>
        <select name='associated_boutique'>
            <option><?php echo $value;?></option>
            <?php foreach ( $all_boutiques as $boutique ) : ?>
            <?php 
                if($boutique->post_title !== $value){
                    echo '<option>'.$boutique->post_title.'</option>';
                }
            endforeach; 
            ?>
        </select>
        <?php

        // Don't forget about this, otherwise you will mess up with other data on the page
        wp_reset_postdata();

    }

    public static function save($post){

        if(array_key_exists(self::META_KEY,$_POST) && current_user_can('edit_post', $post )){

            if($_POST[self::META_KEY] === '0'){
                delete_post_meta($post,self::META_KEY);
            } else {
                update_post_meta($post,self::META_KEY,$_POST[self::META_KEY]);
            }
        }

    }

}


