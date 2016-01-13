<?php include('liens.php');?>

<div class="container-fluid">
  <h2>Rechercher des salles</h2>
  <hr />
  <?php echo form_open('index.php/Lieu/research'); //FIXME: à modifier en fonction de l'évolution
  ?>
    <div class="form-horizontal">
      <input class="form-control" type="text" name="ville" placeholder="Ville recherchée"/><br />
      <input class="form-control" type="text" name="nom" placeholder="Nom de salle recherché"/><br />
      <input class="form-control" type="number" name="capacité" placeholder="Capacité recherchée"/><br />
    </div>
    <div class="form-horizontal">
      <label>Accès handicapés</label>
      <input class="form-control" type="checkbox" value="false" name="accesHandi" /><br />

      <label>Bar</label>
      <input class="radio-inline" type="radio" value="bar" name="typeSalle" /><br />
      <label>Scene</label>
      <input class="radio-inline" type="radio" value="scene" name="typeSalle" /><br />
    </div>
    <?php echo form_submit(array('id' => 'submit', 'value' => 'Rechercher'));?>
  <?php echo form_close(); ?>

  <?php if(isset($lieux)){ //RESULTATS DE LA RECHERCHE ?>
    <hr />
    <h2>Resultats</h2>
    <table class="table table-hover">
    <th>Nom</th>
    <th>Ville</th>
    <th>Capacité Max</th>
    <th></th>
    <?php
    foreach ($lieux as $salle) {
      ?>
        <tr>
          <td><?php print_r($salle['nom']);?></td>
          <td><?php echo $salle['ville'];?></td>
          <td><?php echo $salle['capacite'];?></td>
          <td><a href="http://trans.tristanlaurent.com/index.php/Reserver/Index/<?php echo $salle['nom'];?>">Reserver</a></td>
        </tr>
      <?php
    }
    echo "</table>";
  }
  ?>
</div>
