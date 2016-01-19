<div class="container-fluid">

  <?php echo form_open_multipart('index.php/InscripSec/Inscription'); ?>
    <div class="inline" >
      <img id="upload_skill_preview" height="128" width="128" src="" />
      <input id="form_type" type="hidden" name="type" value="" />
      <input class="btn btn-default" type="file" name="image" size="20" />
    </div>
    <div class="inline" >
      <img id="upload_skill_preview" height="128" width="128" src="" />
      <input id="form_type" type="hidden" name="type" value="" />
      <input class="btn btn-default" type="file" name="image" size="20" />
    </div>
    <div class="inline" >
      <img id="upload_skill_preview" height="128" width="128" src="" />
      <input id="form_type" type="hidden" name="type" value="" />
      <input class="btn btn-default" type="file" name="image" size="20" />
    </div><br />
      <button class="btn btn-default" type="submit">Valider</button>
    </form>
      <a href="http://trans.tristanlaurent.com" ><button class="btn btn-default" type="submit">Passer</button></a>

</div>



<script>
  $(':file').change(function(event){
    $('#upload_skill_preview').attr({
          'src':URL.createObjectURL(event.target.files[0])
        });
  })
</script>
