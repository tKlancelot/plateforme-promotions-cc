<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="site de coupons marchands et centres commerciaux">
  <link rel="icon" href="<?= get_template_directory_uri() . '/assets/favicon/fav.png' ?>" />
  <?php 
        wp_head(); 
      ?>
</head>

<style>
  
  html,body,*{
    box-sizing: border-box;
    margin:0;
    padding: 0;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  header,footer{
    background-color: #000;
    height: 7.2vw;
    color:#fff;
  }

  #front-page{
    display: flex;
    min-height: 48vw;
    border:8px solid red;
  }

  aside,section{
    padding: 2rem;
  }

  section ul{
    margin:1rem auto;
  }


</style>

<body>

    <header>header</header>