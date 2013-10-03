<?php 

foreach ($listBanner as $value) {
	
	$id 			= $value->id;
	$legend 		= $value->legenda;
	$imagem         = $value->imagem;
 			

}
$thumb = explode('.', $imagem);
$thumb = $thumb[0]."_thumb.".$thumb[1];
 ?>
<h4 class="titleBack"><center>Editar Banner</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open_multipart('admin/banner/updateBanner/'.$id);   ?>

Imagem do Banner : <input type="file" name="userfile" id="userfile"><br />
Imagem cadastrada : <img src="<?php echo base_url(); ?>assets/images_dinamic/banner/<?php  echo $thumb; ?>" /><br />
Legenda do Banner : <textarea id="descricao" name="legend"> <?php echo $legend; ?> </textarea><br />

<br />

<button class="btn"> Alterar </button>


<?php echo form_close(); ?>