<?php 


class Horaires {

    const META_KEY = 'horaires';

    const MONDAY_I = [
        'meta_key_open' => 'horaires-mo-o',
        'meta_key_close' => 'horaires-mo-f',
        'msg' => 'Lundi',
    ];
    const TUESDAY_I = [
        'meta_key_open' => 'horaires-tu-o',
        'meta_key_close' => 'horaires-tu-f',
        'msg' => 'Mardi',
    ];
    const WEDNESDAY_I = [
        'meta_key_open' => 'horaires-we-o',
        'meta_key_close' => 'horaires-we-f',
        'msg' => 'Mercredi',
    ];
    const THURSDAY_I = [
        'meta_key_open' => 'horaires-th-o',
        'meta_key_close' => 'horaires-th-f',
        'msg' => 'Jeudi',
    ];
    const FRIDAY_I = [
        'meta_key_open' => 'horaires-fr-o',
        'meta_key_close' => 'horaires-fr-f',
        'msg' => 'Vendredi',
    ];
    const SATURDAY_I = [
        'meta_key_open' => 'horaires-sa-o',
        'meta_key_close' => 'horaires-sa-f',
        'msg' => 'Samedi',
    ];
    const SUNDAY_I = [
        'meta_key_open' => 'horaires-su-o',
        'meta_key_close' => 'horaires-su-f',
        'msg' => 'Dimanche',
    ];

    const DAYS_INFO = [
        self::MONDAY_I,
        self::TUESDAY_I,
        self::WEDNESDAY_I,
        self::THURSDAY_I,
        self::FRIDAY_I,
        self::SATURDAY_I,
        self::SUNDAY_I
    ];

    public static function register(){
        add_action('add_meta_boxes',[self::class,'add']);
        add_action('save_post',[self::class,'save']);
    } 

    public static function add(){
        add_meta_box(self::META_KEY,'horaires de la boutique',[self::class,'render'],'boutique','normal');
    } 

    public static function render($post){

        foreach (self::DAYS_INFO as $day_info){

            $value_o = get_post_meta($post->ID,$day_info['meta_key_open'],true);
            $value_f = get_post_meta($post->ID,$day_info['meta_key_close'],true);
            ?>
            <div class="input-group">
                <div>
                    <label for=<?= $day_info['meta_key_open'] ?>>Ouverture <?= $day_info['msg'] ?></label>
                    <input type="time" id=<?= $day_info['meta_key_open'] ?> name=<?= $day_info['meta_key_open'] ?> min="00:00" max="23:59" value="<?php echo $value_o ?>">
                </div>
                <div>
                    <label for=<?= $day_info['meta_key_close'] ?>>Fermeture <?= $day_info['msg'] ?></label>
                    <input type="time" id=<?= $day_info['meta_key_close'] ?> name=<?= $day_info['meta_key_close'] ?> min="00:00" max="23:59" value="<?php echo $value_f ?>">
                </div>
            </div>
        <?php
        }
    }

    public static function save($post){

        foreach (self::DAYS_INFO as $day_info){

            if(array_key_exists($day_info['meta_key_open'],$_POST) && array_key_exists($day_info['meta_key_close'],$_POST) && current_user_can('edit_post', $post )){

                if($_POST[$day_info['meta_key_open']] === '0' && $_POST[$day_info['meta_key_close']] === '0'){
                    delete_post_meta($post,$day_info['meta_key_open']);
                    delete_post_meta($post,$day_info['meta_key_close']);
                } else {
                    update_post_meta($post,$day_info['meta_key_open'],$_POST[$day_info['meta_key_open']]);
                    update_post_meta($post,$day_info['meta_key_close'],$_POST[$day_info['meta_key_close']]);
                }
            }
        }
    }


}