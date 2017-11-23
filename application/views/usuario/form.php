<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css" />

<script src="<?php echo base_url()?>assets/js/validate.js"></script>
<div class="row">
   	<div class="col-xs-12">
   		<?php echo form_open('#', 'id="formulario" class="form-horizontal"'); ?>
    		<div class="table-header">
				<i class="menu-icon fa fa-users"></i>
				Usuários
			</div>
    		<div class="widget-box">
    			<div class="widget-body" id="usuario_div">
    				<div class="widget-main">
    					<input type="hidden" name="id_registro" value="<?php echo isset($page_data->id) ? $page_data->id : '' ?>" />
    					<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Código: </label>
							<div class="col-sm-9">
								<input type="text" name="cd_usuario" placeholder="Código" class="col-xs-6 col-sm-2" value="<?php echo isset($page_data->cd_usuario) ? $page_data->cd_usuario : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Nome: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_nome" placeholder="Nome do usuário" class="col-xs-6" value="<?php echo isset($page_data->ds_nome) ? $page_data->ds_nome : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> E-mail: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_email" placeholder="E-mail do usuário" class="col-xs-12" value="<?php echo isset($page_data->ds_email) ? $page_data->ds_email : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Login: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_login" placeholder="Login do usuário" class="col-xs-10 col-sm-5" value="<?php echo isset($page_data->ds_login) ? $page_data->ds_login : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Senha: </label>
							<div class="col-sm-9">
								<input type="password" name="ds_senha" placeholder="Senha" class="col-xs-10 col-sm-5" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Telefone: </label>
							<div class="col-sm-9">
								<input type="text" id="nr_telefone" name="nr_telefone" placeholder="Número do telefone" class=".col-xs-4" value="<?php echo isset($page_data->nr_telefone) ? $page_data->nr_telefone : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-3"> Ativo: </label>
							<div class="col-sm-9">
								<label class="col-sm-3 control-label text-left no-padding-left">
									<?php echo form_checkbox('fl_situacao', '1', isset($page_data->fl_situacao) ? $page_data->fl_situacao == 1 ? true : false : true, 'class="ace ace-switch ace-switch-5"'); ?>
									<span class="lbl"></span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right">Perfil: </label>
							<div class="col-sm-9">
								<div class="pos-rel">
								  <select class="usuario_grupo_id form-control" style="width:500px" name="usuario_grupo_id"></select>
								</div>
							</div>
						</div>
						<div class="space-24"></div>
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
        			<a href="<?php echo base_url()?>usuario"  class="btn">
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
<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>

<script type="text/javascript">
	jQuery(function($) {
	    $(document).ready(function(){
            $("#nr_telefone").mask("(99) 9999-9999?9")
            $("#nr_telefone").blur(function(event) {
                if($(this).val().length == 15){
                  $('#nr_telefone').mask('(99) 99999-999?9');
                } else {
                  $('#nr_telefone').mask('(99) 9999-9999?9');
                }
            });
	    });

		$('.usuario_grupo_id').select2({
			placeholder: 'Selecionar um perfil',
			ajax: {
				url: "<?php echo site_url('UsuarioGrupo/getSelectByData')?>",
		        data: function (term) {
			        var value = term['term'] == null ? '' : term['term'];
		            return {
		            	'search[value]': value,
		            	'length':10,
		            	'start':0
		            };
		        },
	            dataType: 'json',
	            type: "POST",
	            quietMillis: 250,
	            processResults: function (data) {
	              return {
	                results: data
	              };
	            },
	            cache: true
			}
		});
		//Carregar o perfil do usuário para visualização. Somente quando existir registro gravado no banco
		<?php if (isset($page_data->usuario_grupo_id)){ ?>
		var newOption = new Option('<?php echo $page_data->usuario_grupo_ds_denominacao?>', <?php echo $page_data->usuario_grupo_id?>, false, false);
		$('.usuario_grupo_id').append(newOption).trigger('change');
        $('.usuario_grupo_id').val(<?php echo $page_data->usuario_grupo_id?>).trigger('change')
        <?php }?>

        //Submit do formulário.
		$('#formulario').submit(function(event) {
			//Limpa as mensagens de erro
			$('#messages').removeClass('alert alert-success').empty();
			$('#messages').removeClass('alert alert-block alert-danger').empty();
		    var $form = $('#formulario');
	        var $inputs = $form.find("input, select, button, textarea");
	        var serializedData = $form.serialize();

	        $inputs.prop("disabled", true);
	        request = $.ajax({
	            url: "<?php echo base_url(); ?>usuario/save",
	            type: "post",
	            dataType: 'json',
	            data: serializedData
	        });
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
    	        	$('input[name="cd_usuario"]').val(response.cd);    	        	
				}					
	        });
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