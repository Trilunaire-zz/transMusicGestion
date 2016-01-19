<?php

  $text = array(
            'en' => array(
              'connection_title'=> "Connection",
              'connection_log' => "Login",
              'connection_pass'=> "Password",
              'connection_sub' => "Connection",
              'connection_link'=> "Create an account ."

            ),

            'fr' => array(
              'connection_title'=> "Connexion",
              'connection_log' => "Identifiant",
              'connection_pass'=> "Mot de passe",
              'connection_sub' => "Connexion",
              'connection_link'=> "Pas encore inscrit ?",

            )

  );


 ?>

<div class="container-fluid">
  <h2><?php echo $text[$lang]['connection_title'];?></h2>
  <hr />
  <?php echo form_open('index.php/Accueil/Connection');?>
    <input class="form-control" type="text" name="login" placeholder="<?php echo $text[$lang]['connection_log'];?>" required /> <br />
    <input class="form-control" type="password" name="pass" placeholder="<?php echo $text[$lang]['connection_pass'];?>" required /> <br />
    <input type="submit" value="<?php echo $text[$lang]['connection_sub'];?>" />
  </form>
  <a href="http://trans.tristanlaurent.com/index.php/Inscription"><?php echo $text[$lang]['connection_link'];?></a>
</div>
