<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Banners</center></h4>
	<div class="row">
		<div class="span12">
			<?php if (count($listBanner) <= 7) {?>
			<a href="<?php echo base_url(); ?>admin/banner/addBanner/" rel="Tooltip" title="Adicionar Banners" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add Banner"> </a>
			<?php } ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span12">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>
							Cód.
						</th>
						<th>
							Legenda
						</th>
						<th>
							Imagem 
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listBanner as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo $value->legenda; ?>
						</td>
						<td>
							<img src="<?php echo base_url(); ?>assets/images_dinamic/banner/<?php  

								$thumb = explode('.', $value->imagem);
								$thumb = $thumb[0]."_thumb.".$thumb[1];

								echo $thumb;

							 ?>" /> 
						</td>
						<td>
							<a href="<?php echo base_url(); ?>admin/banner/editBanner/<?php echo $value->id; ?>" class="edit" title="Editar Banner" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/banner/deleteBanner/<?php echo $value->id; ?>" class="delete" title="Deletar Banner"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>