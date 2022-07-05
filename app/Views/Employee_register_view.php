<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li class="active">
					<i class="ace-icon fa fa-home home-icon"></i>
					Inicio
				</li>
                <li>
					<a>Recursos Humanos</a>
				</li>
				<li>
                    <a>Recursos Humanos</a>
				</li>
                <li class="active">
					Nuevo Registro de Empleado
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="page-header">
						<h1>Nuevo Registro</h1>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-5">


                    <div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-users orange"></i>Foto</h4>
						</div>
                        <div class="center" style="padding-top: 20px;">
                            <span class="profile-picture ">
                                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url() ?>/assets/images/avatars/profile-pic.jpg" width="200" height="200" />
                            </span>
                        </div>
                    </div>

					<div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-users orange"></i>Datos Personales</h4>
						</div>
                        <form class="form-horizontal" style="padding-top: 20px;">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label control-label">Nombre Completo</label>
                                <div class="col-sm-3">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre">
                                        <i class="ace-icon fa fa-user light-orange"></i>
                                    </span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="lastName1" placeholder="Primer Apellido">
                                        <i class="ace-icon fa fa-user light-orange"></i>
                                    </span>
                                </div>
                                <div class="col-sm-3">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="lastName2" placeholder="Segundo Apellido">
                                        <i class="ace-icon fa fa-user light-orange"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label control-label">Número de Celular</label>
                                <div class="col-sm-9">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="employeePhoneNumber" placeholder="Número de Celular" />
                                        <i class="ace-icon fa fa-phone light-orange"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label control-label">Carnet de Identidad</label>
                                <div class="col-sm-9">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="employeeCI" placeholder="Carnet de Identidad" />
                                        <i class="ace-icon fa fa-id-card light-orange"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label control-label">Género</label>
                                <div class="col-sm-3">
                                        <select class="form-control" name="employeePhoneGender">
                                            <option selected disabled value="">Género</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label control-label">Fecha de Nacimiento</label>
                                <div class="col-sm-9">
                                    <span class="input-icon">
                                        <input type="text" class="form-control date-picker" id="id-date-picker-1" data-date-format="dd/mm/yyyy">
                                        <i class="ace-icon fa fa-calendar light-orange"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
					</div>
				</div>


				<div class="col-xs-12 col-sm-7">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-map orange"></i>Dirección</h4>
						</div>
                        <div id="googleMap" style="margin-top: 20px; height: 300px;"></div>
                        <div id="marker" class="collapse"></div>
                        <input type="text" id="lat" name="lat" placeholder="Media Calórica" class="col-xs-5 col-sm-3 collapse" />
                        <input type="text" id="lng" name="lng" placeholder="Media Calórica" class="col-xs-5 col-sm-3 collapse" />
					</div>

                    <div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-certificate orange"></i>Documentos</h4>
						</div>
					</div>

                    <div class="space-4"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller"><i class="ace-icon fa fa-tachometer orange"></i>Habilidades</h4>
                        </div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-xs-3 center">
                                    
                                    <div class="knob-container inline">
                                        <input type="text" class="input-small knob" value="15" data-min="0" data-max="100" data-step="10" data-width="80" data-height="80" data-thickness=".2" />
                                    </div>
                                    <div class="space-2"></div>
                                    Cocinar
                                </div>

                                <div class="col-xs-3  center">
                                    <div class="knob-container inline">
                                        <input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" />
                                    </div>
                                    <div class="space-2"></div>
                                    Trapear
                                </div>

                                <div class="col-xs-3  center">
                                    <div class="knob-container inline">
                                        <input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" />
                                    </div>
                                    <div class="space-2"></div>
                                    Dar Putazos
                                </div>

                                <div class="col-xs-3  center">
                                    <div class="knob-container inline">
                                        <input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" />
                                    </div>
                                    <div class="space-2"></div>
                                    Barrer
                                </div>
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
<script src="<?php echo base_url()?>/assets/js/jquery.knob.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoUXfTkBg00OwY-cuCpa-HWkYwBL9dhLA&callback=initMap"></script>

<!-- ace scripts -->
<script src="<?php echo base_url()?>/assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
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

	jQuery(function($) {

        $.fn.editable.defaults.mode = 'inline';
		$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
		$.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+'<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $(".knob").knob();

        $('#name1').editable({type: 'text', url: 'post.php', name: 'name1',
            validate: function(value) {
                if(value.length == 0 || value.length > 60 || /\d/.test(value)) return 'Por favor ingrese un nombre';
            }
        });

        try {
            try {
                document.createElement('IMG').appendChild(document.createElement('B'));
            } catch(e) {
                Image.prototype.appendChild = function(el){}
            }
    
            var last_gritter
            $('#avatar').editable({
                type: 'image',
                name: 'avatar',
                value: null,
                image: {
                    btn_choose: 'Change Avatar',
                    droppable: true,
                    maxSize: 5000000,
                    name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                    on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                        if(last_gritter) $.gritter.remove(last_gritter);
                        if(error_type == 1) {//file format error
                            last_gritter = $.gritter.add({
                                title: 'File is not an image!',
                                text: 'Please choose a jpg|gif|png image!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else if(error_type == 2) {//file size rror
                            last_gritter = $.gritter.add({
                                title: 'File too big!',
                                text: 'Image size should not exceed 5 mb!',
                                class_name: 'gritter-error gritter-center'
                            });
                        }
                        else {//other error
                        }
                    },
                    on_success : function() {
                        $.gritter.removeAll();
                    }
                },
                url: function(params) {
                    // ***UPDATE AVATAR HERE*** //
                    //for a working upload example you can replace the contents of this function with 
                    //examples/profile-avatar-update.js
    
                    var deferred = new $.Deferred
    
                    var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                    if(!value || value.length == 0) {
                        deferred.resolve();
                        return deferred.promise();
                    }
    
    
                    //dummy upload
                    setTimeout(function(){
                        if("FileReader" in window) {
                            //for browsers that have a thumbnail of selected image
                            var thumb = $('#avatar').next().find('img').data('thumb');
                            if(thumb) $('#avatar').get(0).src = thumb;
                        }
                        
                        deferred.resolve({'status':'OK'});
    
                        if(last_gritter) $.gritter.remove(last_gritter);
                        last_gritter = $.gritter.add({
                            title: 'Avatar Updated!',
                            text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                            class_name: 'gritter-info gritter-center'
                        });
                        
                        } , parseInt(Math.random() * 800 + 800))
    
                    return deferred.promise();
                    
                    // ***END OF UPDATE AVATAR HERE*** //
                },
                
                success: function(response, newValue) {
                }
            })
        }catch(e) {}
    });
</script>