<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125">
				<i class="ace-icon fa fa-random"></i>
				500
			</span>
			Algo deu errado
		</h1>

		<hr />
		<h3 class="lighter smaller"><i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
			Mas nós estamos trabalhando nisso! 
		</h3>
		<div class="space"></div>
		<div>
			<h4 class="lighter smaller">Por enquanto, você pode:</h4>

			<ul class="list-unstyled spaced inline bigger-110 margin-15">
				<li>
					<i class="ace-icon fa fa-hand-o-right blue"></i>
					Acessar esta opção mais tarde
				</li>

				<li>
					<i class="ace-icon fa fa-hand-o-right blue"></i>
					Enviar um e-mail para o administrador descrevendo o problema:
				</li>
			</ul>
		</div>
    	<div>
    		<h5><?php echo $heading; ?></h5>
    		<p><?php echo $message; ?></p>
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