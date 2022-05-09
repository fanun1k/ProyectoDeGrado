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
				<div class="col-xs-12" >
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
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-6">
							<h3 class="header smaller lighter inverse">Tiempos de Comida</h3>
							<div class="widget-box">
								<div class="widget-body">
									<div class="widget-main">
										<?php 
											$cont=1;
											foreach ($data as $value) {
											?>
											<div class="checkbox">
												<label>
													<input name="foodTime[]" value="<?php echo $value["foodTimesId"]; ?>" type="checkbox" class="ace" />
													<span class="lbl"> <?php echo $value["foodTimesName"]; ?></span>
												</label>
											</div>
										<?php
											$cont++;
											}
										?>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoUXfTkBg00OwY-cuCpa-HWkYwBL9dhLA&callback=initMap"></script>
<script type="text/javascript">
	// Initialize and add the map
	function initMap() {
		// The location of Uluru
		const uluru = { lat: -25.344, lng: 131.031 };
		// The map, centered at Uluru
		const map = new google.maps.Map(document.getElementById("googleMap"), {
			zoom: 4,
			center: uluru,
		});
		// The marker, positioned at Uluru
		const marker = new google.maps.Marker({
			position: uluru,
			map: map,
		});
	}
</script>