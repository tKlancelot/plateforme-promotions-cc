<?php 


class DiscountValue {

    const META_KEY = 'discount_value';

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'valeur de la remise',[self::class,'render'],'coupon','normal');
    } 

    public static function render($post){

        $value = get_post_meta($post->ID,self::META_KEY,true);
        ?>

            <input type="number" min="0" max="100" name='discount_value' value="<?= $value ?>">
            <label for=<?php self::META_KEY ?>>valeur de la remise</label>
        <?php
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