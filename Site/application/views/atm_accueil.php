<?php
  include('liens.php');

  $text = array(
    'en' => array(
      'artiste' => "Artist/Band",
      'place' => "Place",
      'city' => "City",
      'time' => "Date",
      'reserv_v' => "Accepted demands",
      'reserv_a' => "Refused demands",
      'reserv_t' => "Untreated demands",
    ),
    'fr' => array(
      'artiste' => "Artiste/Groupe",
      'place' => "Salle/Bar",
      'city' => "Ville",
      'time' => "Date",
      'reserv_v' => "Demandes Acceptées",
      'reserv_a' => "Demandes refusées",
      'reserv_t' => "Demandes en cours",
    ),
  );

/*****************************************************************************
*
                          Reservations en cours
*
*****************************************************************************/
?>
<br />
<div class="container-fluid">
  <table class="table table-hover">
   <thead>
     <tr>
       <th colspan="5" style="background:#DD0"><?php echo $text[$lang]['reserv_t'];?></th>
     </tr>
     <tr>
       <th><?php echo $text[$lang]['artiste'];?></th>
       <th><?php echo $text[$lang]['place'];?></th>
       <th><?php echo $text[$lang]['city'];?></th>
       <th><?php echo $text[$lang]['time'];?></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach($encours as $r):
     ?>
         <tr>
           <td><?php echo $r['nom'];?></td>
           <td><?php echo $r['salle'];?></td>
           <td><?php echo $r['ville'];?></td>
           <td><?php echo $r['h_reserv'];?></td>
           <td>

             <form class="inline" action="http://trans.tristanlaurent.com/index.php/Reserver/accepter/<?php echo $r['id'];?>" method="post">
             <button type="submit" class="btn btn-default" aria-label="Left Align" >
                 <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
               </button>
             </form>
             <form class="inline" action="http://trans.tristanlaurent.com/index.php/Reserver/refuser/<?php echo $r['id'];?>" method="post">
             <button type="submit" class="btn btn-default" aria-label="Left Align" >
                 <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
               </button>
             </form>
           </td>
         </tr>
     <?php
       endforeach;
     ?>
   </tbody>
  </table>

  <?php
  /*****************************************************************************
  *
                            Reservations validées
  *
  *****************************************************************************/
  ?>
  <table class="table table-hover">
   <thead>
     <tr>
       <th colspan="5" style="background:#0A0"><?php echo $text[$lang]['reserv_v'];?></th>
     </tr>
     <tr>
       <th><?php echo $text[$lang]['artiste'];?></th>
       <th><?php echo $text[$lang]['place'];?></th>
       <th><?php echo $text[$lang]['city'];?></th>
       <th><?php echo $text[$lang]['time'];?></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach($valide as $r):
     ?>
         <tr>
           <td><?php echo $r['nom'];?></td>
           <td><?php echo $r['salle'];?></td>
           <td><?php echo $r['ville'];?></td>
           <td><?php echo $r['h_reserv'];?></td>
           <td>
             <form class="inline" action="" method="post">
             <button type="submit" class="btn btn-default" aria-label="Left Align" >
                 <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
               </button>
             </form>
           </td>
         </tr>
     <?php
       endforeach;
     ?>
   </tbody>
  </table>

  <?php
  /*****************************************************************************
  *
                            Reservations refusées
  *
  *****************************************************************************/
  ?>
  <table class="table table-hover">
   <thead>
     <tr>
       <th colspan="5" style="background:#F00"><?php echo $text[$lang]['reserv_a'];?></th>
     </tr>
     <tr>
       <th><?php echo $text[$lang]['artiste'];?></th>
       <th><?php echo $text[$lang]['place'];?></th>
       <th><?php echo $text[$lang]['city'];?></th>
       <th><?php echo $text[$lang]['time'];?></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach($refuse as $r):
     ?>
         <tr>
           <td><?php echo $r['nom'];?></td>
           <td><?php echo $r['salle'];?></td>
           <td><?php echo $r['ville'];?></td>
           <td><?php echo $r['h_reserv'];?></td>
           <td>
             <form class="inline" action="" method="post">
             <button type="submit" class="btn btn-default" aria-label="Left Align" >
                 <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
               </button>
             </form>
           </td>

         </tr>
     <?php
       endforeach;
     ?>
   </tbody>
  </table>
</div>
