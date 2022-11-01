<?php 


class ShortDescription {

    const META_KEY = 'short_description';

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'courte description',[self::class,'render'],'promotion','normal');
    } 

    public static function render($post){

        $value = get_post_meta($post->ID,self::META_KEY,true);
        ?>
            <input type="text" name='short_description' value="<?= $value ?>">
            <label for=<?php self::META_KEY ?>>courte description</label>
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