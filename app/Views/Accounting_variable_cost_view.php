<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url(); ?>/inicio">Inicio</a>
				</li>
				<li><a href="#">Contabilidad</a></li>
				<li><a href="#">Costos</a></li>
				<li class="active">Costos Variables</li>
			</ul>
		</div>
		<div class="page-content">
			<div class="page-header">
				<h1>Costos Variables</h1>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Descripción</th>
								<th>Número de cuenta a pagar</th>
								<th>Monto (bs.)</th>
								<th>Fecha Límite de Pago</th>
								<th>Meses de Plazo</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Electricidad</td>
								<td>69696969</td>
								<td>200</td>
								<td>25/06/2022</td>
								<td>3</td>
								<td class="hidden-480">
									<span class="label label-warning">Pendiente</span>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Agua</td>
								<td>69696969</td>
								<td>300</td>
								<td>24/06/2022</td>
								<td>2</td>
								<td class="hidden-480">
									<span class="label label-success arrowed-in arrowed-in-right">Pagado</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
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
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.print.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/ace.min.js"></script>
<script src="assets/js/jquery.jqGrid.min.js"></script>
<script src="assets/js/grid.locale-en.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#modal-form input[type=file]').ace_file_input({
			style:'well',
			btn_choose:'Coloque sus archivos aquí o haga clic para elegir',
			btn_change:null,
			no_icon:'ace-icon fa fa-cloud-upload',
			droppable:true,
			thumbnail:'large'
		})

		var myTable = $('#dynamic-table').DataTable( {
			bAutoWidth: false,
			"aoColumns": [ { "bSortable": false }, null, null, null, null, null, { "bSortable": false } ],
			"aaSorting": [], select: { style: 'multi' }
	    } );
		
		
		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
		
		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
				{
					"extend": "colvis",
					"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Mostrar/ocultar columnas</span>",
					"className": "btn btn-white btn-primary btn-bold",
					columns: ':not(:first):not(:last)'
				},
				{
					"extend": "copy",
					"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copiar al portapapeles</span>",
					"className": "btn btn-white btn-primary btn-bold"
				},
				{
					"extend": "csv",
					"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Exportar a CSV</span>",
					"className": "btn btn-white btn-primary btn-bold"
				},
				{
					"extend": "excel",
					"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Exportar a Excel</span>",
					"className": "btn btn-white btn-primary btn-bold"
				},
				{
					"extend": "pdf",
					"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Exportar a PDF</span>",
					"className": "btn btn-white btn-primary btn-bold"
				},
				{
					"extend": "print",
					"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Imprimir</span>",
					"className": "btn btn-white btn-primary btn-bold",
					autoPrint: false,
					message: 'Esta impresión se produjo usando el botón Imprimir para DataTables'
				}
			]
		} );

		myTable.buttons().container().appendTo( $('.tableTools-container') );
		
		var defaultCopyAction = myTable.button(1).action();
		myTable.button(1).action(function (e, dt, button, config) {
			defaultCopyAction(e, dt, button, config);
			$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		});
		
		var defaultColvisAction = myTable.button(0).action();
		myTable.button(0).action(function (e, dt, button, config) {
			defaultColvisAction(e, dt, button, config);
			if($('.dt-button-collection > .dropdown-menu').length == 0) {
				$('.dt-button-collection')
				.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				.find('a').attr('href', '#').wrap("<li />")
			}
			$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
		});
	
		setTimeout(function() {
			$($('.tableTools-container')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);
		
		myTable.on( 'select', function ( e, dt, type, index ) {
			if ( type === 'row' ) $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
		} );

		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
		} );

		$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
		
		$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$('#dynamic-table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) myTable.row(row).select();
				else  myTable.row(row).deselect();
			});
		});
		
		$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
			var row = $(this).closest('tr').get(0);
			if(this.checked) myTable.row(row).deselect();
			else myTable.row(row).select();
		});
	
		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});
		
		var active_class = 'active';
		$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});
		
		$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if($row.is('.detail-row ')) return;
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
	
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();
			var off2 = $source.offset();
			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}

		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});

		if(!ace.vars['touch']) {
			$('.chosen-select').chosen({allow_single_deselect:true}); 
			$(window).off('resize.chosen').on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			});
			$('#chosen-multiple-style .btn').on('click', function(e){
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
				 else $('#form-field-select-4').removeClass('tag-input-style');
			});
		}
	})
</script>
</html>