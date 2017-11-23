<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Acesso ao sistema</title>
		<meta name="description" content="Página de acesso ao sistema" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-desktop green"></i>
									<span class="red">Dashboard</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; gsvieira</h4>
							</div>

							<div class="space-6"></div>
							<div id="messages"> </div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Informações de acesso
											</h4>
											<div class="space-6"></div>
											<?php echo form_open('#', 'id="formulario_acessar"'); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Login" name="ds_login" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Senha" name="ds_senha" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Lembre-se de mim</span>
														</label>
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Acessar</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											<?php echo form_close(); ?>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													Esqueci minha senha
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Cadastrar
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Recuperar senha
											</h4>

											<div class="space-6"></div>
											<p>
												Inserir seu e-mail de cadastro.
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="E-mail" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Enviar</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Tela de acesso
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Novo usuário
											</h4>
											<div class="space-6"></div>
											<p> Detalhes do cadastro: </p>
											<?php echo form_open('#', 'id="formulario_cadastrar"'); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="ds_nome" placeholder="Nome do usuário" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" name="ds_email" placeholder="E-mail" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="ds_login" placeholder="Login" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="ds_senha" placeholder="Senha" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repetir senha" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															Aceito os
															<a href="#">Termos</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Limpar</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Registrar</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											<?php echo form_close(); ?>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Tela de acesso
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
    			 $(document).on('click', '.toolbar a[data-target]', function(e) {
    				e.preventDefault();
    				var target = $(this).data('target');
    				$('.widget-box.visible').removeClass('visible');//hide others
    				$(target).addClass('visible');//show target
    			 });
    
                 //Submit do formulário.
         		$('#formulario_acessar').submit(function(event) {
         			//Limpa as mensagens de erro
         			$('#messages').removeClass('alert alert-success').empty();
         			$('#messages').removeClass('alert alert-block alert-danger').empty();
         		    var $form = $('#formulario_acessar');
         	        var $inputs = $form.find("input, select, button, textarea");
         	        var serializedData = $form.serialize();
         
         	        $inputs.prop("disabled", true);
         	        request = $.ajax({
         	            url: "<?php echo base_url(); ?>usuario/processUsuarioLogin",
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
							window.setTimeout(function () {
                 	              location.href = "<?php echo base_url();?>";
                 	        }, 1000);
         				}					
         	        });
         	        request.fail(function (jqXHR, textStatus, errorThrown) {
         	            console.error("Ocorreu um erro ao efetuar o login: " + textStatus, errorThrown);
         	        });
         	        request.always(function () {
         	            $inputs.prop("disabled", false);
         	        });
         	        event.preventDefault();
         		});

                //Submit do formulário de cadastro.
        		$('#formulario_cadastrar').submit(function(event) {
        			//Limpa as mensagens de erro
        			$('#messages').removeClass('alert alert-success').empty();
        			$('#messages').removeClass('alert alert-block alert-danger').empty();
        		    var $form = $('#formulario_cadastrar');
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
	</body>
</html>