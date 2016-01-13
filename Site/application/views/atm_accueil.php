<nav>
  <ul class="list-inline">
    <li><a href="http://trans.tristanlaurent.com/">Accueil</a></li>
    <li><a href="http://trans.tristanlaurent.com/index.php/Lieu">Rechercher une salle</a></li>
    <li><a href="http://trans.tristanlaurent.com/index.php/Accueil/Deconnection">Deconnexion</a></li>
  </ul>
</nav>

<?php
/*****************************************************************************
*
                          Reservations en cours
*
*****************************************************************************/
?>
<table class="table table-hover">
 <thead>
   <tr>
     <th colspan="5" style="background:#DD0">Réservations à traiter</th>
   </tr>
   <tr>
     <th>Artiste/Groupe</th>
     <th>Salle/Bar</th>
     <th>Ville</th>
     <th>Date et heure</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
   <?php
     foreach($encours as $r):
   ?>
       <tr>
         <td><?php echo $r['nom'];?></td>
         <td><?php echo $r['nomlieu'];?></td>
         <td><?php echo $r['ville'];?></td>
         <td><?php echo $r['h_reserv'];?></td>
         <td>

           <form class="inline" action="" method="post">
           <button type="submit" class="btn btn-default" aria-label="Left Align" >
               <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
             </button>
           </form>
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
                          Reservations validées
*
*****************************************************************************/
?>
<table class="table table-hover">
 <thead>
   <tr>
     <th colspan="5" style="background:#0A0">Réservations validées</th>
   </tr>
   <tr>
     <th>Artiste/Groupe</th>
     <th>Salle/Bar</th>
     <th>Ville</th>
     <th>Date et heure</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
   <?php
     foreach($valide as $r):
   ?>
       <tr>
         <td><?php echo $r['nom'];?></td>
         <td><?php echo $r['nomlieu'];?></td>
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
     <th colspan="5" style="background:#A00">Réservations refusées</th>
   </tr>
   <tr>
     <th>Artiste/Groupe</th>
     <th>Salle/Bar</th>
     <th>Ville</th>
     <th>Date et heure</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
   <?php
     foreach($refuse as $r):
   ?>
       <tr>
         <td><?php echo $r['nom'];?></td>
         <td><?php echo $r['nomlieu'];?></td>
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
