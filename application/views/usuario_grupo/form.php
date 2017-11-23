<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css" />
<script src="<?php echo base_url()?>assets/js/validate.js"></script>
<div class="row">
   	<div class="col-xs-12">
   		<?php echo form_open('usuariogrupo/salvar', 'id="formulario" class="form-horizontal"'); ?>
    		<div class="table-header">
				<i class="menu-icon fa fa-users"></i>
				Perfil de usuário
			</div>
    		<div class="widget-box">
    			<div class="widget-body" id="usuariogrupo_div">
    				<div class="widget-main">
    					<input type="hidden" name="id_registro" value="<?php echo isset($page_data->id) ? $page_data->id : '' ?>" />
    					<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Código: </label>
							<div class="col-sm-9">
								<input type="text" name="cd_usuario_grupo" placeholder="Código" class="col-xs-10 col-sm-5" value="<?php echo isset($page_data->cd_usuario_grupo) ? $page_data->cd_usuario_grupo : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Denominação: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_denominacao" placeholder="Nome do grupo de permissão" class="col-xs-10 col-sm-5" value="<?php echo isset($page_data->ds_denominacao) ? $page_data->ds_denominacao : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Ativo: </label>
							<div class="col-sm-9">
								<label class="col-sm-3 control-label text-left no-padding-left">
									<?php echo form_checkbox('fl_situacao', '1', isset($page_data->fl_situacao) ? $page_data->fl_situacao == 1 ? true : false : true, 'class="ace ace-switch ace-switch-5"'); ?>
									<span class="lbl"></span>
								</label>
							</div>
						</div>
						<div class="space-24"></div>
						<h3 class="header smaller red">Permissões</h3>
						<div class="row">
							<div class="col-xs-4 col-sm-3 pricing-span-header">
								<div class="widget-box transparent">
									<div class="widget-header">
										<h5 class="widget-title bigger lighter">Opção no sistema</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main no-padding">
											<ul class="list-unstyled list-striped pricing-table-header">
												<li>Dashboard </li>
												<li>Grupo de usuário </li>
												<li>Entidade </li>
												<li>Usuário </li>
												<li>Pessoa </li>
												<li>Sobre </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- Início da leitura dos parâmetros -->
							<div class="col-xs-8 col-sm-9 pricing-span-body">
    	                        <?php 
                                if (isset($page_data->ds_chave)){
                                    $ds_chave = unserialize($page_data->ds_chave);
                                }
                                ?>
								<div class="pricing-span">
									<div class="widget-box pricing-box-small widget-color-dark">
										<div class="widget-header">
											<h5 class="widget-title bigger lighter">Visualizar</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="list-unstyled list-striped pricing-table">
													<li> 	
													 	<?php echo form_checkbox('-r-dashboard', '1', isset($ds_chave['-r-dashboard']) && $ds_chave['-r-dashboard'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 	
													 	<?php echo form_checkbox('-r-grupousuario', '1', isset($ds_chave['-r-grupousuario']) && $ds_chave['-r-grupousuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 					
													 	<?php echo form_checkbox('-r-entidade', '1', isset($ds_chave['-r-entidade']) && $ds_chave['-r-entidade'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-r-usuario', '1', isset($ds_chave['-r-usuario']) && $ds_chave['-r-usuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-r-pessoa', '1', isset($ds_chave['-r-pessoa']) && $ds_chave['-r-pessoa'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>													
													<li>
													 	<?php echo form_checkbox('-r-sobre', '1', isset($ds_chave['-r-sobre']) && $ds_chave['-r-sobre'] == '1' ? true : false, 'class="ace"'); ?>		
														<span class="lbl"></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="pricing-span">
									<div class="widget-box pricing-box-small widget-color-dark">
										<div class="widget-header">
											<h5 class="widget-title bigger lighter">Inserir</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="list-unstyled list-striped pricing-table">
													<li> 	
													 	<?php echo form_checkbox('-c-dashboard', '1', isset($ds_chave['-c-dashboard']) && $ds_chave['-c-dashboard'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 	
													 	<?php echo form_checkbox('-c-grupousuario', '1', isset($ds_chave['-c-grupousuario']) && $ds_chave['-c-grupousuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 					
													 	<?php echo form_checkbox('-c-entidade', '1', isset($ds_chave['-c-entidade']) && $ds_chave['-c-entidade'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-c-usuario', '1', isset($ds_chave['-c-usuario']) && $ds_chave['-c-usuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-c-pessoa', '1', isset($ds_chave['-c-pessoa']) && $ds_chave['-c-pessoa'] == '1' ? true : false, 'class="ace"'); ?>	
														<span class="lbl"></span>
													</li>													
													<li>
													 	<?php echo form_checkbox('-c-sobre', '1', isset($ds_chave['-c-sobre']) && $ds_chave['-c-sobre'] == '1' ? true : false, 'class="ace"'); ?>		
														<span class="lbl"></span>
													</li>
												</ul>

											</div>
										</div>
									</div>
								</div>

								<div class="pricing-span">
									<div class="widget-box pricing-box-small widget-color-dark">
										<div class="widget-header">
											<h5 class="widget-title bigger lighter">Alterar</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="list-unstyled list-striped pricing-table">
													<li> 	
													 	<?php echo form_checkbox('-u-dashboard', '1', isset($ds_chave['-u-dashboard']) && $ds_chave['-u-dashboard'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 	
													 	<?php echo form_checkbox('-u-grupousuario', '1', isset($ds_chave['-u-grupousuario']) && $ds_chave['-u-grupousuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 					
													 	<?php echo form_checkbox('-u-entidade', '1', isset($ds_chave['-u-entidade']) && $ds_chave['-u-entidade'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-u-usuario', '1', isset($ds_chave['-u-usuario']) && $ds_chave['-u-usuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-u-pessoa', '1', isset($ds_chave['-u-pessoa']) && $ds_chave['-u-pessoa'] == '1' ? true : false, 'class="ace"'); ?>	
														<span class="lbl"></span>
													</li>													
													<li>
													 	<?php echo form_checkbox('-u-sobre', '1', isset($ds_chave['-u-sobre']) && $ds_chave['-u-sobre'] == '1' ? true : false, 'class="ace"'); ?>		
														<span class="lbl"></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="pricing-span">
									<div class="widget-box pricing-box-small widget-color-dark">
										<div class="widget-header">
											<h5 class="widget-title bigger lighter">Excluir</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="list-unstyled list-striped pricing-table">
													<li> 	
													 	<?php echo form_checkbox('-d-dashboard', '1', isset($ds_chave['-d-dashboard']) && $ds_chave['-d-dashboard'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 	
													 	<?php echo form_checkbox('-d-grupousuario', '1', isset($ds_chave['-d-grupousuario']) && $ds_chave['-d-grupousuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li> 					
													 	<?php echo form_checkbox('-d-entidade', '1', isset($ds_chave['-d-entidade']) && $ds_chave['-d-entidade'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-d-usuario', '1', isset($ds_chave['-d-usuario']) && $ds_chave['-d-usuario'] == '1' ? true : false, 'class="ace"'); ?>
														<span class="lbl"></span>
													</li>
													<li>
													 	<?php echo form_checkbox('-d-pessoa', '1', isset($ds_chave['-d-pessoa']) && $ds_chave['-d-pessoa'] == '1' ? true : false, 'class="ace"'); ?>	
														<span class="lbl"></span>
													</li>													
													<li>
													 	<?php echo form_checkbox('-d-sobre', '1', isset($ds_chave['-d-sobre']) && $ds_chave['-d-sobre'] == '1' ? true : false, 'class="ace"'); ?>		
														<span class="lbl"></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>					
    				</div>
    			</div>
    		</div>
        	<div class="clearfix form-actions">
        		<div class="col-md-offset-3 col-md-9">
        			<button class="btn btn-info" type="submit">
        				<i class="ace-icon fa fa-check bigger-110"></i>
        				Confirmar
        			</button>
        
        			&nbsp; &nbsp; &nbsp;
        			<a href="<?php echo base_url()?>usuariogrupo"  class="btn">
        				<i class="ace-icon fa fa-times bigger-110"></i>
        				Fechar
        			</a>
        		</div>
        	</div>			
		<?php echo form_close(); ?>
   	</div><!-- /.span -->
</div><!-- /.row -->
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>


<script type="text/javascript">
	jQuery(function($) {
			$('#formulario').submit(function(event) {
			//Limpa as mensagens de erro
			$('#messages').removeClass('alert alert-success').empty();
			$('#messages').removeClass('alert alert-block alert-danger').empty();
		    var $form = $('#formulario');
	        var $inputs = $form.find("input, select, button, textarea");
	        var serializedData = $form.serialize();

	        $inputs.prop("disabled", true);
	        request = $.ajax({
	            url: "<?php echo base_url(); ?>usuariogrupo/save",
	            type: "post",
	            dataType: 'json',
	            data: serializedData
	        });

	        // callback handler that will be called on success
	        request.done(function (response, textStatus, jqXHR) {
				if (response.result == false){
    	        	$('#messages').addClass('alert alert-block alert-danger')
    	        		.append('<p>' + response.msg + '</p>')
            			.append('</button>');
				} else {
    	        	$('#messages').addClass('alert alert-success')
	        		.append('<p>' + response.msg + '</p>')
        			.append('</button>');
    	        	$('input[name="id_registro"]').val(response.id);
    	        	$('input[name="cd_usuario_grupo"]').val(response.cd);    	        	
				}					
	        });
	        // callback handler that will be called on failure
	        request.fail(function (jqXHR, textStatus, errorThrown) {
	            console.error("Ocorreu um erro ao salvar os registros: " + textStatus, errorThrown);
	        });
	        request.always(function () {
	            $inputs.prop("disabled", false);
	        });
	        event.preventDefault();
		});
	});	     
</script>