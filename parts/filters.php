<div> 

<!-- par defaut le formulaire est en methode GET -->
<form action="">

    <select name="orderby" id="orderby">
        <option value="date" <?php echo selected($_GET['orderby'],'date');?>>du plus récent au plus ancien</option>
        <option value="title" <?php echo selected($_GET['orderby'],'title');?>>par ordre alphabétique</option>
    </select>

    <input type="hidden" id="order" name="order" value="<?php echo(isset($_GET['order']) && $_GET['order'] == "ASC") ? "ASC" : "DESC";?>">

    <?php
    // recuperer les termes de la requete
  $terms = get_terms([
    'taxonomy' => 'store',
    'hide_empty' => false
  ]);

  foreach ($terms as $term) :

  ?>

  <label>

      <input
        type="checkbox"
        name="store[]"
        value="<?php echo $term->slug; ?>"
        <?php checked(
          (isset($_GET['store']) && in_array($term->slug, $_GET['store']))
        ) ?>
      />

      <?php echo $term->name; ?>

    </label>

  <?php endforeach; ?>
  
  
  <button type="submit">Apply</button>

</form>

</div>

<script>


const archiveOrderby = document.getElementById('orderby');
const archiveOrder = document.getElementById('order');

if (archiveOrderby && archiveOrder) {

  const setOrder = () => {

    const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;

    if ('title' === orderBy) {
      archiveOrder.value = 'ASC';
    } else {
      archiveOrder.value = 'DESC';
    }

  }

  archiveOrderby.addEventListener('change', setOrder);

  setOrder();

}
</script>