<nav>
  <ul class="nav nav-tabs nav-justified">
    <li <?php if($title=='Accueil'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/"><?php echo $lang=='fr'?"Accueil ":"Home ";?></a></li>
    <li <?php if($title=='Rechercher des salles'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/index.php/Lieu"><?php echo $lang=='fr'?"Rechercher une salle ":"Research a place";?></a></li>
    <li <?php if($title=='Fiche personnelle'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/index.php/Fiche"><?php echo $lang=='fr'?"Fiche personnelle":"Personnal data ";?></a></li>
    <li><a href="http://trans.tristanlaurent.com/index.php/Accueil/Deconnection"><?php echo $lang=='fr'?"Deconnexion":"Log out";?></a></li>
  </ul>
</nav>
