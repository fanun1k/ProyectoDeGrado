<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Recursos Humanos</a>
				</li>
				<li class="active">Personal De Trabajo</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="col-sm-9">
				<h3 class="header smaller lighter blue">Calendario</h3>
				<div class="row">
					<div class="col-sm-5">
						<div class="space"></div>

						<div id="calendar"></div>
					</div>
					<div class="col-sm-7">
						<div class="widget-box">
							<div class="widget-header">
								<div class="row">
									<div class="col-sm-6" style="text-align:center;">
										<table class="table">
											<thead>
												<tr style="font-size: 20px; ">
													<th>5</th>
													<th>0</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>En el trabajo</td>
													<td>Con Licencia</td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-sm-6">
										<button class="pull-right btn btn-sm btn-primary " style="margin: 5px;">Registrar
											Ausencia</button>
									</div>
								</div>

							</div>
							<div class="widget-body">
								<div class="row">
									<div class="col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">
													Ausencias
												</h4>
											</div>
											<div class="widget-body">
												<div class="widget-main padding-8">

												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="widget-main">
											<div class="tabbable">
												<ul class="nav nav-tabs" id="myTab">
													<li class="active">
														<a data-toggle="tab" href="#home">
															Permisos prox.
														</a>
													</li>

													<li>
														<a data-toggle="tab" href="#messages">
															Cumpleaños este mes
															<span class="badge badge-danger">4</span>
														</a>
													</li>
												</ul>
												<div class="tab-content">
													<div id="home" class="tab-pane fade in active">
														<p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
													</div>

													<div id="messages" class="tab-pane fade">
														<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="widget-box widget-color-blue2">
					<div class="widget-header">
						<h4 class="widget-title">
							Material de Capacitaciones
						</h4>
					</div>

					<div class="widget-body">
						<div class="widget-main padding-8">
							<ul id="tree2"></ul>
						</div>
					</div>
				</div>
				<div class="row widget-box widget-color-blue2" style="min-height: 100px ;">
					<div class="widget-header">
						<h4 class="widget-title">Personal Activo</h4>

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
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
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

	<script src="<?php echo base_url() . '/assets/' ?>/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url() . '/assets/' ?>/js/ace.min.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/jquery-ui.custom.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/moment.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/bootbox.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/tree.min.js"></script>
	<!-- inline scripts related to this page -->
	<script src="<?php echo base_url() ?>/js/employeeView-js/employeeCalendar.js"></script>
	<script src="<?php echo base_url() ?>/js/employeeView-js/trainingMaterial.js"></script>
</div>

</body>

</html>