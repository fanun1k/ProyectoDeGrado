<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li class="active">
					<i class="ace-icon fa fa-home home-icon"></i>
					Inicio
				</li>
                <li>
					<a href="#">Aprovisionamiento y Cadena de Suministro</a>
				</li>
				<li>
					<a href="#">Pedidos</a>
				</li>
				<li>
					<a href="#">Pedido de Productos</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="page-header">
                        <h1>
                            Nueva Orden de Pedido de Productos
                        </h1>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="smaller">
										Detalles de la Orden de Pedido
									</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<div class="row">
											<div class="col-md-4">
												<div>
													<label for="id-date-picker-1">Fecha</label>
													<div class="input-group">
														<input class="form-control date-picker" id="id-date-picker-1" type="text" value="<?php echo date('Y-m-d'); ?>" readonly data-date-format="dd-mm-yyyy" />
														<span class="input-group-addon">
															<i class="fa fa-calendar bigger-110"></i>
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div>
													<label for="form-field-8">N° de Pedido</label>

													<input class="form-control" id="form-field-8" placeholder="N° de Pedido" value="1" readonly/>
												</div>
											</div>
											<div class="col-md-4">
												<div>
													<label for="form-field-8">Estado</label>

													<input class="form-control" id="form-field-8" placeholder="Estado"  value="Pendiente" readonly/>
												</div>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-md-3">
												<label for="selectProduct">Productos</label>
												<select class="chosen-select form-control" id="selectProduct" data-placeholder="Seleccionar producto.." onchange="productPrice()">
													<option value="">  </option>
													<?php foreach($dataProducts as $value){ ?>
													<option value="<?php $value['productId']; ?>"><?php echo $value['productName']; ?></option>
													<?php }  ;
													
													?>
												</select>
											</div>
											<div class="col-md-3">
												<label for="form-field-select-3">Proveedor</label>
												<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Seleccionar proveedor...">
													<option value="">  </option>
													<?php foreach($dataSuppliers as $value){ ?>
													<option value="<?php $data['supplierId']; ?>">
														<?php 
															if($value['legalEntityName']!=null){
																echo $value['legalEntityName'];
															}
															elseif($value['name']!=null)
																echo $value['name']." ".$value['lastName1']." ".$value['lastName2']; 
                                                    	?>
													</option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-2">
												<label for="form-field-8">Cantidad</label>
												<input class="form-control" type="number" id="form-field-8" placeholder="Cantidad"/>
											</div>
											<div class="col-md-2">
												<label for="form-field-8">Unidad de Medida</label>
												<select id="form-field-8" class="form-control">
													<option value="" selected disabled>Seleccionar unidad de medida</option>
													<option value="1">Litro</option>
													<option value="2">Kg</option>
												</select>
											</div>
											<div class="col-md-2">
												<label for="productPrice">Costo</label>
												<input class="form-control" type="text" id="productPrice" placeholder="Costo"/>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12 text-right">
												<button class="btn btn-primary">Añadir</button>
											</div>	
										</div>
									</div>
								</div>
								
							</div>
						</div><!-- /.col -->
					</div>
					<br>
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Unidad de Medida</th>
										<th>Total Bs.</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td class="center">
											1
										</td>
										<td>Coca Cola</td>
										<td>20</td>
										<td class="hidden-480">Litros</td>
										<td class="hidden-480">
											450
										</td>

										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Ace</span>
				Application &copy; 2013-2014
			</span>

			&nbsp; &nbsp;
			<span class="action-buttons">
				<a href="https://www.youtube.com/c/Irizam">
					<i class="ace-icon fa fa-youtube-square red bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
				</a>
			</span>
		</div>
	</div>
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div>
<!--[if !IE]> -->
<script src="<?php echo base_url().'/assets/'?>/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url().'/assets/'?>/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url().'/assets/'?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url().'/assets/'?>/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.print.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/bootstrap-datepicker.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url().'/assets/'?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/ace.min.js"></script>

<script src="<?php echo base_url()?>/js/order-js/orderProduct.js"></script>