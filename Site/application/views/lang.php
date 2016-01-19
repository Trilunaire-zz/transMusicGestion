<div id="langues">
  <?php echo form_open('index.php/Accueil/SetLang');?>
    <input type="hidden" name="addr" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
    <input type="hidden" name="language" value="fr" />
    <button class="btn btn-default">FR</button>
  </form>

  <?php echo form_open('index.php/Accueil/SetLang');?>
    <input type="hidden" name="addr" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
    <input type="hidden" name="language" value="en" />
    <button class="btn btn-default">EN</button>
  </form>
</div>
