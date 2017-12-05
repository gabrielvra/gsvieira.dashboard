<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="active">
			<a href="<?php echo base_url();?>">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Painel de Controle </span>
			</a>
			<b class="arrow"></b>
		</li>
		<?php //if($this->permission->checkPermission($this->session->userdata('permissao'),'vCadastro')){?>
		<li class="<?php if (isset($menuCadastro)){echo 'active';};?>">
			<a href="" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text">
					Cadastro
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url()?>pessoa">
						<i class="menu-icon fa fa-users"></i>
						Pessoa
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo base_url()?>objeto">
						<i class="menu-icon fa fa-bars"></i>
						Objeto
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<?php //} ?>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Movimentos </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>
			
			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url()?>lancamento">
						<i class="menu-icon fa fa-users"></i>
						Lançamentos
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-cogs"></i>
				<span class="menu-text"> Administrativo </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo base_url()?>usuario">
						<i class="menu-icon fa fa-users"></i>
						Usuários
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo base_url()?>usuariogrupo">
						<i class="menu-icon fa fa-users"></i>
						Perfil de usuário
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="<?php echo base_url()?>sobre">
				<i class="menu-icon fa fa-info-circle"></i>
				<span class="menu-text"> Sobre </span>
			</a>
			<b class="arrow"></b>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>