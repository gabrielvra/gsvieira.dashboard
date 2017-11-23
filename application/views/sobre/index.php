<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125">
				<i class="menu-icon fa fa-info-circle"></i>
			</span>
			Informações do sistema
		</h1>
		<hr />
		<h4 class="lighter smaller">
			Ambiente:
		</h4>
		<div>
			<ul class="list-unstyled spaced inline bigger-110 margin-15">
				<li>
					<i class="ace-icon fa fa-hand-o-right blue"></i>
					Versão do PHP: <?php echo phpversion();?>
				</li>

				<li>
					<i class="ace-icon fa fa-hand-o-right blue"></i>
					Framework CodeIgniter: <?php echo CI_VERSION?>
				</li>
				<li>
					<i class="ace-icon fa fa-hand-o-right blue"></i>
					Banco de dados: <?php echo $this->db->platform();?> - <?php echo $this->db->version();?>
				</li>
				
				
			</ul>
		</div>

		<hr />
		<div class="space"></div>

		<div class="center">
			<a href="javascript:history.back()" class="btn btn-grey">
				<i class="ace-icon fa fa-arrow-left"></i>
				Voltar
			</a>

			<a href="<?php echo base_url();?>" class="btn btn-primary">
				<i class="ace-icon fa fa-tachometer"></i>
				Principal
			</a>
		</div>
	</div>
</div>