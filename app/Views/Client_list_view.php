<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Inicio</a>
				</li>
				<li>
					<a href="#">Gestion de Proyectos</a>
				</li>
				<li>
					<a href="#">Gestion de Clientes</a>
				</li>
				<li class="active">
					<a href="#">Lista de Clientes</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<table id="grid-table"></table>

					<div id="grid-pager"></div>
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
<script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->
<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.jqGrid.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/grid.locale-en.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url(); ?>/assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script src="<?php echo base_url() ?>/js/client-js/clientTable.js"></script>
</body>

</html>