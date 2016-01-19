
<?php include('liens.php');?>
<div class="container-fluid"><br />
<?php

  $valide = array();
  $encours = array();
  $refuse = array();
  //print_r($reserv);
  foreach($reserv as $r):
    switch($r['etat']):
      case "validée" : array_push($valide,$r);
        break;
      case "attente" : array_push($encours,$r);
        break;
      case "refusée" : array_push($refuse,$r);
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
          <td><?php echo $r['salle'];?></td>
          <td><?php echo $r['ville'];?></td>
          <td><?php echo $r['h_reserv'];?></td>
          <td>
            <form class="inline" action="http://trans.tristanlaurent.com/index.php/Reserver/refuser/<?php echo $r['id'];?>" method="post">
              <button type="submit" class="btn btn-default" aria-label="Left Align" >
               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
            </form>
          </td>
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
</div>
