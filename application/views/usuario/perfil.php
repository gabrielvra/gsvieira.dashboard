<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.gritter.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-editable.min.css" />

<div class="hr dotted"></div>
<div>
	<div id="user-profile-1" class="user-profile row">
		<div class="col-xs-12 col-sm-3 center">
			<div>
				<span class="profile-picture">
				
					<img id="avatar" class="editable img-responsive" alt="" src="<?php echo isset($page_data->ds_avatar) ? base_url().$page_data->ds_avatar : base_url()."assets/images/avatars/user.jpg";?>" />
				</span>

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
						<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
							<i class="ace-icon fa fa-circle light-green"></i>
							&nbsp;
							<span class="white"><?php echo $page_data->ds_login?></span>
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="col-xs-12 col-sm-9">
			<div class="space-12"></div>

			<div class="profile-user-info profile-user-info-striped">
			    <input type="hidden" name="id_registro" id="id_registro" value="<?php echo isset($page_data->id) ? $page_data->id : '' ?>" />
				<div class="profile-info-row">
					<div class="profile-info-name"> Nome: </div>

					<div class="profile-info-value">
						<span class="editable" id="username"><?php echo isset($page_data->ds_nome) ? $page_data->ds_nome : ''?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> Telefone: </div>

					<div class="profile-info-value">
						<span class="editable" id="username1"><?php echo isset($page_data->nr_telefone) ? $page_data->nr_telefone : ''?></span>
					</div>
				</div>
				<div class="profile-info-row">
					<div class="profile-info-name"> Criação: </div>

					<div class="profile-info-value">
						<span class="editable" id="signup"><?php echo isset($page_data->dt_criacao) ? $page_data->dt_criacao : ''?></span>
					</div>
				</div>
			</div>

			<div class="hr hr2 hr-double"></div>

			<div class="space-6"></div>
		</div>
	</div>
</div>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/spinbox.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-editable.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//text editable
			    $('#username')
				.editable({
					type: 'text',
					name: 'username'		
			    });
			
				//text editable
			    $('#username1')
				.editable({
					type: 'text',
					name: 'username'		
			    });
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
			
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						//onblur: 'ignore',  //don't reset or hide editable onblur?!
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Escolha uma imagem',
							droppable: true,
							maxSize: 110000,//~100Kb
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'Arquivo não é uma imagem!',
										text: 'Formatos aceitos: jpg|gif|png',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'Arquivo muito grande',
										text: 'Escolha imagem até 100Kb',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {
									
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
					    	//please modify submit_url accordingly
					    	var submit_url = "<?php echo site_url('Usuario/uploadImageFile')?>";
					    	var deferred;

					    	//if value is empty, means no valid files were selected
					    	//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
					    	//so we return just here to prevent problems
					    	var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
					    	if(!value || value.length == 0) {
					    		deferred = new $.Deferred
					    		deferred.resolve();
					    		return deferred.promise();
					    	}

					    	var $form = $('#avatar').next().find('.editableform:eq(0)')
					    	var file_input = $form.find('input[type=file]:eq(0)');

					    	//user iframe for older browsers that don't support file upload via FormData & Ajax
					    	if( !("FormData" in window) ) {
					    		deferred = new $.Deferred

					    		var iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
					    		$form.after('<iframe id="'+iframe_id+'" name="'+iframe_id+'" frameborder="0" width="0" height="0" src="about:blank" style="position:absolute;z-index:-1;"></iframe>');
					    		$form.append('<input type="hidden" name="temporary-iframe-id" value="'+iframe_id+'" />');
					    		$form.next().data('deferrer' , deferred);//save the deferred object to the iframe
					    		$form.attr({'method' : 'POST', 'enctype' : 'multipart/form-data',
					    					'target':iframe_id, 'action':submit_url});

					    		$form.get(0).submit();

					    		//if we don't receive the response after 60 seconds, declare it as failed!
					    		setTimeout(function(){
					    			var iframe = document.getElementById(iframe_id);
					    			if(iframe != null) {
					    				iframe.src = "about:blank";
					    				$(iframe).remove();
					    				
					    				deferred.reject({'status':'fail','message':'Timeout!'});
					    			}
					    		} , 60000);
					    	}
					    	else {
					    		var fd = null;
					    		try {
					    			fd = new FormData($form.get(0));
					    		} catch(e) {
					    			//IE10 throws "SCRIPT5: Access is denied" exception,
					    			//so we need to add the key/value pairs one by one
					    			fd = new FormData();
					    			$.each($form.serializeArray(), function(index, item) {
					    				fd.append(item.name, item.value);
					    			});
					    			//and then add files because files are not included in serializeArray()'s result
					    			$form.find('input[type=file]').each(function(){
					    				if(this.files.length > 0) fd.append(this.getAttribute('name'), this.files[0]);
					    			});
					    		}					    		
					    		//if file has been drag&dropped , append it to FormData
					    		if(file_input.data('ace_input_method') == 'drop') {
					    			var files = file_input.data('ace_input_files');
					    			if(files && files.length > 0) {
					    				fd.append(file_input.attr('name'), files[0]);
					    			}
					    		}
					    		fd.append('id_registro', $('#id_registro').val());
					    		deferred = $.ajax({
					    			url: submit_url,
					    			type: 'POST',
					    			processData: false,
					    			contentType: false,
					    			dataType: 'json',
					    			data: fd,
					    			xhr: function() {
					    				var req = $.ajaxSettings.xhr();
					    				return req;
					    			},
					    			beforeSend : function() {
						    			
					    			},
					    			success : function() {
						    			
					    			}
					    		})
					    	}
					    	deferred.done(function(res){
					    		if(res.status == 'OK') $('#avatar').get(0).src = res.url;
					    		else alert(res.message);
					    	}).fail(function(res){
					    		alert("Failure");
					    	});
					    	return deferred.promise();
						},
						success: function(response, newValue) {
						}
					})
				} catch(e) {}
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal fade">\
					  <div class="modal-dialog">\
					   <div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						 <div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						 </div>\
						\
						 <div class="modal-footer center">\
							<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
							<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
						 </div>\
						</form>\
					  </div>\
					 </div>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg', 'png', 'gif'],
						allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});			
			
				//////////////////////////////
				$('#profile-feed-1').ace_scroll({
					height: '250px',
					mouseWheelLock: true,
					alwaysVisible : true
				});
			
				$('a[ data-original-title]').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
			  
				///////////////////////////////////////////
			
				//right & left position
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function(e) {
					e.preventDefault();
				});
			
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
			
			
			
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			});
		</script>
