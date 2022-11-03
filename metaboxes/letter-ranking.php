<?php 


class LetterRanking {

    const META_KEY = 'letter_ranking';

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'classement lettre',[self::class,'render'],'boutique','side');
    } 

    public static function render($post){
    
        $value = get_post_meta($post->ID,self::META_KEY,true);
        ?>
            <?php $title =  substr($post->post_title, 0, 1); ?>
            <?php

                function checkItem($title){
                    $ae = array("a","b","c","d","e");
                    $fj = array("f","g","h","i","j");
                    $ko = array("k","l","m","n","o");
                    $pt = array("p","q","r","s","t");
                    $uz = array("u","v","w","x","y","z");
                    switch (true) {
                    case (in_array($title,$ae)):
                        echo "a-e";
                        break;
                    case (in_array($title,$fj)):
                        echo "f-j";
                        break;
                    case (in_array($title,$ko)):
                        echo "k-o";
                        break;
                    case (in_array($title,$pt)):
                        echo "k-o";
                        break;
                    case (in_array($title,$uz)):
                        echo "u-z";
                        break;
                    }
                }
            ?>
            <input type="checkbox" name='letter_ranking' value="<?= checkItem($title)?>" checked>
            <label for=<?php self::META_KEY ?>><?php checkItem($title)?></label>
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