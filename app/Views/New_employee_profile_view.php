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
					<form action="<?php echo base_url('/recursos_humanos/nuevo_perfil/registrar_empleado'); ?>" method="POST">
						<div id="user-profile-2" class="user-profile">
							<div class="tabbable">
								<div class="tab-content no-border padding-24">
									<div id="home" class="tab-pane in active">
										<div class="row">
											<div class="col-xs-12 col-sm-3 center">
												<div>
													<span class="profile-picture">
														<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url() ?>/assets/images/avatars/profile-pic.jpg" />
													</span>

													<div class="space-4"></div>

													<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
														<div class="inline position-relative">
															<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
																<i class="ace-icon fa fa-circle light-green"></i>
																&nbsp;
																<span class="white">Alex M. Doe</span>
															</a>

															<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
																<li class="dropdown-header"> Change Status </li>

																<li>
																	<a href="#">
																		<i class="ace-icon fa fa-circle green"></i>
																		&nbsp;
																		<span class="green">Available</span>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="ace-icon fa fa-circle red"></i>
																		&nbsp;
																		<span class="red">Busy</span>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="ace-icon fa fa-circle grey"></i>
																		&nbsp;
																		<span class="grey">Invisible</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div><!-- /.col -->

											<div class="col-xs-12 col-sm-9">
												<h4 class="blue">
													<span class="middle">Registrar Datos del Empleado</span>
												</h4>

												<div class="profile-user-info">
													<div class="profile-info-row">
														<div class="profile-info-name"> Nombre </div>
														<div class="profile-info-value">
															<span><input required class="form-control" type="text" name="name"></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Primer Apellido </div>
														<div class="profile-info-value">
															<span><input required class="form-control" type="text" name="lastName1"></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Segundo Apellido </div>
														<div class="profile-info-value">
															<span><input required class="form-control" type="text" name="lastName2"></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Género </div>

														<div class="profile-info-value">
															<span><input required class="form-control" type="text" name="employeeGender"></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Fecha de Nacimiento </div>

														<div class="profile-info-value">
															<span>
																<div class="input-group">
																	<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="employeeDateOfBirth" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
															</span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Nro de Carnet </div>

														<div class="profile-info-value">
															<span><input required class="form-control" type="text" name="employeeCI"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Nro de Celular </div>

														<div class="profile-info-value">
															<span><input required class="form-control" type="number" name="employeePhoneNumber"></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Código de Empleado </div>

														<div class="profile-info-value">
															<span><input required class="form-control" type="number" name="employeeCode"></span>
														</div>
													</div>
												</div>
											</div><!-- /.col -->
										</div><!-- /.row -->

										<div class="space-20"></div>

										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="widget-box transparent">
													<div class="widget-header widget-header-small">
														<h4 class="widget-title smaller">
															<i class="fa fa-map-marker light-green bigger-110"></i>
															Dirección
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															<div class="col-sm-9">
																<div id="googleMap" style="width:100%;height:250px;"></div>
															</div>
															<div id="marker" class="collapse"></div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-6">
												<div class="widget-box transparent">
													<div class="widget-header widget-header-small header-color-blue2">
														<h4 class="widget-title smaller">
															<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
															Seleccionar Rol
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main padding-16">
															<div class="profile-skills">
																<div class="widget-body">
																	<div class="widget-main">
																		<?php
																		$cont = 1;
																		foreach ($data->getResult() as $row) {
																		?>
																			<div class="checkbox">
																				<label>
																					<input required name="employeeType[]" value="<?php echo $row->employeeTypeId; ?>" type="checkbox" class="ace" />
																					<span class="lbl"> <?php echo $row->employeeTypeName; ?></span>
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
													</div>
												</div>
											</div>
											<div class="center">
												<a data-toggle="tab" href="#feed" type="button" class="btn btn-sm btn-success btn-white btn-round">
													<span class="bigger-110">Siguiente</span>
													<i class="icon-on-right green ace-icon fa fa-arrow-right bigger-150 "></i>
												</a>
											</div>
										</div>
									</div><!-- /#home -->
									<div id="feed" class="tab-pane">


										<div class="center">
											<a data-toggle="tab" href="#home" type="button" class="btn btn-sm btn-primary btn-white btn-round">
												<i class="ace-icon fa fa-arrow-left bigger-150 middle orange2"></i>
												<span class="bigger-110">Anterior</span>
											</a>
											<button type="submit" class="btn btn-sm btn-success btn-white btn-round">
												<span class="bigger-110">Registrar</span>
												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</button>
										</div>
									</div><!-- /#feed -->
								</div>
							</div>
						</div>
					</form>
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
<script src="<?php echo base_url() ?>/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/autosize.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/ace-editable.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap-datepicker.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url() . '/assets/' ?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/ace.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoUXfTkBg00OwY-cuCpa-HWkYwBL9dhLA&callback=initMap"></script>
<script type="text/javascript">
	// Initialize and add the map	
	function initMap() {
		// The location of Uluru
		const uluru = {
			lat: -25.344,
			lng: 131.031
		};
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
<script type="text/javascript">
	jQuery(function($) {

		//editables on first profile page
		$.fn.editable.defaults.mode = 'inline';
		$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
		$.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>' +
			'<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';

		//editables 

		//text editable
		$('#username')
			.editable({
				type: 'text',
				name: 'username'
			});



		//select2 editable

		// *** editable avatar *** //
		try { //ie8 throws some harmless exceptions, so let's catch'em

			//first let's add a fake appendChild method for Image element for browsers that have a problem with this
			//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
			try {
				document.createElement('IMG').appendChild(document.createElement('B'));
			} catch (e) {
				Image.prototype.appendChild = function(el) {}
			}

			var last_gritter
			$('#avatar').editable({
				type: 'image',
				name: 'avatar',
				value: null,
				//onblur: 'ignore',  //don't reset or hide editable onblur?!
				image: {
					//specify ace file input required plugin's options here
					btn_choose: 'Change Avatar',
					droppable: true,
					maxSize: 110000, //~100Kb

					//and a few extra ones here
					name: 'avatar', //put the field name here as well, will be used inside the custom plugin
					on_error: function(error_type) { //on_error function will be called when the selected file has a problem
						if (last_gritter) $.gritter.remove(last_gritter);
						if (error_type == 1) { //file format error
							last_gritter = $.gritter.add({
								title: 'File is not an image!',
								text: 'Please choose a jpg|gif|png image!',
								class_name: 'gritter-error gritter-center'
							});
						} else if (error_type == 2) { //file size rror
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 100Kb!',
								class_name: 'gritter-error gritter-center'
							});
						} else { //other error
						}
					},
					on_success: function() {
						$.gritter.removeAll();
					}
				},
				url: function(params) {
					// ***UPDATE AVATAR HERE*** //
					//for a working upload example you can replace the contents of this function with 
					//examples/profile-avatar-update.js

					var deferred = new $.Deferred

					var value = $('#avatar').next().find('input required[type=hidden]:eq(0)').val();
					if (!value || value.length == 0) {
						deferred.resolve();
						return deferred.promise();
					}


					//dummy upload
					setTimeout(function() {
						if ("FileReader" in window) {
							//for browsers that have a thumbnail of selected image
							var thumb = $('#avatar').next().find('img').data('thumb');
							if (thumb) $('#avatar').get(0).src = thumb;
						}

						deferred.resolve({
							'status': 'OK'
						});

						if (last_gritter) $.gritter.remove(last_gritter);
						last_gritter = $.gritter.add({
							title: 'Avatar Updated!',
							text: 'Uploading to server can be easily implemented. A working example is included with the template.',
							class_name: 'gritter-info gritter-center'
						});

					}, parseInt(Math.random() * 800 + 800))

					return deferred.promise();

					// ***END OF UPDATE AVATAR HERE*** //
				},

				success: function(response, newValue) {}
			})
		} catch (e) {}

		/**
		//let's display edit mode by default?
		var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input required at first
		if(blank_image) {
			$('#avatar').editable('show').on('hidden', function(e, reason) {
				if(reason == 'onblur') {
					$('#avatar').editable('show');
					return;
				}
				$('#avatar').off('hidden');
			})
		}
		*/

		//another option is using modals
		//////////////////////////////
		$('#profile-feed-1').ace_scroll({
			height: '250px',
			mouseWheelLock: true,
			alwaysVisible: true
		});

		$('a[ data-original-title]').tooltip();

		$('.easy-pie-chart.percentage').each(function() {
			var barColor = $(this).data('color') || '#555';
			var trackColor = '#E2E2E2';
			var size = parseInt($(this).data('size')) || 72;
			$(this).easyPieChart({
				barColor: barColor,
				trackColor: trackColor,
				scaleColor: false,
				lineCap: 'butt',
				lineWidth: parseInt(size / 10),
				animate: false,
				size: size
			}).css('color', barColor);
		});

		///////////////////////////////////////////

		//right & left position
		//show the user info on right or left depending on its position
		$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function() {
			var $this = $(this);
			var $parent = $this.closest('.tab-pane');

			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $this.offset();
			var w2 = $this.width();

			var place = 'left';
			if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) place = 'right';

			$this.find('.popover').removeClass('right left').addClass(place);
		}).on('click', function(e) {
			e.preventDefault();
		});


		///////////////////////////////////////////
		////////////////////
		//change profile
		$('[data-toggle="buttons"] .btn').on('click', function(e) {
			var target = $(this).find('input required[type=radio]');
			var which = parseInt(target.val());
			$('.user-profile').parent().addClass('hide');
			$('#user-profile-' + which).parent().removeClass('hide');
		});



		/////////////////////////////////////
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			try {
				$('.editable').editable('destroy');
			} catch (e) {}
			$('[class*=select2]').remove();
		});
	});
</script>
<script type="text/javascript">
			jQuery(function($) {
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});		
			});
		</script>
</body>

</html>