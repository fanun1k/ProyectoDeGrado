<div class="main-content">
  	<div class="main-content-inner">
    	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
      	<ul class="breadcrumb">
        	<li>
          		<i class="ace-icon fa fa-home home-icon"></i>
				<a href="<?php echo base_url(); ?>/inicio">Inicio</a>
        	</li>
        	<li>
          		<a>Gestión de Proyectos</a>
        	</li>
        	<li>
          		<a>Gestión de Comedores</a>
        	</li>
        	<li class="active">Tabla de Comedores</li>
      	</ul>
      	<!-- /.breadcrumb -->
      	<!-- /.nav-search -->
    </div>

	<div class="page-content">
		<div class="page-header">
			<h1>
				Tabla de Comedores
			</h1>
		</div>
		<!-- /.page-header -->
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-sm-8 col-xs-12 clearfix">
						<h4 class="pink">
						<i class="ace-icon glyphicon-plus icon-animated-hand-pointer blue"></i>
						<a href="<?php echo base_url(); ?>/gestion_proyectos/gestion_comedores/comedor" role="button" class="green" data-toggle="modal"> Agregar Nuevo Comedor </a>
						</h4>
					</div>
					<div class="col-sm-4 col-xs-12 clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
				</div>
				<div class="table-header">
					Comedores Registrados
				</div>

				<!-- div.table-responsive -->

				<!-- div.dataTables_borderWrap -->
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Nombre</th>
								<th class="collapse">Empresa</th>
								<th>Media Calórica</th>
								<th>Fecha Registro</th>
								<th>Fecha Actualización</th>
								<th>Acciones</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$index = 1;
								foreach($data as $value) { ?>

									<tr>
										<td class="center"><?php echo $index; ?></td>
										<td><?php echo $value['diningAreaName']; ?></td>
										<td class="collapse"><?php echo $value['companyId']; ?></td>
										<td><?php echo $value['averageCalorie']; ?></td>
										<td><?php echo $value['createDate']; ?></td>
										<td>
											<?php 
												if($value['lastUpdate'] == null) {
													echo 'Sin fecha';
												}; 
											?>
										</td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												<a class="green" href="#">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>

												<a class="red" href="#">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
												</a>
											</div>

											<div class="hidden-md hidden-lg">
												<div class="inline pos-rel">
													<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
														
														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>

								<?php
								$index++;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

      