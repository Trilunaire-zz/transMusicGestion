<div class="container-fluid">
  <h2>Connexion</h2>
  <hr />
  <?php echo form_open('index.php/Accueil/Connection');?>
    <input class="form-control" type="text" name="login" placeholder="Votre login" required /> <br />
    <input class="form-control" type="password" name="pass" placeholder="Mot de passe" required /> <br />
    <input type="submit" value="Connexion" />
  </form>
  <a href="http://trans.tristanlaurent.com/index.php/Inscription">Pas encore inscrit?</a>
</div>
