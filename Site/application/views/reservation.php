<?php
  include('liens.php');
  //print_r($info_salle);
  //print_r($reservations);
  $dates = array();
  foreach ($reservations as $r) {
    array_push($dates,$r['h_reserv']);
  }
?>
<?php //Présentation de la salle ?>
<div>
  <h1><?php echo $info_salle[0]['nom'];?> - <?php echo $info_salle[0]['ville'];?></h1>
  <p><strong>Capacité maximale : </strong><?php echo $info_salle[0]['capacite'];?> personnes</p>
  <p><strong>Accès chaise roulante : </strong><?php echo $info_salle[0]['acces_handi'];?></p>
  <p><strong>Numéro du responsable : </strong>0<?php echo $info_salle[0]['numresponsable'];?></p>
</div>

<?php //Schedule ?>
<div class="btn-group btn-group-justified">
  <?php for($j = 15;$j<19;$j++):?>
  <div class="inline">
  <div class="btn-group-vertical" role="group">
    <?php echo "$j/12/2016"?>
    <?php for($i = 10; $i<24;$i++)
    {
      if($key = array_search("2016-12-$j $i:00:00",$dates)){
        echo '<button type="button" class="btn btn-default" disabled>'.$i.':00-'.($i+1).':00</button>';
      }else{
        ?>


        <form action="http://trans.tristanlaurent.com/index.php/Reserver/reservation/<?php echo $info_salle[0]['id'];?>" method="post" >
        <input type="hidden" value="<?php echo '2016-12-'.$j.' '.$i.':00:00';?>" name="date" />
        <button type="submit" class="btn btn-default">
            <?php echo $i.':00-'.($i+1).':00';?>
          </button>
        </form>
        <?php

      }
    }
    ?>
  </div>
  </div>
  <?php endfor;?>
</div>
