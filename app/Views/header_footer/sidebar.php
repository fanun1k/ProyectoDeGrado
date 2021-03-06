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
		<!-- Contabilidad -->
		<li class="">
			<?php foreach ($userAccessArray as $access) {
				if ($access->accessId == 1) $hasAccess = TRUE;
			} ?>
			<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) echo 'style="cursor:not-allowed;"'; ?>>
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text">Contabilidad</span>
				<?php if ($hasAccess) { ?> <b class="arrow fa fa-angle-down"></b>
				<?php } else { ?> <b class="arrow fa fa-lock"></b> <?php } ?>
			</a>
			<?php if ($hasAccess) { ?>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="<?php echo base_url('/contabilidad/caja_chica'); ?>">
							<i class="menu-icon fa fa-caret-right"></i>Caja Chica
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>Costos
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('/contabilidad/costos_fijos'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>Costos Fijos
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('/contabilidad/costos_variables'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>Costos Variables
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
						<a href="<?php echo base_url('/aprovisionamiento/proveedores/lista_proveedores') ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Proveedores
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url("aprovisionamiento/productos") ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Productos
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							<span class="menu-text">
								Pedidos
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('/aprovisionamiento/pedidos/pedido_productos') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pedido de Productos
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url('/aprovisionamiento/pedidos/pedido_insumos') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pedido de Insumos
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="treeview.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Entrada de mercancías
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
										Agregar Nuevo Comedor
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
								Clientes
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('/gestion_proyectos/gestion_de_clientes/lista_de_clientes'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Gestionar Clientes
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
									Insumos
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
		</li>

	</ul>
	<li class="">
		<?php foreach ($userAccessArray as $access) {
					if ($access->accessId == 2) {
						$hasAccess = true;
					}
				} ?>
		<a href="#" class="dropdown-toggle" <?php if (!$hasAccess) {
												echo 'style="cursor:not-allowed;"';
											} ?>>
			<i class=" menu-icon fa fa-money "></i>
			<span class="menu-text">Ventas</span>
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
					<a href="<?php echo base_url("ventas/realizar_venta") ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Realizar Venta
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo base_url("/ventas/anular_ventas") ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Anular Ventas
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
	<?php }
				$hasAccess = false;
			} ?>
	</li>

	</ul><!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>