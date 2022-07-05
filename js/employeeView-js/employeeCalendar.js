jQuery(function ($) {
  /* initialize the external events
			-----------------------------------------------------------------*/

  $("#external-events div.external-event").each(function () {
    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()), // use the element's text as the event title
    };

    // store the Event Object in the DOM element so we can get to it later
    $(this).data("eventObject", eventObject);

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true, // will cause the event to go back to its
      revertDuration: 0, //  original position after the drag
    });
  });

  /* initialize the calendar
			-----------------------------------------------------------------*/

  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();

  var calendar = $("#calendar").fullCalendar({
    //isRTL: true,
    //firstDay: 1,// >> change first day of week

    buttonHtml: {
      prev: '<i class="ace-icon fa fa-chevron-left"></i>',
      next: '<i class="ace-icon fa fa-chevron-right"></i>',
    },


    
    
    
    
    /*events: [
      {
        title: "All Day Event",
        start: new Date(y, m, 1),
        className: "label-important",
      },
      {
        title: "Long Event",
        start: moment().subtract(5, "days").format("YYYY-MM-DD"),
        end: moment().subtract(1, "days").format("YYYY-MM-DD"),
        className: "label-success",
      },
      {
        title: "Some Event",
        start: new Date(y, m, d - 3, 16, 0),
        allDay: false,
        className: "label-info",
      },
    ],
*/
    /**eventResize: function(event, delta, revertFunc) {
		
					alert(event.title + " end is now " + event.end.format());
		
					if (!confirm("is this okay?")) {
						revertFunc();
					}
		
				},*/

    editable: true,
    droppable: false, // this allows things to be dropped onto the calendar !!!    
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      alert(start);
    },
    eventClick: function (calEvent, jsEvent, view) {
      //display a modal

    },
  });
  
});
