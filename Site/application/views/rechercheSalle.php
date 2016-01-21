<?php include('liens.php');?>

<?php
  $text = array(
    'en' => array(
      'title' => "Research a place",
      'f_city' => "City",
      'f_salle' => "Name of the salle",
      'f_cap' => "maximum capacity",
      'f_handi' => "Handicap access",
      'f_type_s' => "Scene",
      'f_type_b' => "Bar",
      'f_submit' => "Search",
      'results' => "Results",
      'reserver' => "Reserve",
      'f_rechHoraire' => "Research by hour",
      'f_hour' => "Hour (hh:mm)",
    ),
    'fr' => array(
      'title' => "Rechercher une salle",
      'f_city' => "Ville ",
      'f_salle' => "Nom de la salle",
      'f_cap' => "capacité max",
      'f_handi' => "Accès handicapé",
      'f_type_s' => "Scène",
      'f_type_b' => "Bar",
      'f_submit' => "Rechercher",
      'results' => "Resultats",
      'reserver' => "Reserver",
      'f_rechHoraire' => "Recherche horaire",
      'f_hour' => "Heure (hh:mm)",
    ),
  );
?>
<div class="container-fluid">
  <h2><?php echo $text[$lang]['title'];?></h2>
  <hr />
  <?php echo form_open('index.php/Lieu/research'); //FIXME: à modifier en fonction de l'évolution
  ?>
    <div class="form-horizontal">
      <div class="block_inline">
        <input class="form-control" type="text" name="ville" placeholder="<?php echo $text[$lang]['f_city'];?>"/><br />
        <input class="form-control" type="text" name="nom" placeholder="<?php echo $text[$lang]['f_salle'];?>"/><br />
        <input class="form-control" type="number" name="capacité" placeholder="<?php echo $text[$lang]['f_cap'];?>"/><br />


      </div>
      <div class="block_inline">
        <!-- DATE PICKER for the calendar -->
        <label><?php echo $text[$lang]['f_rechHoraire'];?> <input type="checkbox" value="false" name="recherchehoraire" id="recherchehoraire" onchange="cache()"></input><br />
        </label><br />
        <label>15 <input class="radio-inline" type="radio" value="15" name="day" disabled="true" id="day15" checked/>
        </label>
        <label>16 <input class="radio-inline" type="radio" value="16" name="day" disabled="true" id="day16"/>
        </label>
        <label>17 <input class="radio-inline" type="radio" value="17" name="day" disabled="true" id="day17"/>
        </label>
        <label>18 <input class="radio-inline" type="radio" value="18" name="day" disabled="true" id="day18"/>
        </label>
        <div class="input-group">
          <input type="text" class="form-control" name="hour" disabled="true" id="hour" required="false" placeholder="<?php echo $text[$lang]['f_hour'];?>"/>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
        <label><?php echo $text[$lang]['f_handi'];?> <input type="checkbox" value="true" name="accesHandi" />
        </label>
        <br />
        <label><?php echo $text[$lang]['f_type_b'];?> <input class="radio-inline" type="radio" value="bar" name="typeSalle" />
        </label>
        <br />
        <label><?php echo $text[$lang]['f_type_s'];?> <input class="radio-inline" type="radio" value="scene" name="typeSalle" />
        </label>
        <br />
      </div>
      <br />
      <button type="submit" class="btn btn-default" > <?php echo $text[$lang]['f_submit'];?> </button>

  <?php echo form_close(); ?>

  <hr />
  <h2><?php echo $text[$lang]['results'];?></h2>
  <table class="table table-hover">
  <tr>
    <th><?php echo $text[$lang]['f_salle'];?></th>
    <th><?php echo $text[$lang]['f_city'];?></th>
    <th><?php echo $text[$lang]['f_cap'];?></th>
    <th><?php echo $text[$lang]['f_handi'];?></th>
    <th>Contact</th>
    <th></th>
  </tr>

  <?php if(isset($lieux)){ //RESULTATS DE LA RECHERCHE ?>

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
          <td><a href="http://trans.tristanlaurent.com/index.php/Reserver/Index/<?php echo $salle['id'];?>"><?php echo $text[$lang]['reserver'];?></a></td>
        </tr>
      <?php
    }
  }
  ?>
</table>
</div>
</div>

<script type="text/javascript">
  function cache(){
    if(document.getElementById('recherchehoraire').value == "false"){
      document.getElementById('day15').disabled = false;
      document.getElementById('day16').disabled = false;
      document.getElementById('day17').disabled = false;
      document.getElementById('day18').disabled = false;
      document.getElementById('hour').disabled = false;
      document.getElementById('hour').required = true;
      document.getElementById('recherchehoraire').value = "true";
    }else{
      document.getElementById('day15').disabled = true;
      document.getElementById('day16').disabled = true;
      document.getElementById('day17').disabled = true;
      document.getElementById('day18').disabled = true;
      document.getElementById('hour').disabled = true;
      document.getElementById('hour').required = false;
      document.getElementById('recherchehoraire').value = "false";
    }
  }
</script>
