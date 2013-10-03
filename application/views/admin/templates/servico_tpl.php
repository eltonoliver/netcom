<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Serviços</center></h4>
	<div class="row">
		<div class="span12">
			<a href="<?php echo base_url(); ?>admin/servico/addService/" rel="Tooltip" title="Adicionar Serviços" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add serviços"> </a>
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
							Nome
						</th>
						<th>
							Título 
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listService as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo $value->nome; ?>
						</td>
						<td>
							<?php echo $value->titulo; ?>
						</td>
						<td>
							<a href="<?php echo base_url(); ?>admin/servico/editService/<?php echo $value->id; ?>" class="edit" title="Editar Serviço" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/servico/deleteService/<?php echo $value->id; ?>" class="delete" title="Deletar Serviço"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>