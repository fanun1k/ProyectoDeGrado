<?php $hasAccess = FALSE; ?>
<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<span>Módulos</span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 1) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text">Contabilidad</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							Layouts
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="top-menu.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Top Menu
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="two-menu-1.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Two Menus 1
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="treeview.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Treeview
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="jquery-ui.html">
							<i class="menu-icon fa fa-caret-right"></i>
							jQuery UI
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>

		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 2) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class=" menu-icon fa fa-money "></i>
				<span class="menu-text">Finanzas</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="tables.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Simple &amp; Dynamic
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="jqgrid.html">
							<i class="menu-icon fa fa-caret-right"></i>
							jqGrid plugin
						</a>
						<b class="arrow"></b>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>

		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 3) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-archive"></i>
				<span class="menu-text">Cadena de Suministro</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">

					<li class="">
						<a href="form-elements-2.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Form Elements 2
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="dropzone.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Dropzone File Upload
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>

		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 4) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-truck"></i>
				<span class="menu-text">Aprovisionamiento</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">

					<li class="">
						<a href="buttons.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Buttons &amp; Icons
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="content-slider.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Content Sliders
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="treeview.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Treeview
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>

		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 5) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text">Recursos Humanos</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">

					<li class="">
						<a href="<?php echo base_url('/recursos_humanos/personal_de_trabajo') ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Personal de trabajo
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Perfiles del Personal
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('/recursos_humanos/nuevo_perfil') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Nuevo Perfil
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="jquery-ui.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Visualizar Perfiles
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Planillas
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="jquery-ui.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Horas Trabajadas
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('recursos_humanos/planillas/permisos_vacaciones') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Permisos / Vacaciones
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('recursos_humanos/planillas/memorandum') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Memorándums
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>

		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 6) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-tasks"></i>
				<span class="menu-text">Gestión de Proyectos</span>
				<?php if ($hasAccess) { ?>
					<b class="arrow fa fa-angle-down"></b>
				<?php } else { ?>
					<b class="arrow fa fa-lock"></b>
				<?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Gestión Comedores
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('gestion_proyectos/gestion_comedores/visualizar_comedores'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Visualizar Comedores
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('gestion_proyectos/gestion_comedores/comedor'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text">
										Agregar Nuevo
									</span>
									<span class="menu-text" style="padding-left: 12px;">
										Comedor
									</span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Gestión Clientes
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('/gestion_proyectos/gestion_de_clientes/lista_de_clientes'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Visualizar Clientes
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('gestion_proyectos/gestion_comedores/comedor'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text">
										Agregar Nuevo
									</span>
									<span class="menu-text" style="padding-left: 12px;">
										Cliente
									</span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							Gestión Nutricional
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('gestion_nutricional/tabla_nutricional') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Visualizar Insumos (Tabla Nutricional)
								</a>

								<b class="arrow"></b>
							</li>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Plan Alimenticio
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Platos
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buttons.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Menús
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul>
			<?php }
			$hasAccess = FALSE; ?>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>