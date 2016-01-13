
<?php include('liens.php');


  $valide = array();
  $encours = array();
  $refuse = array();
  //print_r($reserv);
  foreach($reserv as $r):
    switch($r['etat']):
      case "Validée" : array_push($valide,$r);
        break;
      case "en cours" : array_push($encours,$r);
        break;
      case "refuse" : array_push($refuse,$r);
        break;
      default :
        break;
    endswitch;
  endforeach;


  function show($tab, $titre,$color){
  ?>
    <table class="table table-hover">
    <th colspan="5" style="background:<?php echo $color;?>"><?php echo $titre;?></th>
    <?php
      foreach($tab as $r):
        ?>
        <tr>
          <td><?php echo $r['nomlieu'];?></td>
          <td><?php echo $r['ville'];?></td>

          <?php /*
            foreach($r as $elem):?>
            <td><?php echo $elem;?></td>
          <?php endforeach;
          */ ?>
        </tr>
        <?php
      endforeach;
    ?>
    </table>
  <?php }

  show($valide, "Réservation validée","#00DF00");
  show($encours, "Réservation en cours","#DD0");
  show($refuse, "Réservation refusée","#DF0000");

  ?>
