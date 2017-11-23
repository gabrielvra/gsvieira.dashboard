<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" />

<script src="<?php echo base_url()?>assets/js/validate.js"></script>
<div class="row">
   	<div class="col-xs-12">
   		<?php echo form_open('#', 'id="formulario" class="form-horizontal"'); ?>
    		<div class="table-header">
				<i class="menu-icon fa fa-users"></i>
				Usuários
			</div>
    		<div class="widget-box">
    			<div class="widget-body" id="pessoa_div">
    				<div class="widget-main">
    					<input type="hidden" name="id_registro" value="<?php echo isset($page_data->id) ? $page_data->id : '' ?>" />
    					<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Código: </label>
							<div class="col-sm-9">
								<input type="text" name="cd_pessoa" placeholder="Código" class="col-xs-6 col-sm-2" value="<?php echo isset($page_data->cd_pessoa) ? $page_data->cd_pessoa : '' ?>" />
							</div>
						</div>				
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Nome: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_nome" placeholder="Nome do usuário" class="col-xs-6" value="<?php echo isset($page_data->ds_nome) ? $page_data->ds_nome : '' ?>" />
							</div>
						</div>			
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-select-1"> Tipo: </label>
							<div class="col-sm-9">
								<select class="col-xs-6 col-sm-2" name="tp_pessoa" id="tp_pessoa">
									<option value="1" <?php echo isset($page_data->tp_pessoa) ? $page_data->tp_pessoa == 1 ? 'selected' : '' : '' ?>>Física</option>
									<option value="2" <?php echo isset($page_data->tp_pessoa) ? $page_data->tp_pessoa == 2 ? 'selected' : '' : '' ?>>Jurídica</option>
								</select>
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-3"> CPF ou CNPJ: </label>
							<div class="col-sm-9">
								<input type="text" id="ds_documento" name="ds_documento" placeholder="CPF ou CNPJ" class="col-xs-6" value="<?php echo isset($page_data->ds_documento) ? $page_data->ds_documento : '' ?>" />
							</div>
						</div>				
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Data nascimento: </label>
							<div class="col-sm-3">
								<div class="input-group input-group-sm">
									<input type="text" id="id-date-picker-1" name="dt_nascimento" class="form-control date-picker" value="<?php echo isset($page_data->dt_nascimento) ? $this->convert->getMySQLDateTimeToString($page_data->dt_nascimento) : '' ?>"/>
									<span class="input-group-addon">
										<i class="ace-icon fa fa-calendar"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Telefone: </label>
							<div class="col-sm-9">
								<input type="text" id="nr_telefone" name="nr_telefone" placeholder="Número do telefone" class=".col-xs-4" value="<?php echo isset($page_data->nr_telefone) ? $page_data->nr_telefone : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> E-mail: </label>
							<div class="col-sm-9">
								<input type="text" name="ds_email" placeholder="E-mail para contato" class="col-xs-12" value="<?php echo isset($page_data->ds_email) ? $page_data->ds_email : '' ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right">Usuário: </label>
							<div class="col-sm-9">
								<div class="pos-rel">
								  <select class="usuario_id form-control" style="width:500px" name="usuario_id"></select>
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
        			<a href="<?php echo base_url()?>pessoa"  class="btn">
        				<i class="ace-icon fa fa-times bigger-110"></i>
        				Fechar
        			</a>
        		</div>
        	</div>			
		<?php echo form_close(); ?>
   	</div><!-- /.span -->
</div><!-- /.row -->
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
	jQuery(function($) {
		//Formato do número de telefone
        $("#nr_telefone").mask("(99) 9999-9999?9")
        $("#nr_telefone").blur(function(event) {
            if($(this).val().length == 15){
              $('#nr_telefone').mask('(99) 99999-999?9');
            } else {
              $('#nr_telefone').mask('(99) 9999-9999?9');
            }
        });
        
        //Formato da data de nascimento
		$('.date-picker').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			forceParse: false
		}).mask('99/99/9999')
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		//Inserir máscara padrão no campo
		if ($('#ds_documento').val().length == 18){
            $('#ds_documento').mask('99.999.999/9999-99');
		} else {
			$('#ds_documento').mask('999.999.999-99');
		}
		
		//Atualizar a máscara caso trocar o tipo de pessoa.			
        $("#tp_pessoa").blur(function(event) {
            if($("#tp_pessoa").val() == 2){
              $('#ds_documento').mask('99.999.999/9999-99');
            } else {
              $('#ds_documento').mask('999.999.999-99');
            }
        });
		//Seleção do usuário
		$('.usuario_id').select2({
			placeholder: 'Selecionar um usuário',
			ajax: {
				url: "<?php echo site_url('Usuario/getSelectByData')?>",
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
		<?php if (isset($page_data->usuario_id)){ ?>
		var newOption = new Option('<?php echo $page_data->usuario_ds_login?>', <?php echo $page_data->usuario_id?>, false, false);
		$('.usuario_id').append(newOption).trigger('change');
        $('.usuario_id').val(<?php echo $page_data->usuario_id?>).trigger('change')
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
	            url: "<?php echo base_url(); ?>pessoa/save",
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
    	        	$('input[name="cd_pessoa"]').val(response.cd);

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