<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url(); ?>/inicio">Inicio</a>
				</li>
				<li>
					<a href="#">Contabilidad</a>
				</li>
				<li class="active">Caja Chica</li>
			</ul>
		</div>
		<div class="page-content">
			<div class="page-header">
				<h1>Caja Chica</h1>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-5">
					<h4 class="green clearfix" style="margin-bottom:20px;">Caja Chica: 69 bs.</h4>
					<div class="widget-box widget-container-col" style="margin-bottom:20px;">
						<div class="widget-header">
							<h4 class="widget-title">Retirar Fondos</h4>
							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-up"></i>
								</a>
							</div>
						</div>
						<div class="widget-body" style="padding: 10px;">
							<div class="widget-main">
								<form action="<?php echo base_url('//') ?>" method="post">
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Fondos</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-8">
											<div class="input-group">
												<input class="form-control" id="form-field-8" name="employeeTypeName" placeholder="Escriba cantidad"></input>
												<span class="input-group-addon">bs.</span>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<button class="pull-right btn btn-sm btn-primary btn-block" type="submit">Retirar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.col -->
					<div class="widget-box widget-container-col" style="margin-bottom:20px;">
						<div class="widget-header">
							<h4 class="widget-title">Depositar Fondos</h4>
							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-up"></i>
								</a>
							</div>
						</div>
						<div class="widget-body" style="padding: 10px;">
							<div class="widget-main">
								<form action="<?php echo base_url('//') ?>" method="post">
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Fondos</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-8">
											<div class="input-group">
												<input class="form-control" id="form-field-8" name="employeeTypeName" placeholder="Escriba cantidad"></input>
												<span class="input-group-addon">bs.</span>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<button class="pull-right btn btn-sm btn-primary btn-block" type="submit">Depositar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.col -->
				</div>
				<div class="col-xs-12 col-sm-7">
					<div id="timeline-1">
						<div class="timeline-container">
							<div class="timeline-label">
								<span class="label label-primary arrowed-in-right label-lg">
									<b>24 de septiembre, 2022</b>
								</span>
							</div>
							<div class="timeline-items">
								<div class="timeline-item clearfix">
									<div class="timeline-info">
										<img alt="Avatar" src="https://yt3.ggpht.com/8J7WeFWRw-04yhS30nzJIJtthN8u4kFYECTWd0OjyrI8GI8jM8IZDk5_NHK9Go53W-gLqTXFMXg=s88-c-k-c0x00ffffff-no-rj"/>
										<span class="label label-info label-sm">
											<i class="ace-icon fa fa-clock-o bigger-110"></i> 16:22
										</span>
									</div>
									<div class="widget-box transparent">
										<div class="widget-header widget-header-small">
											<h4 class="widget-main smaller">
												<div class="grey text-justify">Saque 5 dolares para comprar Coca Cola</div>
											</h4>
											<span class="widget-toolbar no-border">
												<div class="pull-right action-buttons">
													<a href="#">
														<i class="ace-icon fa fa-pencil blue bigger-125"></i>
													</a>
													<a href="#">
														<i class="ace-icon fa fa-times red bigger-125"></i>
													</a>
												</div>
											</span>
										</div>
									</div>
								</div>
							</div><!-- /.timeline-items -->

						</div><!-- /.timeline-container -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Ace</span> Application &copy; 2013-2014
			</span> &nbsp; &nbsp;
			<span class="action-buttons">
				<a href="#"> <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i> </a>
				<a href="#"> <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i> </a>
				<a href="#"> <i class="ace-icon fa fa-rss-square orange bigger-150"></i> </a>
			</span>
		</div>
	</div>
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	<!--[if !IE]> --><script src="<?php echo base_url().'/assets/'?>/js/jquery-2.1.4.min.js"></script><!-- <![endif]-->
	<!--[if IE]><script src="<?php echo base_url().'/assets/'?>/js/jquery-1.11.3.min.js"></script><![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url().'/assets/'?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="<?php echo base_url().'/assets/'?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().'/assets/'?>/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url().'/assets/'?>/js/ace.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jquery-ui.custom.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/moment.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/bootbox.js"></script>
	<script type="text/javascript">
	</script>
</div>
</body>
</html>