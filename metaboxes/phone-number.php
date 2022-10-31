<?php 


class PhoneNumber {

    const META_KEY = 'phone_number';

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'numéro de téléphone - boutique',[self::class,'render'],'boutique','side');
    } 

    public static function render($post){

        $value = get_post_meta($post->ID,self::META_KEY,true);
        ?>

            <small><i>Format: 0123456789</i></small><br/>
            <label for=<?php self::META_KEY ?>>numéro de téléphone</label>
            <input type="tel" name='phone_number' value="<?= $value ?>" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
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