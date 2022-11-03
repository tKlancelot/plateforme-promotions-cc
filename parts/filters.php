<div class="aside__body__item">
    <!-- <h2>filtres javascript</h2> -->
    <div class="btn-group">
        <button id="all">all</button>
        <button id="ab">ab</button>
        <button id="cd">cd</button>
        <button id="ef">ef</button>
        <button id="gh">gh</button>
        <button id="ij">ij</button>
        <button id="kl">kl</button>
        <button id="mn">mn</button>
        <button id="op">op</button>
        <button id="qr">qr</button>
        <button id="st">st</button>
        <button id="uv">uv</button>
        <button id="wx">wx</button>
        <button id="yz">yz</button>
    </div>

    <!-- par defaut le formulaire est en methode GET -->
    <!-- <form id="filterform" action="">

        <?php
        // recuperer les termes de la requete
        // $terms = get_terms([
        //     'taxonomy' => 'letter-ranking',
        //     'hide_empty' => false,
        //     'post_count' => true
        // ]);
        ?>
        <div class="label-group">
            <label>
                <?php // foreach ($terms as $term) :?>

                    <input
                        type="checkbox"
                        name="letter-ranking[]"
                        value="<?php // echo $term->slug; ?>"
                        <?php // checked(
                        //(isset($_GET['letter-ranking']) && in_array($term->slug, $_GET['letter-ranking']))
                        //) ?>
                    />

                    <?php //echo $term->name ;?>
                    <?php //echo '(' .$term->count. ')';?>

                <?php //endforeach; ?>

            </label>
            <?php //wp_reset_postdata(); ?>
        </div>

        <button type="submit">Apply</button>

    </form> -->
</div>

<script>

    // const archiveOrderby = document.getElementById('orderby');
    // const archiveOrder = document.getElementById('order');

    // if (archiveOrderby && archiveOrder) {

    // const setOrder = () => {

    //     const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;

    //     if ('title' === orderBy) {
    //     archiveOrder.value = 'ASC';
    //     } else {
    //     archiveOrder.value = 'DESC';
    //     }

    // }

    // archiveOrderby.addEventListener('change', setOrder);

    // setOrder();

    // }

    // on recupere toutes les boutiques cards


</script>