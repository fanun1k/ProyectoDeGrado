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
					<h4 class="green clearfix" style="margin-bottom:20px;">Caja Chica: <?php echo $fund . " bs."; ?> </h4>
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
								<form action="<?php echo base_url('/contabilidad/retirar_caja_chica') ?>" method="post">
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Motivo</label>
										</div>
									</div>
									<div class="row" style="margin-bottom: 20px;">
										<div class="col-xs-12 col-sm-12">
											<div class="input-group" style="width: 100%;">
												<textarea name="motive" rows="3" required placeholder="Escriba motivo" class="autosize-transition form-control" style="resize: vertical;"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Fondos</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-8">
											<div class="input-group" style="margin-bottom: 20px;">
												<input class="form-control" name="quantity" required placeholder="Escriba cantidad" required pattern="^\d*(\.\d{0,2})?$" autocomplete="off"></input>
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
								<form action="<?php echo base_url('/contabilidad/depositar_caja_chica') ?>" method="post">
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Motivo</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="input-group" style="width: 100%;">
												<textarea name="motive" rows="3" placeholder="Escriba motivo" required class="autosize-transition form-control" style="resize: vertical; margin-bottom: 20px;"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Fondos</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-8" style="margin-bottom: 20px;">
											<div class="input-group">
												<input class="form-control" name="quantity" placeholder="Escriba cantidad" required pattern="^\d*(\.\d{0,2})?$" autocomplete="off"></input>
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
						<?php
							$currentDateForTimeline = date('Y-m-d', strtotime('2999-06-09'));
							$countPettyCashRecord = 0;
							foreach($pettyCashRecord->getResult() as $row) { $countPettyCashRecord++; }
							if ($countPettyCashRecord == 0) { echo "<h4>No existe registro de transacciones de caja chica.</h4>"; }
							foreach($pettyCashRecord->getResult() as $row) { $d = date("Y-m-d", strtotime($row->createDate));
						?>
						<div class="timeline-container">
							<?php if($currentDateForTimeline != $d) { ?>
							<div class="timeline-label">
								<span class="label label-primary arrowed-in-right label-lg">
									<b>
										<?php setlocale( LC_ALL,"es_ES@euro","es_ES","esp" );
										echo strftime("%A, %d de %B, %Y", strtotime($row->createDate)); ?>
									</b>
								</span>
							</div>
							<?php $currentDateForTimeline = $d; } ?>
							<div class="timeline-items">
								<div class="timeline-item clearfix">
									<div class="timeline-info">
										<img alt="Avatar" src="https://yt3.ggpht.com/8J7WeFWRw-04yhS30nzJIJtthN8u4kFYECTWd0OjyrI8GI8jM8IZDk5_NHK9Go53W-gLqTXFMXg=s88-c-k-c0x00ffffff-no-rj"/>
										<span class="label label-info label-sm">
											<i class="ace-icon fa fa-clock-o bigger-110"></i><?php echo date("H:i", strtotime($row->createDate)); ?>
										</span>
									</div>
									<div class="widget-box transparent">
										<div class="widget-header widget-header-small">
											<h4 class="widget-main smaller">
												<div class="grey text-justify">
													<b class="<?php echo ($row->type == 1) ? "green" : "red";?>"><i><?php echo $row->amount; ?> bs.</i></b>
													<?php echo $row->motive; ?>
												</div>
											</h4>
											<?php $userId = (session()->has('userId')) ? session()->get('userId') : $_COOKIE['userId'];
											if($userId == $row->userId) { ?>
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
											<?php } ?>
										</div>
									</div>
								</div>
							</div><!-- /.timeline-items -->
						</div><!-- /.timeline-container -->
						<?php } ?>
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