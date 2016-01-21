<?php include('liens.php');?>
<div class="container-fluid">
<h1><span class="glyphicon glyphicon-user"></span> <?php echo $info['nom'];?></h1>

<p><span class="glyphicon glyphicon-time"></span> Formation : <?php echo $info['datedecreation'];?></p>

<a href="http://trans.tristanlaurent.com/index.php/Fiche/modifier"><button class="btn btn-default">Modifier</button></a>
<pre>
<?php print_r($info);?>
</pre>

</div>
