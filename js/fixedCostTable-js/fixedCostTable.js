var fct = "#fixed_cost_table";
var pgr = "#pager";

var data = [{"Col1" : "a", "Col2" : "b", "Col3" : "c"},
			{"Col1" : "d", "Col2" : "e", "Col3" : "f"},
			{"Col1" : "g", "Col2" : "h", "Col3" : "i"}];

jQuery(function($) {
	var parent_column = $(fct).closest('[class*="col-"]');
	$(window).on('resize.jqGrid', function () {
		$(fct).jqGrid( 'setGridWidth', parent_column.width() );
	});
	
	$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
		if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
			setTimeout(function() {
				$(fct).jqGrid( 'setGridWidth', parent_column.width() );
			}, 20);
		}
	})

	jQuery(fct).jqGrid({
		subGrid: false,
		subGridOptions: {
			plusicon: "ace-icon fa fa-plus center bigger-110 blue",
			minusicon: "ace-icon fa fa-minus center bigger-110 blue",
			openicon: "ace-icon fa fa-chevron-right center orange",
		},
		data: data,
		datatype: "local",
		height: 400,
		colNames: ["", "Saludo", "Despedida", "Insulto"],
		colModel: [
			{
				name: "myac",
				index: "",
				width: 80,
				fixed: true,
				sortable: false,
				resize: false,
				formatter: "actions",
				formatoptions: {
					keys: true,
					delOptions: {
						recreateForm: true,
					},
				},
			},
			{name: "Col1", width: 100, editable: true},
			{name: "Col2", width: 100, editable: true},
			{name: "Col3", width: 100, editable: true}
		],
		pager: pgr,
		rowNum: 10,
		rowList: [10, 20, 30],
		sortname: "Col1",
		sortorder: "asc",
		viewrecords: true,
		gridview: true,
		autoencode: true,
		altRows: true,
		loadComplete: function () {
			var table = this;
			setTimeout(function () {
				styleCheckbox(table);
				updateActionIcons(table);
				updatePagerIcons(table);
				enableTooltips(table);
			}, 0);
		}, //editurl: "crudClient"
		caption: "Lista de los Costos Fijos",
	}); //.hideCol("Col1")

	$(window).triggerHandler('resize.jqGrid');

	function aceSwitch(cellvalue, options, cell) {
		setTimeout(function () {
			$(cell).find("input[type=checkbox]").addClass("ace ace-switch ace-switch-5").after('<span class="lbl"></span>');
		}, 0);
	}

	function pickDate(cellvalue, options, cell) {
		setTimeout(function () {
			$(cell).find("input[type=text]").datepicker({
				format: "yyyy-mm-dd",
				autoclose: true,
			});
		}, 0);
	}

	jQuery(fct).jqGrid(
		"navGrid", pgr,
		{
			edit: false, editicon: "ace-icon fa fa-pencil blue",
			add: true, addicon: "ace-icon fa fa-plus-circle purple",
			del: false, delicon: "ace-icon fa fa-trash-o red",
			search: true, searchicon: "ace-icon fa fa-search orange",
			refresh: true, refreshicon: "ace-icon fa fa-refresh green",
			view: true, viewicon: "ace-icon fa fa-search-plus grey",
		},
		{
			recreateForm: true,
			beforeShowForm: function (e) {
				var form = $(e[0]);
				form.closest(".ui-jqdialog").find(".ui-jqdialog-titlebar").wrapInner('<div class="widget-header" />');
				style_edit_form(form);
			},
		},
		{
			closeAfterAdd: true,
			recreateForm: true,
			viewPagerButtons: false,
			beforeShowForm: function (e) {
				var form = $(e[0]);
				form.closest(".ui-jqdialog").find(".ui-jqdialog-titlebar").wrapInner('<div class="widget-header" />');
				style_edit_form(form);
			},
		},
		{
			recreateForm: true,
			beforeShowForm: function (e) {
				var form = $(e[0]);
				if (form.data("styled")) return false;
				form.closest(".ui-jqdialog").find(".ui-jqdialog-titlebar").wrapInner('<div class="widget-header" />');
				style_delete_form(form);
				form.data("styled", true);
			},
			onClick: function (e) {	},
		},
		{
			recreateForm: true,
			afterShowSearch: function (e) {
				var form = $(e[0]);
				form.closest(".ui-jqdialog").find(".ui-jqdialog-title").wrap('<div class="widget-header" />');
				style_search_form(form);
			},
			afterRedraw: function () {
				style_search_filters($(this));
			},
			multipleSearch: false,
		},
		{
			recreateForm: true,
			beforeShowForm: function (e) {
				var form = $(e[0]);
				form.closest(".ui-jqdialog").find(".ui-jqdialog-title").wrap('<div class="widget-header" />');
			},
		}
	);

	function style_edit_form(form) {
		form.find("input[name=dateOfBirth]").datepicker({ format: "yyyy-mm-dd", autoclose: true });
		form.find("input[name=status]").addClass("ace ace-switch ace-switch-5").after('<span class="lbl"></span>');
		var buttons = form.next().find(".EditButton .fm-button");
		buttons.addClass("btn btn-sm").find('[class*="-icon"]').hide();
		buttons.eq(0).addClass("btn-primary").prepend('<i class="ace-icon fa fa-check"></i>');
		buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>');
		buttons = form.next().find(".navButton a");
		buttons.find(".ui-icon").hide();
		buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
		buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
	}

	function style_delete_form(form) {
		var buttons = form.next().find(".EditButton .fm-button");
		buttons.addClass("btn btn-sm btn-white btn-round").find('[class*="-icon"]').hide(); //ui-icon, s-icon
		buttons.eq(0).addClass("btn-danger").prepend('<i class="ace-icon fa fa-trash-o"></i>');
		buttons.eq(1).addClass("btn-default").prepend('<i class="ace-icon fa fa-times"></i>');
	}

	function style_search_filters(form) {
		form.find(".delete-rule").val("X");
		form.find(".add-rule").addClass("btn btn-xs btn-primary");
		form.find(".add-group").addClass("btn btn-xs btn-success");
		form.find(".delete-group").addClass("btn btn-xs btn-danger");
	}

	function style_search_form(form) {
		var dialog = form.closest(".ui-jqdialog");
		var buttons = dialog.find(".EditTable");
		buttons.find('.EditButton a[id*="_reset"]').addClass("btn btn-sm btn-info").find(".ui-icon").attr("class", "ace-icon fa fa-retweet");
		buttons.find('.EditButton a[id*="_query"]').addClass("btn btn-sm btn-inverse").find(".ui-icon").attr("class", "ace-icon fa fa-comment-o");
		buttons.find('.EditButton a[id*="_search"]').addClass("btn btn-sm btn-purple").find(".ui-icon").attr("class", "ace-icon fa fa-search");
	}

	function beforeDeleteCallback(e) {
		var form = $(e[0]);
		if (form.data("styled")) return false;
		form.closest(".ui-jqdialog").find(".ui-jqdialog-titlebar").wrapInner('<div class="widget-header" />');
		style_delete_form(form);
		form.data("styled", true);
	}

	function beforeEditCallback(e) {
		var form = $(e[0]);
		form.closest(".ui-jqdialog").find(".ui-jqdialog-titlebar").wrapInner('<div class="widget-header" />');
		style_edit_form(form);
	}

	function styleCheckbox(table) {
		$(table).find("input:checkbox").addClass("ace").wrap("<label />").after('<span class="lbl align-top" />');
		$('.ui-jqgrid-labels th[id*="_cb"]:first-child').find("input.cbox[type=checkbox]").addClass("ace").wrap("<label />").after('<span class="lbl align-top" />');
	}

	function updateActionIcons(table) { }

	function updatePagerIcons(table) {
		var replacement = {
			"ui-icon-seek-first": "ace-icon fa fa-angle-double-left bigger-140",
			"ui-icon-seek-prev": "ace-icon fa fa-angle-left bigger-140",
			"ui-icon-seek-next": "ace-icon fa fa-angle-right bigger-140",
			"ui-icon-seek-end": "ace-icon fa fa-angle-double-right bigger-140",
		};
		$(".ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon").each(function () {
			var icon = $(this);
			var $class = $.trim(icon.attr("class").replace("ui-icon", ""));
			if ($class in replacement)
			icon.attr("class", "ui-icon " + replacement[$class]);
		});
	}

	function enableTooltips(table) {
		$(".navtable .ui-pg-button").tooltip({container: "body"});
		$(table).find(".ui-pg-div").tooltip({container: "body"});
	}

	$(document).one("ajaxloadstart.page", function (e) {
		$.jgrid.gridDestroy(grid_selector);
		$(".ui-jqdialog").remove();
	});
});




