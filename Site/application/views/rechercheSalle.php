<?php include('liens.php');?>

<div class="container-fluid">
  <h2>Rechercher des salles</h2>
  <hr />
  <?php echo form_open('index.php/Lieu/research'); //FIXME: à modifier en fonction de l'évolution
  ?>
    <div class="form-horizontal">
      <div class="block_inline">
        <input class="form-control" type="text" name="ville" placeholder="Ville recherchée"/><br />
        <input class="form-control" type="text" name="nom" placeholder="Nom de salle recherché"/><br />
        <input class="form-control" type="number" name="capacité" placeholder="Capacité recherchée"/><br />
      </div>
      <div class="block_inline">
        <label>Accès handicapés <input type="checkbox" value="false" name="accesHandi" />
        </label>
        <br />
        <label>Bar <input class="radio-inline" type="radio" value="bar" name="typeSalle" />
        </label>
        <br />
        <label>Scene <input class="radio-inline" type="radio" value="scene" name="typeSalle" />
        </label>
        <br />
        <button type="submit" class="btn btn-default" > Rechercher </button>
      </div>
    </div>

  <?php echo form_close(); ?>

  <?php if(isset($lieux)){ //RESULTATS DE LA RECHERCHE ?>
    <hr />
    <h2>Resultats</h2>
    <table class="table table-hover">
    <th>Nom</th>
    <th>Ville</th>
    <th>Capacité Max</th>
    <th>Accès Handicapé</th>
    <th>Responsable</th>
    <th></th>
    <?php
    foreach ($lieux as $salle) {
      ?>
        <tr>
          <td><?php print_r($salle['nom']);?></td>
          <td><?php echo $salle['ville'];?></td>
          <td><?php echo $salle['capacite'];?></td>
          <td>
            <?php
              if ($salle['acces_handi']=='t') {
                echo "Oui";
              }else{
                echo "Non";
              }
            ?>
          </td>
          <td>+33<?php echo $salle['numresponsable'];?></td>
          <td><a href="http://trans.tristanlaurent.com/index.php/Reserver/Index/<?php echo $salle['id'];?>">Reserver</a></td>
        </tr>
      <?php
    }
    echo "</table>";
  }
  ?>
</div>
