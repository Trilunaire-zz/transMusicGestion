    </div>
    <footer>
      <nav class="inline">
        <h4><?php echo $lang=='fr'?"Navigation ":"Navigation ";?></h4>
        <ul>
          <li <?php if($title=='Accueil'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/"><?php echo $lang=='fr'?"Accueil ":"Home ";?></a></li>
          <li <?php if($title=='Rechercher des salles'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/index.php/Lieu"><?php echo $lang=='fr'?"Rechercher une salle ":"Research a place";?></a></li>
          <li <?php if($title=='Fiche personnelle'){ echo "class=\"active\"";}?>><a href="http://trans.tristanlaurent.com/index.php/Fiche"><?php echo $lang=='fr'?"Fiche personnelle":"Personnal data ";?></a></li>
          <li><a href="http://trans.tristanlaurent.com/index.php/Accueil/Deconnection"><?php echo $lang=='fr'?"Deconnexion":"Log out";?></a></li>
        </ul>
      </nav>
      <div class="inline">
        <h1>Projet Trans-musicales</h1>
        <p><a href="http://trans.tristanlaurent.com">Mentions légales</a></p>
      </div>
      <div class="inline" id="dev">
        <h4>Développé par</h4>
        <a href="http://www.anthonylohou.com">Anthony LOHOU</a><br />
        <a href="http://www.tristanlaurent.com">Trsitan LAURENT</a><br />
        <a href="https://github.com/Trilunaire/transMusicGestion">Le code sur GitHub</a>
      </div>
    </footer>
  </body>
</html>
