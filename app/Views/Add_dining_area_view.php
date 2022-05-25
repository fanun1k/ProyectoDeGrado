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
				<li class="active">Agregar Nuevo Comedor</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					Agregar Nuevo Comedor
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12 col-lg-6">
							<h3 class="header smaller lighter inverse">Información del Comedor</h3>
							<div class="widget-box">
								<div class="widget-body">
									<div class="widget-main">
										<!-- FORM BEGINS -->
										<form class="form-horizontal" role="form" method="POST" action="comedor/registrar_comedor">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
												<div class="col-sm-9">
													<input type="text" id="form-field-1" name="diningAreaName" placeholder="Nombre del Comedor" class="col-xs-10 col-sm-5" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Calórica: </label>
												<div class="col-sm-9">
													<input type="text" id="form-field-1" name="averageCalorie" placeholder="Media Calórica" class="col-xs-5 col-sm-3" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ubicación: </label>
												<div class="col-sm-9">
													<div id="googleMap" style="width:100%;height:250px;"></div>
												</div>
												<div id="marker" class="collapse"></div>
											</div>
											<div class="form-group collapse">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lat: </label>
												<div class="col-sm-9">
													<input type="text" id="lat" name="lat" placeholder="Media Calórica" class="col-xs-5 col-sm-3" />
												</div>
											</div>
											<div class="form-group collapse">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lng: </label>
												<div class="col-sm-9">
													<input type="text" id="lng" name="lng" placeholder="Media Calórica" class="col-xs-5 col-sm-3" />
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-6">
							<h3 class="header smaller lighter inverse">Tiempos de Comida</h3>
							<div class="widget-box">
								<div class="widget-body">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#faq-tab-1">
													<i class="green ace-icon fa fa-check-square-o bigger-120"></i>
													Seleccionar
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#faq-tab-2">
													<i class="green ace-icon fa fa-pencil-square-o bigger-120"></i>
													Editar
												</a>
											</li>
										</ul>

										<div class="tab-content no-border" style="height: 355px;">
											<div id="faq-tab-1" class="tab-pane fade in active">
												<h4 class="blue">													
													<div class="widget-main">
														<?php
														foreach ($data as $value) {
														?>
															<div class="row">
																<div class="col-xs-12 col-lg-6">
																	<div class="checkbox">
																		<label>
																			<input name="foodTime[]" id="<?php echo $value["foodTimesId"]; ?>" value="<?php echo $value["foodTimesId"]; ?>" type="checkbox" class="ace" />
																			<span class="lbl"> <?php echo $value["foodTimesName"]; ?></span>
																		</label>
																	</div>
																	<input name="startTime[]" type="time" />
																	<input name="endTime[]" type="time" />
																</div>
															</div>
														<?php
														}
														?>
													</div>
												</h4>
											</div>

											<div id="faq-tab-2" class="tab-pane fade">
												<h4 class="blue">
													
												</h4>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="clearfix form-actions">
									<div class="col-xs-12 center">
										<button class="btn btn-info" type="submit" style="width: 250px;">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
						</div>
						</form>
						<!-- FORM ENDS -->
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
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->
<!--[if !IE]> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoUXfTkBg00OwY-cuCpa-HWkYwBL9dhLA&callback=initMap"></script>
<script type="text/javascript">
	var marker;

	function initMap() {
		const city = {
			lat: -17.3843238,
			lng: -66.1498131
		};
		const map = new google.maps.Map(document.getElementById("googleMap"), {
			zoom: 11,
			center: city,
		});

		// This event listener calls addMarker() when the map is clicked.
		google.maps.event.addListener(map, "click", (event) => {
			addMarker(event.latLng, map);
		});
	}

	// Adds a marker to the map.
	function addMarker(location, map) {
		if (!marker || !marker.setPosition) {
			marker = new google.maps.Marker({
				position: location,
				map: map,
			});
		} else {
			marker.setPosition(location, map);
		}
		document.getElementById("lat").value = location.lat();
		document.getElementById("lng").value = location.lng();
	}
</script>

<script src="<?php echo base_url() . '/assets/' ?>/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . '/assets/' ?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url() . '/assets/' ?>/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/chosen.jquery.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url() . '/assets/' ?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/ace.min.js"></script>
<script src="assets/js/jquery.jqGrid.min.js"></script>
<script src="assets/js/grid.locale-en.js"></script>
<!-- inline scripts related to this page -->
</body>

</html>