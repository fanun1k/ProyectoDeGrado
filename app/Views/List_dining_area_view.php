<div class="main-content">
  	<div class="main-content-inner">
    	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
      		<ul class="breadcrumb">
        		<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Gestión de Proyectos</a>
				</li>
				<li>
					<a href="#">Visualizar Comedores</a>
				</li>
      		</ul>
      	<!-- /.breadcrumb -->
      	<!-- /.nav-search -->
    	</div>

    	<div class="page-content">
			<div class="page-header">
				<h1>
					Visualizar Comedores
				</h1>
			</div>
      		<!-- /.page-header -->

      		<div class="row">
				<div class="col-xs-12">
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
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
									<th>Media Calórica</th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Fecha de Registro
									</th>
									<th>Acciones</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$index=0;
									foreach($data as $value) { ?>
										<tr>
											<td class="center"><?php echo $index; ?></td>
											<td><?php echo $value["diningAreaName"]; ?></td>
											<td><?php echo $value["averageCalorie"]; ?></td>
											<td><?php echo $value["createDate"]; ?></td>
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
																<a href="#" class="tooltip-success" data-rel="tooltip" title="Editar">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar">
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
        	<!-- /.col -->
      	</div>
      	<!-- /.row -->
    </div>
    <!-- /.page-content -->
</div>
<!-- /.main-content -->