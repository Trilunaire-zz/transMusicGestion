<div class="container-fluid">
  <?php
  if(isset($message)){?>
    <CENTER><h3 style="color:green;">Inscription Reussie</h3></CENTER><br>
  <?php
  }
  if(isset($errorMDP)){?>
    <CENTER><h3 style="color:red;">Mots de passe différents</h3></CENTER><br>
  <?php
  }
  ?>
  <?php

    $text = array(
              'en' => array(
                'inscription_title'=> "Sing up",
                'inscription_need' => 'The fields with <span style="color: red;">"*"</span> are required',
                'inscription_user' => "Band's name *",
                'inscription_mail'=> "example@mail.com *",
                'inscription_land' => "Origin country",
                'inscription_date'=> "Date of creation",
                'inscription_city'=> "Origin city",
                'inscription_genre' => "Music style",
                'inscription_prin' => "Principal instruments",
                'inscription_sec'  => "Secondary instruments",
                'inscription_par' => "Associated artists",
                'website' => "website",
                'inscription_sub' => "Sign up",
                'inscription_link' => 'Sign in ?',
              ),

              'fr' => array(
                'inscription_title'=> "Inscription",
                'inscription_need' => 'Les champs comportant le caractère <span style="color: red;">"*"</span> sont obligatoires',
                'inscription_user' => "Nom du groupe/Artiste *",
                'inscription_mail'=> "exemple@mail.com *",
                'inscription_land' => "pays d'origine",
                'inscription_date'=> "Date de formation",
                'inscription_city'=> "Ville d'origine",
                'inscription_genre' => "Genre musical",
                'inscription_prin' => "Principaux instruments",
                'inscription_sec'  => "Instruments secondaires",
                'inscription_par' => "Parentés",
                'website' => "Site personnel",
                'inscription_sub' => "S'inscrire",
                'inscription_link' => 'Déjà inscrit ?',
              )

    );


   ?>
  <h2><?php echo $text[$lang]['inscription_title'];?></h2>
  <p><?php echo $text[$lang]['inscription_need'];?></p>
  <hr />
  <?php echo form_open('index.php/Inscription/Inscription'); ?>
    <input class="form-control" type="text" name="userName" placeholder="<?php echo $text[$lang]['inscription_user'];?>" required/><br />
    <input class="form-control" type="mail" name="mail" placeholder="<?php echo $text[$lang]['inscription_mail'];?>"  required/><br />
    <input class="form-control" type="text" name="pays" placeholder="<?php echo $text[$lang]['inscription_land'];?>"  required/><br />
    <input class="form-control" type="text" name="dateCreation" placeholder="<?php echo $text[$lang]['inscription_date'];?>"/><br />
    <input class="form-control" type="text" name="Ville" placeholder="<?php echo $text[$lang]['inscription_city'];?>"/><br />
    <input class="form-control" type="text" name="genre" placeholder="<?php echo $text[$lang]['inscription_genre'];?>"/><br />
    <input class="form-control" type="text" name="elemPr" placeholder="<?php echo $text[$lang]['inscription_prin'];?>"/><br />
    <input class="form-control" type="text" name="elemPo" placeholder="<?php echo $text[$lang]['inscription_sec'];?>"/><br />
    <input class="form-control" type="text" name="parentés" placeholder="<?php echo $text[$lang]['inscription_par'];?>"/><br />
    <input class="form-control" type="url" name="site" placeholder="<?php echo $text[$lang]['website'];?>"/><br />
    <button class="btn btn-default" type="submit"><?php echo $text[$lang]['inscription_sub'];?></button>
  <?php echo form_close(); ?>
  <a href="http://trans.tristanlaurent.com/"><?php echo $text[$lang]['inscription_link'];?></a>
</div>
