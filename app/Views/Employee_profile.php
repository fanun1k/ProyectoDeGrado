<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li class="active">
					<i class="ace-icon fa fa-home home-icon"></i>
					Inicio
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="page-header">
						<?php foreach ($employeeInfoArray->getResult() as $row) { ?>
						<h1 id="employeeProfileTitle">Cuenta de <?php echo $row->name." ".$row->lastName1.(($row->lastName2 != null)?" ".$row->lastName2:""); ?></h1>
						<?php } ?>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-5">
					<div class="alert alert-success no-margin alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
						<i class="ace-icon fa fa-info bigger-120 blue"></i>&nbsp;
						Haga doble clic en la imagen de abajo o clic en los campos de perfil para editarlos...
					</div>

					<div class="space-4"></div>

					<div class=" center">
						<?php foreach ($employeeInfoArray->getResult() as $row) { ?>
						<span id="profile-picture" class="profile-picture" style="width: 300; height: 300;" ondblclick="changeAvatar()">
							<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="<?php echo base_url(); ?>/images/employee-images/<?php echo $row->encryptedEmployeeId; ?>.png" width="300" height="300" />
						</span>
						<?php } ?>

						<div class="space-2"></div>

						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<i class="ace-icon fa fa-circle light-green"></i>
									&nbsp;
									<span class="white">RIZ2019403</span>
								</a>
								<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
									<li class="dropdown-header"> Change Status </li>
									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle green"></i><span class="green">&nbsp;Available</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle red"></i><span class="red">&nbsp;Busy</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle grey"></i><span class="grey">&nbsp;Invisible</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="space-4"></div>
					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-users orange"></i>Datos Personales</h4>
						</div>
						<?php foreach ($employeeInfoArray->getResult() as $row) { ?>
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name">Nombre</div>
								<div class="profile-info-value">
									<i class="fa fa-user light-orange bigger-110"></i>
									<span class="editable" id="name1"><?php echo $row->name; ?></span>
									<span class="editable" id="lastName1"><?php echo $row->lastName1; ?></span>
									<span class="editable" id="lastName2"><?php echo $row->lastName2; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Número de Celular</div>
								<div class="profile-info-value">
									<i class="fa fa-phone light-orange bigger-110"></i>
									<span class="editable" id="phoneNumber1"><?php echo $row->employeePhoneNumber; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Carnet de Identidad</div>
								<div class="profile-info-value">
									<i class="fa fa-id-card light-orange bigger-110"></i>
									<span class="editable" id="employeeId1"><?php echo $row->employeeCI; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Género</div>
								<div class="profile-info-value">
									<i class="fa fa-venus-mars light-orange bigger-110"></i>
									<span class="editable" id="employeeGender1">
										<?php $employeeGenderText = ($row->employeeGender == "M") ? "Masculino" : "Femenino";
										echo $employeeGenderText; ?>
									</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Fecha de Nacimiento</div>
								<div class="profile-info-value">
									<i class="fa fa-birthday-cake light-orange bigger-110"></i>
									<span class="editable" id="employeeDateOfBirth1"><?php echo date("d/m/Y", strtotime($row->employeeDateOfBirth)); ?></span>
								</div>
							</div>
							<div class="profile-info-row"><div class="profile-info-name" style="width:150px; height:1px; visibility:hidden;"></div></div>
						</div>
						<?php } ?>
					</div>

					<div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-rss orange"></i>Actividades recientes</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-8">
								<div id="profile-feed-1" class="profile-feed">
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>Rodrigo Iriarte Zamorano entró al trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 04/07/22 (9:00)
											</div>
										</div>
									</div>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>Rodrigo Iriarte Zamorano salió del trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 03/07/22 (17:00)
											</div>
										</div>
									</div>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>Rodrigo Iriarte Zamorano entró al trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 03/07/22 (9:00)
											</div>
										</div>
									</div>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>Rodrigo Iriarte Zamorano entró al trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 04/07/22 (9:00)
											</div>
										</div>
									</div>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>Rodrigo Iriarte Zamorano salió del trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 03/07/22 (17:00)
											</div>
										</div>
									</div>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>Rodrigo Iriarte Zamorano entró al trabajo.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i> 03/07/22 (9:00)
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="space-4"></div>
				</div>
				<div class="col-xs-12 col-sm-7">

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-map orange"></i>Dirección (Haga doble clic para cambiar la dirección del empleado)</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-8">
								<?php foreach ($employeeInfoArray->getResult() as $row) { ?>
								<div id="googleMap" style="height: 300px;"></div>
								<div id="marker" class="collapse"></div>
								<input type="text" id="lat" name="lat" class="col-xs-5 col-sm-3 collapse" value="<?php echo $row->employeeLatitude; ?>"/>
								<input type="text" id="lng" name="lng" class="col-xs-5 col-sm-3 collapse" value="<?php echo $row->employeeLongitude; ?>"/>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-file orange"></i>Documentos</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-8">
							</div>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-book orange"></i>Habilidades</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-8">
							</div>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-calendar orange"></i>Horario de Trabajo</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-8">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">Ace</span> Application &copy; 2013-2014
            </span> &nbsp; &nbsp;
            <span class="action-buttons">
                <a href="https://www.youtube.com/c/Irizam"><i class="ace-icon fa fa-youtube-square red bigger-150"></i></a>
                <a href="#"> <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> </a>
                <a href="#"> <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i> </a>
                <a href="#"> <i class="ace-icon fa fa-rss-square orange bigger-150"></i> </a>
            </span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!--[if !IE]> -->
<script src="<?php echo base_url()?>/assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url()?>/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/bootbox.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.hotkeys.index.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/select2.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/spinbox.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace-editable.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.maskedinput.min.js"></script>

<!-- google maps api -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoUXfTkBg00OwY-cuCpa-HWkYwBL9dhLA&callback=initMap"></script>

<!-- webcam script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url()?>/assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	var marker;
	var lat = parseFloat(document.getElementById('lat').value);
	var lng = parseFloat(document.getElementById('lng').value);
	var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();

	function initMap() {
		document.getElementById('lat').remove();
		document.getElementById('lng').remove();

		const city = { lat: lat, lng: lng };
		const map = new google.maps.Map(document.getElementById("googleMap"), { zoom: 11, center: city, scrollwheel: true, disableDoubleClickZoom: true });

		// This event listener calls addMarker() when the map is clicked.
		google.maps.event.addListener(map, "dblclick", (event) => { addMarker(event.latLng, map); });

		marker = new google.maps.Marker({ position: city, map });
	}

	// Adds a marker to the map.
	function addMarker(location, map) {
		if (!marker || !marker.setPosition) marker = new google.maps.Marker({ position: location, map: map });
		else marker.setPosition(location, map);
		lat = location.lat();
		lng = location.lng();
		$.ajax({
			url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_direccion'); ?>",
			type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "employeeLatitude": lat, "employeeLongitude": lng},
			success : function(data) {}, error : function(jqXHR, textStatus, errorThrown) {}
		});
	}
	
	jQuery(function($) {
		$.fn.editable.defaults.mode = 'inline';
		$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
		$.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+'<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
		
		$('#name1').editable({type: 'text', name: 'name1',
			validate: function(value) {
				var employeeName = value.trim().replace(/\s\s+/g, ' ');
				if(employeeName.length == 0 || employeeName.length > 60 || /\d/.test(employeeName) || !/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(employeeName)) return 'Por favor ingrese un nombre';
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var employeeName = value.trim().replace(/\s\s+/g, ' ');
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_nombre'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "name": employeeName},
					success : function(data) { $("#name1").text(employeeName); }, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#lastName1').editable({type: 'text', name: 'lastName1',
			validate: function(value) {
				var employeeLastName1 = value.trim().replace(/\s\s+/g, ' ');
				if(employeeLastName1.length == 0 || employeeLastName1.length > 60 || /\d/.test(employeeLastName1) || !/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(employeeLastName1)) return 'Por favor ingrese un apellido válido';
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var employeeLastName1 = value.trim().replace(/\s\s+/g, ' ');
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_primer_apellido'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "lastName1": employeeLastName1},
					success : function(data) { $("#lastName1").text(employeeLastName1); }, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#lastName2').editable({type: 'text', name: 'lastName2', emptytext: '[No hay segundo apellido]',
			validate: function(value) {
				var employeeLastName2 = value.trim().replace(/\s\s+/g, ' ');
				if(employeeLastName2.length > 0 && (employeeLastName2.length > 60 || /\d/.test(employeeLastName2))) return 'Por favor ingrese un apellido válido';
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var employeeLastName2 = value.trim().replace(/\s\s+/g, ' ');
				if(employeeLastName2.length == 0) employeeLastName2 = null;
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_segundo_apellido'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "lastName2": employeeLastName2},
					success : function(data) { if(employeeLastName2.length > 0) $("#lastName2").text(employeeLastName2); }, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#phoneNumber1').editable({type: 'text', name: 'phoneNumber1',
			validate: function(value) {
				var phoneNumber1 = value.trim().replace(/\s\s+/g, ' ');
				if(phoneNumber1.length > 8 || phoneNumber1.length < 7 || isNaN(phoneNumber1)) return 'Por favor ingrese un número de teléfono válido';
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var phoneNumber1 = value.trim().replace(/\s\s+/g, ' ');
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_numero_telefonico'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "employeePhoneNumber": phoneNumber1},
					success : function(data) { $("#phoneNumber1").text(phoneNumber1); }, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#employeeId1').editable({type: 'text', name: 'employeeId1',
			validate: function(value) {
				var employeeCI1 = value.trim().replace(/\s\s+/g, ' ');
				if(employeeCI1.length < 6 || employeeCI1.length > 12)
					return 'Por favor introduzca un carnet de identidad válido';
				if(isNaN(employeeCI1)){
					var isNumber = false, error = false;
					for (var i = 0; i < employeeCI1.length; i++) {
						if(!isNaN(employeeCI1.charAt(i))) isNumber = true;
						else {
							if(i == 0 && employeeCI1.substring(0, 2) != "E-") error = true;
							if(isNumber && i + 1 < employeeCI1.length) if(!isNaN(employeeCI1.charAt(i+1))) error = true;
						}
					}
					if(error) return 'Por favor introduzca un carnet de identidad válido';
				}
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var employeeCI1 = value.trim().replace(/\s\s+/g, ' ');
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_carnet'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "employeeCI": employeeCI1},
					success : function(data) { $("#employeeId1").text(employeeCI1); }, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		var employeeGenderArray = [];
		$.each({ "M": "Masculino", "F": "Femenino"}, function(k, v) { employeeGenderArray.push({id: k, text: v}); });
		$('#employeeGender1').editable({type: 'select2', value: 'Masculino', source: employeeGenderArray,
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_genero'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "employeeGender": value},
					success : function(data) {}, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#employeeDateOfBirth1').editable({type: 'adate', date: {format: 'dd/mm/yyyy', viewformat: 'dd/mm/yyyy', weekStart: 1},
			validate: function(value) {
				var dateOfBirth1 = value.split("/");
				var dateOfBirth = new Date(+dateOfBirth1[2], dateOfBirth1[1]-1, +dateOfBirth1[0]); 
				var lowerDate = new Date(), upperDate = new Date();
				lowerDate.setDate(lowerDate.getDate()-(90*365));
				upperDate.setDate(upperDate.getDate()-(15*365));
				if(dateOfBirth > upperDate || dateOfBirth < lowerDate) return 'Por favor introduzca una fecha entre ' + lowerDate.toLocaleDateString() + ' y ' + upperDate.toLocaleDateString();
			},
			success: function(response, value) {
				var encryptedEmployeeId = new URLSearchParams(window.location.search).get('id').toString();
				var dateOfBirth1 = value.split("/");
				var dateOfBirth = (+dateOfBirth1[2]) + "-" + (dateOfBirth1[1]) + "-" + (+dateOfBirth1[0]);
				$.ajax({
					url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_fecha_de_nacimiento'); ?>",
					type: "POST", dataType: "html", data: {"encryptedEmployeeId": encryptedEmployeeId, "employeeDateOfBirth": dateOfBirth},
					success : function(data) {}, error : function(jqXHR, textStatus, errorThrown) {}
				});
			}
		});

		$('#profile-feed-1').ace_scroll({
			height: '250px',
			mouseWheelLock: true,
			alwaysVisible : true
		});
		
		$('a[ data-original-title]').tooltip();
	});

	var avatar = document.getElementById('avatar');

	function changeAvatar() {
		Webcam.set({width: 300, height: 300, image_format: 'jpeg', jpeg_quality: 90});

		var activateWebcam = '<div id="my_camera" style="width:300px; height:300px;"></div>\
								<div>\
									<button type="button" id="updateAvatar" onclick="updateAvatar()" class="btn btn-info" style="padding: 6px; height: 40px; width: 40px;">\
										<i class="ace-icon fa fa-check"></i>\
									</button>\
									<button type="button" id="cancelAvatar" onclick="cancelAvatar()" class="btn" style="padding: 6px; height: 40px; width: 40px;">\
										<i class="ace-icon fa fa-times"></i>\
									</button>\
								</div>';
		$("#avatar").replaceWith((activateWebcam));

		Webcam.attach('#my_camera');
	}

	function updateAvatar(){
		Webcam.snap( function(data_uri) {
			avatar.src = data_uri;
			$.ajax({
				url: "<?php echo base_url('/recursos_humanos/empleados/actualizar_imagen'); ?>",
				type: "POST", dataType: "html", data: {"encryptedEmployeeId":encryptedEmployeeId, "dataURI": data_uri},
				success : function(data) {}, error : function(jqXHR, textStatus, errorThrown) {}
			});
		});
		Webcam.reset();
		$('#profile-picture').html(avatar);
	}

	function cancelAvatar(){
		Webcam.reset();
		$('#profile-picture').html(avatar);
	}
</script>
</body>
</html>