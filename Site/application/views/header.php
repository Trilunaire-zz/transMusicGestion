<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/bootstrap-3.3.6/css/bootstrap.css" />
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/style.css" />
  </head>
  <body>
    <div>
      <CENTER>
        <h1>Festival des trans musicales 2016</h1>
        <?php if(isset($_SESSION['login'])):?>
          <h2>Bonjour <?php echo $_SESSION['login'];?></h2>
        <?php endif;?>
      </CENTER>
    </div>
