<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="menu-icon fa fa-users"></i>
			Usuários
			<div class="pull-right"> 
				<a href="<?php echo base_url();?>usuario/view" class="btn btn-block btn-white btn-info btn-round"><i class="ace-icon fa fa-plus green"></i>Adicionar</a>
			</div>
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Código</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Login</th>
						<th>Telefone</th>
						<th>Situação</th>						
						<th>Ações</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- MODAL DE EXCLUSÃO DE REGISTRO -->
<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Confirmar</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						<p>Confirma a exclusão do usuário? </p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="id_registro_excluir" value="">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i> Cancelar
				</button>
				<button id="excluir_registro" class="btn btn-sm btn-primary" data-dismiss="modal">
					<i class="ace-icon fa fa-check"></i> Confirmar
				</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url();?>assets/js/date-format.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
jQuery(function($) {
	//initiate dataTables plugin
	var myTable = 
	$('#dynamic-table')
	.DataTable( {
		bAutoWidth: false,
		"columnDefs": [{
                "targets": [0],
                "visible": false,
                "searchable": false
            }
        ],
		"aoColumns": [null, null, null, null, null, null,
			{"mRender": function(data, type, full) {
    				if (full[6] == '0'){
    					return '<span class="label label-sm label-warning">Inativo</span>';
    				} else {
    					return '<span class="label label-sm label-success">Ativo</span>';
    				}
    			}
			}, 
			{"bSortable": false,
    			"mRender": function(data, type, full) {
    				return '<div class="hidden-sm hidden-xs action-buttons"><a class="blue" href=usuario/view/'+ full[0] +'><i class="ace-icon fa fa-search-plus bigger-130"></i></a>'+
    				'<a class="red" href="#modal-form" id_registro_excluir="'+ full[0] +'" data-toggle="modal"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></div>' + 
    				'<div class="hidden-md hidden-lg">'+ 
    					'<div class="inline pos-rel">'+
    						'<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>'+
    						'<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">'+
    						'<li><a href=usuario/view/'+ full[0] +' class="tooltip-info" data-rel="tooltip" title="View"><span class="blue"><i class="ace-icon fa fa-search-plus bigger-120"></i></span></a></li>'+
    						'<li><a href="#modal-form" class="tooltip-error" data-rel="tooltip" id_registro_excluir="'+ full[0] +'" data-toggle="modal" title="Delete"><span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li>'+
    						'</ul>'+
    					'</div>'+
    				'</div>'
    			  }
		  }],
		"aaSorting": [],
		"language": {
			  "url": "assets/language/dataTable.portugues.lang"
		},
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('usuario/getData')?>",
            "type": "POST",
            error: function (response, textStatus, jqXHR) {
        		$('#messages').removeClass('alert alert-success').empty();
        		$('#messages').removeClass('alert alert-block alert-danger').empty();
	        	$('#messages').addClass('alert alert-block alert-danger')
        		.append('<p> Ocorreu um erro ao acessar o banco de dados. </p>');
            }
        },

    });	
	
	setTimeout(function() {
		$($('.tableTools-container')).find('a.dt-button').each(function() {
			var div = $(this).find(' > div').first();
			if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
			else $(this).tooltip({container: 'body', title: $(this).text()});
		});
	}, 500);

	/********************************/
	//add tooltip for small view action buttons in dropdown menu
	$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
	
	//tooltip placement on right or left
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('table')
		var off1 = $parent.offset();
		var w1 = $parent.width();
		var off2 = $source.offset();
		if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
		return 'left';
	}
		
	$('.show-details-btn').on('click', function(e) {
		e.preventDefault();
		$(this).closest('tr').next().toggleClass('open');
		$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
	});
	//Adiciona o identificador do registro no modal para excluir
    $(document).on('click', 'a', function (event) {
        var id = $(this).attr('id_registro_excluir');
        $('#id_registro_excluir').val(id);
    });
    //Excluir o registro por ajax
	$("button#excluir_registro").click(function(event) {
		//Limpa as mensagens de erro
		$('#messages').removeClass('alert alert-success').empty();
		$('#messages').removeClass('alert alert-block alert-danger').empty();
	    var $form = $('#id_registro_excluir').val();
        request = $.ajax({
            url: "<?php echo base_url(); ?>usuario/delete",
            type: "post",
            dataType: 'json',
            data: 'id='+$form
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
	        	$('#dynamic-table').each(function() {
	        	    dt = $(this).dataTable();
	        	    dt.fnDraw();
	        	})
			}					
        });
        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Ocorreu um erro ao salvar os registros: " + textStatus, errorThrown);
        });
        event.preventDefault();
	});

})
</script>