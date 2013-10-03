<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Página Home</center></h4>
	<div class="row">
		<div class="span12">
			<?php if (count($listHome) < 1) {?>
			<a href="<?php echo base_url(); ?>admin/page_home/addHome/" rel="Tooltip" title="Adicionar Home" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add Home"> </a>
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
							Descrição
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listHome as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo word_limiter($value->mensagem, 3); ?>
						</td>
					
						<td>
							<a href="<?php echo base_url(); ?>admin/page_home/editHome/<?php echo $value->id; ?>" class="edit" title="Editar Página Home" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/page_home/deleteHome/<?php echo $value->id; ?>" class="delete" title="Deletar Página Home"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>