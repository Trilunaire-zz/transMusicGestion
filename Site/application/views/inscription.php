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

  <h2>Inscription</h2>
  <p>Les champs comportant le caractère <span style="color: red;">'*'</span> sont obligatoires</p>
  <hr />
  <?php echo form_open('index.php/Inscription/Inscription'); ?>
    <input class="form-control" type="text" name="userName" placeholder="Nom du groupe/de l'artiste*" required/><br />
    <input class="form-control" type="mail" name="mail" placeholder="exemple@mail.com*"  required/><br />
    <input class="form-control" type="text" name="pays" placeholder="Pays d'origine*"  required/><br />
    <input class="form-control" type="text" name="dateCreation" placeholder="Détail de la date de création"/><br />
    <input class="form-control" type="text" name="Ville" placeholder="Ville d'origine"/><br />
    <input class="form-control" type="text" name="genre" placeholder="Genre musical"/><br />
    <input class="form-control" type="text" name="elemPr" placeholder="Élements principaux"/><br />
    <input class="form-control" type="text" name="elemPo" placeholder="Élements ponctuels"/><br />
    <input class="form-control" type="text" name="parentés" placeholder="Parentés"/><br />
    <input class="form-control" type="url" name="site" placeholder="Site Web"/><br />
    <?php echo form_submit(array('id' => 'submit', 'value' => 'S\'inscrire')); ?>
  <?php echo form_close(); ?>
</div>
