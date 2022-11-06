<?php

get_header();

?>

<main id="single-boutique" class="main">

    <div class="main__header">
        <h2>single boutiques</h2>
    </div>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="main__body">
        <div class="boutique-content">
            <div class="boutique-content__body">
                <div class="boutique-content__body__left">
                    <?php
                        $phoneNumber = get_post_meta(get_the_ID(),PhoneNumber::META_KEY,true);
                        $terms = get_the_terms(get_the_id(),'store');
                        $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
                    ?>

                    <div class="single-card">
                        <div class="single-card__header">
                            <?php the_post_thumbnail();?>
                        </div>
                        <div class="single-card__body">
                            <h2><?php the_title(); ?></h2>
                            <ul>
                                <li>
                                    <?php 
                                        foreach($terms as $term){
                                            echo '<span style="color:mediumblue;">'.$term->name.'&nbsp;</span>';
                                        }
                                    ?>
                                </li>
                                <li><?php echo $phoneNumber ?></li>
                                <!-- to do  -->
                                <li><button>link to map</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="boutique-content__body__right">
                    <div class="description">
                        <p><?php the_content();?></p>
                    </div>
                    <div class="schedule">
                        <table>

                        <?php for ($i = 0; $i < count(Horaires::DAYS_INFO);$i++){
                            ?>
                            <tr>
                                <td><?php echo $days[$i];?></td>
                                <td>
                                    <?php 
                                        if($i == 6){
                                            if(get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_open'],true) || get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_close'],true)){?>
                                                <span>De <?php echo get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_open'],true); ?></span>
                                                <span>à  <?php echo get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_close'],true);?></span>
                                            <?php
                                            } else {
                                                echo '<span>fermé</span>';
                                            }
                                        ?>
                                        <?php
                                        } else {?>
                                            <span>De 
                                                <?php 
                                                    echo get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_open'],true) ?  get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_open'],true) : '8h00'; 
                                                ?>
                                            </span>
                                            <span>à 
                                                <?php 
                                                    echo get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_close'],true) ?  get_post_meta(get_the_ID(),Horaires::DAYS_INFO[$i]['meta_key_close'],true) : '18h00'; 
                                                ?>
                                            </span>
                                        <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="linked-promotions">
            <div class="linked-promotions__body">
                <div class="heading-frame">
                    <h3>les offres proposées par votre boutique</h3>
                </div>
                <div class="grid">
                    <?php 
                    if(get_field('promotions_associees')){?>
                    <?php $promotion_a = get_field('promotions_associees');
                        foreach ( $promotion_a as $promotion ) {
                            ?>
                    <?php 
                                $discountValue = get_field('valeur_promo',$promotion->ID);
                                $shortDescription = get_field('short_description',$promotion->ID);

                            ?>
                    <div class="promotion-card">
                        <div class="promotion-card__header">
                            <?php the_post_thumbnail();?>
                        </div>
                        <div class="promotion-card__body">
                            <?php 
                                        // $shortDescription = get_post_meta($promotion->ID,ShortDescription::META_KEY,true);
                                    ?>
                            <h4><?php the_title();?></h4>
                            <h3><?php echo $promotion->post_title;?>&nbsp;</h3>
                            <p><?php echo $shortDescription; ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo '<span>Pas de promotion pour cette boutique.</span>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php

get_footer();


?>