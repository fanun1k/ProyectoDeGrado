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
			<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
				<div class="col-sm-2">
					<select class="form-control">
						<option>COBOCE</option>
						<option>PIL</option>
						<option>FINO</option>
					</select>
				</div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-sm-6 chart-code widget-container-col">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Lista de Cargo de Personal</h4>

							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-up"></i>
								</a>

								<a href="#" data-action="close">
									<i class="ace-icon fa fa-times"></i>
								</a>
							</div>
						</div>

						<div class="widget-body" style="padding: 10px;">
							<div class="widget-main">
								<table class="table">
									<thead>
										<tr>
											<th scope="col"> Tipo </th>
											<th scope="col"> Cantidad </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data->getResult() as $row) { ?>
										<tr>
											<th scope="row">
												<?php echo $row->employeeTypeName; ?>
											</th>
											<td style="--start:0; --size:1;">
												<span class="data"> <?php echo $row->numberOfEmployeeTypes; ?> </span>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 widget-container-col">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Registrar Cargo de Personal</h4>

							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="ace-icon fa fa-chevron-up"></i>
								</a>

								<a href="#" data-action="close">
									<i class="ace-icon fa fa-times"></i>
								</a>
							</div>
						</div>

						<div class="widget-body" style="padding: 10px;">
							<div class="widget-main">
								<form action="<?php echo base_url('/recursos_humanos/personal_de_trabajo/registrar_tipo_de_empleado') ?>" method="post">
									<div class="row">
										<div class="col-xs-12">
											<label for="form-field-8">Cargo</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-9">
											<input class="form-control" id="form-field-8" name="employeeTypeName" placeholder="Escriba el Cargo de Personal"></input>
										</div>
										<div class="col-xs-12 col-sm-3">
											<button class="pull-right btn btn-sm btn-primary btn-block" type="submit">Registrar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div class="space-24"></div>
			<h3 class="header smaller lighter blue">Calendario</h3>
			<div class="row">
				<div class="col-sm-4">
					<div class="space"></div>

					<div id="calendar"></div>
				</div>
				<div class="col-sm-8">
					<div class="widget-box">
						<div class="widget-header">
							<div class="row">
								<div class="col-sm-6">
									<table>
										<thead>
											<tr>
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
							<div class="widget-main">
								<div>

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
				<span class="blue bolder">Ace</span>
				Application &copy; 2013-2014
			</span>

			&nbsp; &nbsp;
			<span class="action-buttons">
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
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	<!--[if !IE]> -->
	<script src="<?php echo base_url().'/assets/'?>/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
	<script src="<?php echo base_url().'/assets/'?>/js/jquery-1.11.3.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url().'/assets/'?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="<?php echo base_url().'/assets/'?>/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<script src="<?php echo base_url().'/assets/'?>/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url().'/assets/'?>/js/ace.min.js"></script>

	<script src="<?php echo base_url()?>/assets/js/jquery-ui.custom.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/moment.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/bootbox.js"></script>
	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function ($) {

			/* initialize the external events
			-----------------------------------------------------------------*/

			$('#external-events div.external-event').each(function () {

				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end
				var eventObject = {
					title: $.trim($(this).text()) // use the element's text as the event title
				};

				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);

				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true,      // will cause the event to go back to its
					revertDuration: 0  //  original position after the drag
				});

			});


			/* initialize the calendar
			-----------------------------------------------------------------*/

			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();


			var calendar = $('#calendar').fullCalendar({
				//isRTL: true,
				//firstDay: 1,// >> change first day of week 

				buttonHtml: {
					prev: '<i class="ace-icon fa fa-chevron-left"></i>',
					next: '<i class="ace-icon fa fa-chevron-right"></i>'
				},

				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				events: [
					{
						title: 'All Day Event',
						start: new Date(y, m, 1),
						className: 'label-important'
					},
					{
						title: 'Long Event',
						start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
						end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
						className: 'label-success'
					},
					{
						title: 'Some Event',
						start: new Date(y, m, d - 3, 16, 0),
						allDay: false,
						className: 'label-info'
					}
				]
				,

				/**eventResize: function(event, delta, revertFunc) {
		
					alert(event.title + " end is now " + event.end.format());
		
					if (!confirm("is this okay?")) {
						revertFunc();
					}
		
				},*/

				editable: true,
				droppable: true, // this allows things to be dropped onto the calendar !!!
				drop: function (date) { // this function is called when something is dropped

					// retrieve the dropped element's stored Event Object
					var originalEventObject = $(this).data('eventObject');
					var $extraEventClass = $(this).attr('data-class');


					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);

					// assign it the date that was reported
					copiedEventObject.start = date;
					copiedEventObject.allDay = false;
					if ($extraEventClass) copiedEventObject['className'] = [$extraEventClass];

					// render the event on the calendar
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
						// if so, remove the element from the "Draggable Events" list
						$(this).remove();
					}

				},
				selectable: true,
				selectHelper: true,
				select: function (start, end, allDay) {

					bootbox.prompt("New Event Title:", function (title) {
						if (title !== null) {
							calendar.fullCalendar('renderEvent',
								{
									title: title,
									start: start,
									end: end,
									allDay: allDay,
									className: 'label-info'
								},
								true // make the event "stick"
							);
						}
					});

					calendar.fullCalendar('unselect');
				}
				,
				eventClick: function (calEvent, jsEvent, view) {

					//display a modal
					var modal =
						'<div class="modal fade">\
							<div class="modal-dialog">\
								<div class="modal-content">\
									<div class="modal-body">\
									<button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
									<form class="no-margin">\
										<label>Change event name &nbsp;</label>\
										<input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
										<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
									</form>\
									</div>\
									<div class="modal-footer">\
										<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
										<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
									</div>\
								</div>\
							</div>\
						</div>';

					var modal = $(modal).appendTo('body');
					modal.find('form').on('submit', function (ev) {
						ev.preventDefault();

						calEvent.title = $(this).find("input[type=text]").val();
						calendar.fullCalendar('updateEvent', calEvent);
						modal.modal("hide");
					});
					modal.find('button[data-action=delete]').on('click', function () {
						calendar.fullCalendar('removeEvents', function (ev) {
							return (ev._id == calEvent._id);
						})
						modal.modal("hide");
					});

					modal.modal('show').on('hidden', function () {
						modal.remove();
					});
				}

			});

			$('.widget-container-col').sortable({
		        connectWith: '.widget-container-col',
				items:'> .widget-box',
				handle: ace.vars['touch'] ? '.widget-title' : false,
				cancel: '.fullscreen',
				opacity:0.8,
				revert:true,
				forceHelperSize:true,
				placeholder: 'widget-placeholder',
				forcePlaceholderSize:true,
				tolerance:'pointer',
				start: function(event, ui) {
					//when an element is moved, it's parent becomes empty with almost zero height.
					//we set a min-height for it to be large enough so that later we can easily drop elements back onto it
					ui.item.parent().css({'min-height':ui.item.height()})
					//ui.sender.css({'min-height':ui.item.height() , 'background-color' : '#F5F5F5'})
				},
				update: function(event, ui) {
					ui.item.parent({'min-height':''})
					//p.style.removeProperty('background-color');
		
					
					//save widget positions
					var widget_order = {}
					$('.widget-container-col').each(function() {
						var container_id = $(this).attr('id');
						widget_order[container_id] = []
						
						
						$(this).find('> .widget-box').each(function() {
							var widget_id = $(this).attr('id');
							widget_order[container_id].push(widget_id);
							//now we know each container contains which widgets
						});
					});
					
					ace.data.set('demo', 'widget-order', widget_order, null, true);
				}
		    });
		})
	</script>
</div>

</body>

</html>