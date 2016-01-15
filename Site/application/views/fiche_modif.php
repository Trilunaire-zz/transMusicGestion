<?php include('liens.php');?>
<div class="container-fluid">
<h1><?php echo $info['nom'];?></h1>

<?php echo form_open('index.php/Fiche/modifier'); ?>
  <input class="form-control" type="text" name="dateCreation" value="<?php echo $info['datedecreation'];?>" placeholder="Détail de la date de création"/><br />
  <input class="form-control" type="text" name="Ville" value="<?php echo $info['ville'];?>" placeholder="Ville d'origine"/><br />
  <input class="form-control" type="text" name="genre" value="<?php echo $info['genre'];?>" placeholder="Genre musical"/><br />
  <input class="form-control" type="text" name="elemPr" value="<?php echo $info['elements_principaux'];?>" placeholder="Élements principaux"/><br />
  <input class="form-control" type="text" name="elemPo" value="<?php echo $info['elements_ponctuels'];?>" placeholder="Élements ponctuels"/><br />
  <input class="form-control" type="text" name="parentés" value="<?php echo $info['parentés'];?>" placeholder="Parentés"/><br />
  <input class="form-control" type="url" name="site" value="<?php echo $info['siteweb'];?>" placeholder="Site Web"/><br />
  <button type="submit" class="btn btn-default">Modifier</button>
<?php echo form_close(); ?>


<pre>
<?php print_r($info);?>
</pre>

</div>
