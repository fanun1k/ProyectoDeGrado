
var subgrid_data = [
  { id: "1", name: "sub grid item 1", qty: 11 },
  { id: "2", name: "sub grid item 2", qty: 3 },
  { id: "3", name: "sub grid item 3", qty: 12 },
  { id: "4", name: "sub grid item 4", qty: 5 },
  { id: "5", name: "sub grid item 5", qty: 2 },
  { id: "6", name: "sub grid item 6", qty: 9 },
  { id: "7", name: "sub grid item 7", qty: 3 },
  { id: "8", name: "sub grid item 8", qty: 8 },
];

jQuery(function ($) {
  var grid_selector = "#sale-table";
  var pager_selector = "#sale-pager";

  var parent_column = $(grid_selector).closest('[class*="col-"]');
  //resize to fit page size
  $(window).on("resize.jqGrid", function () {
    $(grid_selector).jqGrid("setGridWidth", parent_column.width());
  });

  //resize on sidebar collapse/expand
  $(document).on("settings.ace.jqGrid", function (ev, event_name, collapsed) {
    if (
      event_name === "sidebar_collapsed" ||
      event_name === "main_container_fixed"
    ) {
      //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
      setTimeout(function () {
        $(grid_selector).jqGrid("setGridWidth", parent_column.width());
      }, 20);
    }
  });
  jQuery(grid_selector).jqGrid({
    //direction: "rtl",

    //subgrid options
    subGrid: true,
    //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
    //datatype: "xml",
    subGridOptions: {
      plusicon: "ace-icon fa fa-plus center bigger-110 blue",
      minusicon: "ace-icon fa fa-minus center bigger-110 blue",
      openicon: "ace-icon fa fa-chevron-right center orange",
    },
    //for this example we are using local data
    subGridRowExpanded: function (subgridDivId, rowId) {
      var subgridTableId = subgridDivId + "_t";
      $("#" + subgridDivId).html("<table id='" + subgridTableId + "'></table>");
      $("#" + subgridTableId).jqGrid({
        url:"getSaleDetails/"+rowId,
        datatype: "json",
        
        colNames: ["Nombre del Producto", "Cantidad", "Precio Unitario"],
        colModel: [
          { name: "productName", width: 150 },
          { name: "quantity", width: 70 },
          { name: "unitPrice", width: 150 },
        ],
      });
    },

    url: "getSales",
    datatype: "JSON",
    height: 400,
    colNames: ["ID", "Fecha y Hora", "Código de Cliente", "Nombre de Cliente", "Usuario", "Total"],
    colModel: [
      { name: "saleId", index: "saleId", width: 60, sorttype: "int", editable: true },
      {
        name: "createDate",
        index: "createDate",
        width: 110,
        editable: false,
        sorttype: "date",
      },
      {
        name: "clientCode",
        index: "clientCode",
        width: 90,
        editable: false,
      },
      {
        name: "clientName",
        index: "clientName",
        width: 180,
        editable: false,
      },
      {
        name: "user",
        index: "user",
        width: 200,
        editable: false, 
      },
      {
        name: "total",
        index: "total",
        width: 70,
        sortable: false,
        editable: false,
        formatter: "currency",
          formatoptions: {
            decimalSeparator: ".",
            decimalPlaces: 2,
            suffix: " Bs. ",
          },       
      },
    ],
      pager: pager_selector,
      rowNum: 10,
      rowList: [10, 20, 30],
      sortname: "createDate",
      sortorder: "desc ",
      viewrecords: true,
      gridview: true,
      autoencode: true,
      altRows: true,
    //toppager: true,

    multiselect: true,
    //multikey: "ctrlKey",
    multiboxonly: true,

    loadComplete: function () {
      var table = this;
      setTimeout(function () {
        styleCheckbox(table);

        updateActionIcons(table);
        updatePagerIcons(table);
        enableTooltips(table);
      }, 0);
    },

    editurl: "cancel_sale", //nothing is saved
    caption: "Anular Ventas",

    //,autowidth: true,

    /**
        ,
        grouping:true, 
        groupingView : { 
             groupField : ['name'],
             groupDataSorted : true,
             plusicon : 'fa fa-chevron-down bigger-110',
             minusicon : 'fa fa-chevron-up bigger-110'
        },
        caption: "Grouping"
        */
  }).hideCol("saleId");
  $(window).triggerHandler("resize.jqGrid"); //trigger window resize to make the grid get the correct size

  //enable search/filter toolbar
  //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
  //jQuery(grid_selector).filterToolbar({});

  //switch element when editing inline
  function aceSwitch(cellvalue, options, cell) {
    setTimeout(function () {
      $(cell)
        .find("input[type=checkbox]")
        .addClass("ace ace-switch ace-switch-5")
        .after('<span class="lbl"></span>');
    }, 0);
  }
  //enable datepicker
  function pickDate(cellvalue, options, cell) {
    setTimeout(function () {
      $(cell)
        .find("input[type=text]")
        .datepicker({ format: "yyyy-mm-dd", autoclose: true });
    }, 0);
  }

  //navButtons
  jQuery(grid_selector).jqGrid(
    "navGrid",
    pager_selector,
    {
      //navbar options
      edit: false,
      editicon: "ace-icon fa fa-pencil blue",
      add: false,
      addicon: "ace-icon fa fa-plus-circle purple",
      del: true,
      delicon: "ace-icon fa fa-trash-o red",
      search: true,
      searchicon: "ace-icon fa fa-search orange",
      refresh: true,
      refreshicon: "ace-icon fa fa-refresh green",
      view: true,
      viewicon: "ace-icon fa fa-search-plus grey",
    },
    {
      //edit record form
      //closeAfterEdit: true,
      //width: 700,
      recreateForm: true,
      beforeShowForm: function (e) {
        var form = $(e[0]);
        form
          .closest(".ui-jqdialog")
          .find(".ui-jqdialog-titlebar")
          .wrapInner('<div class="widget-header" />');
        style_edit_form(form);
      },
    },
    {
      //new record form
      //width: 700,
      closeAfterAdd: true,
      recreateForm: true,
      viewPagerButtons: false,
      beforeShowForm: function (e) {
        var form = $(e[0]);
        form
          .closest(".ui-jqdialog")
          .find(".ui-jqdialog-titlebar")
          .wrapInner('<div class="widget-header" />');
        style_edit_form(form);
      },
    },
    {
      //delete record form
      recreateForm: true,
      beforeShowForm: function (e) {
        var form = $(e[0]);
        if (form.data("styled")) return false;

        form
          .closest(".ui-jqdialog")
          .find(".ui-jqdialog-titlebar")
          .wrapInner('<div class="widget-header" />');
        style_delete_form(form);

        form.data("styled", true);
      },
      onClick: function (e) {
        //alert(1);
      },
    },
    {
      //search form
      recreateForm: true,
      afterShowSearch: function (e) {
        var form = $(e[0]);
        form
          .closest(".ui-jqdialog")
          .find(".ui-jqdialog-title")
          .wrap('<div class="widget-header" />');
        style_search_form(form);
      },
      afterRedraw: function () {
        style_search_filters($(this));
      },
      multipleSearch: true,
      /**
            multipleGroup:true,
            showQuery: true
            */
    },
    {
      //view record form
      recreateForm: true,
      beforeShowForm: function (e) {
        var form = $(e[0]);
        form
          .closest(".ui-jqdialog")
          .find(".ui-jqdialog-title")
          .wrap('<div class="widget-header" />');
      },
    }
  );

  function style_edit_form(form) {
    //enable datepicker on "sdate" field and switches for "stock" field
    form
      .find("input[name=sdate]")
      .datepicker({ format: "yyyy-mm-dd", autoclose: true });

    form
      .find("input[name=stock]")
      .addClass("ace ace-switch ace-switch-5")
      .after('<span class="lbl"></span>');
    //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
    //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

    //update buttons classes
    var buttons = form.next().find(".EditButton .fm-button");
    buttons.addClass("btn btn-sm").find('[class*="-icon"]').hide(); //ui-icon, s-icon
    buttons
      .eq(0)
      .addClass("btn-primary")
      .prepend('<i class="ace-icon fa fa-check"></i>');
    buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>');

    buttons = form.next().find(".navButton a");
    buttons.find(".ui-icon").hide();
    buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
    buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
  }

  function style_delete_form(form) {
    var buttons = form.next().find(".EditButton .fm-button");
    buttons
      .addClass("btn btn-sm btn-white btn-round")
      .find('[class*="-icon"]')
      .hide(); //ui-icon, s-icon
    buttons
      .eq(0)
      .addClass("btn-danger")
      .prepend('<i class="ace-icon fa fa-trash-o"></i>');
    buttons
      .eq(1)
      .addClass("btn-default")
      .prepend('<i class="ace-icon fa fa-times"></i>');
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
    buttons
      .find('.EditButton a[id*="_reset"]')
      .addClass("btn btn-sm btn-info")
      .find(".ui-icon")
      .attr("class", "ace-icon fa fa-retweet");
    buttons
      .find('.EditButton a[id*="_query"]')
      .addClass("btn btn-sm btn-inverse")
      .find(".ui-icon")
      .attr("class", "ace-icon fa fa-comment-o");
    buttons
      .find('.EditButton a[id*="_search"]')
      .addClass("btn btn-sm btn-purple")
      .find(".ui-icon")
      .attr("class", "ace-icon fa fa-search");
  }

  function beforeDeleteCallback(e) {
    var form = $(e[0]);
    if (form.data("styled")) return false;

    form
      .closest(".ui-jqdialog")
      .find(".ui-jqdialog-titlebar")
      .wrapInner('<div class="widget-header" />');
    style_delete_form(form);

    form.data("styled", true);
  }

  function beforeEditCallback(e) {
    var form = $(e[0]);
    form
      .closest(".ui-jqdialog")
      .find(".ui-jqdialog-titlebar")
      .wrapInner('<div class="widget-header" />');
    style_edit_form(form);
  }

  //it causes some flicker when reloading or navigating grid
  //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
  //or go back to default browser checkbox styles for the grid
  function styleCheckbox(table) {
    /**
        $(table).find('input:checkbox').addClass('ace')
        .wrap('<label />')
        .after('<span class="lbl align-top" />')


        $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
        .find('input.cbox[type=checkbox]').addClass('ace')
        .wrap('<label />').after('<span class="lbl align-top" />');
    */
  }

  //unlike navButtons icons, action icons in rows seem to be hard-coded
  //you can change them like this in here if you want
  function updateActionIcons(table) {
    /**
        var replacement = 
        {
            'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
            'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
            'ui-icon-disk' : 'ace-icon fa fa-check green',
            'ui-icon-cancel' : 'ace-icon fa fa-times red'
        };
        $(table).find('.ui-pg-div span.ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
        })
        */
  }

  //replace icons with FontAwesome icons like above
  function updatePagerIcons(table) {
    var replacement = {
      "ui-icon-seek-first": "ace-icon fa fa-angle-double-left bigger-140",
      "ui-icon-seek-prev": "ace-icon fa fa-angle-left bigger-140",
      "ui-icon-seek-next": "ace-icon fa fa-angle-right bigger-140",
      "ui-icon-seek-end": "ace-icon fa fa-angle-double-right bigger-140",
    };
    $(
      ".ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon"
    ).each(function () {
      var icon = $(this);
      var $class = $.trim(icon.attr("class").replace("ui-icon", ""));

      if ($class in replacement)
        icon.attr("class", "ui-icon " + replacement[$class]);
    });
  }

  function enableTooltips(table) {
    $(".navtable .ui-pg-button").tooltip({ container: "body" });
    $(table).find(".ui-pg-div").tooltip({ container: "body" });
  }

  //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

  $(document).one("ajaxloadstart.page", function (e) {
    $.jgrid.gridDestroy(grid_selector);
    $(".ui-jqdialog").remove();
  });
});
