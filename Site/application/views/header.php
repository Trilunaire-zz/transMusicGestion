<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/bootstrap-3.3.6/css/bootstrap.css" />
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/datepicker.css" />
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/style.css" />
    <link rel="stylesheet" href="http://trans.tristanlaurent.com/assets/css/bootstrap-datepicker-1.5.1-dist/css/bootstrap-datepicker3.css" />
    <script src="http://trans.tristanlaurent.com/assets/jquery.js"></script>
  </head>
  <body>
    <div id="entete">
      <?php if(isset($_SESSION['login'])):?>
        <h4><?php echo $lang=='fr'?"Bonjour ":"Hello "; echo $_SESSION['login'];?></h4>
      <?php endif;?>
      <?php include('lang.php');?>
    </div>
    <div id="conteneur">
      <div>
        <CENTER>
          <h1>Festival des trans musicales 2016</h1>
        </CENTER>
      </div>
