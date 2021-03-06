jQuery(function ($) {
  var grid_selector = "#grid-table";
  var pager_selector = "#grid-pager";

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

  //if your grid is inside another element, for example a tab pane, you should use its parent's width:
  /**
    $(window).on('resize.jqGrid', function () {
        var parent_width = $(grid_selector).closest('.tab-pane').width();
        $(grid_selector).jqGrid( 'setGridWidth', parent_width );
    })
    //and also set width when tab pane becomes visible
    $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      if($(e.target).attr('href') == '#mygrid') {
        var parent_width = $(grid_selector).closest('.tab-pane').width();
        $(grid_selector).jqGrid( 'setGridWidth', parent_width );
      }
    })
    */
  function validate_name(value, colname) {
    value=value.toLowerCase();
    if (value=="")
    {
      return [false,"El nombre no puede estar vacío"];
    }
    if (/^[a-z\s]+$/.test(value) && value.length <=60) {
      return [true,""]
    }
    else{
      return [false,"nombre no válido"];
    }
  }
  function validate_last_name(value, colname) {
    value=value.toLowerCase();
    if (colname=="Primer Apellido" && value=="")
    {
      return [false,"El apellido no puede estar vacío"];
    }
    if(colname=="Segundo Apellido" && value=="" ) {
      return [true,""];
    } 
    if (/^[a-z\s]+$/.test(value) && value.length <=60 ) {
      return [true,""]
    }
    else{
      return [false,"apellido no válido"];
    }
  }
  function validate_date_of_birth(value, colname){
    
    var fecha = value.split("-");
    var fecha_select=new Date(fecha[0],fecha[1]-1,fecha[2]);
    var fecha_min=new Date();
    fecha_min.setMonth(fecha_min.getMonth()-840)
    var today = new Date();
    if (fecha_select>fecha_min && fecha_select < today )   
      return [true,""];    
    else
    return [false,"la fecha de nacimiento no válida"];
  }
  function validate_ci(value, colname){
    if (/^[0-9]+$/.test(value) && value.length <=13) {
      return [true,""]
    }
    else{
      return [false,"C.I no válido "];
    }
  }
  jQuery(grid_selector)
    .jqGrid({
      //direction: "rtl",

      //subgrid options
      subGrid: false,
      //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
      //datatype: "xml",
      subGridOptions: {
        plusicon: "ace-icon fa fa-plus center bigger-110 blue",
        minusicon: "ace-icon fa fa-minus center bigger-110 blue",
        openicon: "ace-icon fa fa-chevron-right center orange",
      },
      //for this example we are using local data
      url: "getClients",
      datatype: "json",
      height: 400,
      colNames: [
        "",
        "ID",
        "Codigo de Cliente",
        "Nombre",
        "Primer Apellido",
        "Segundo Apellido",
        "Fecha de Nacimiento",
        "Nro. Carnet",
        "Estado",
      ],
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
            //delbutton: false,//disable delete button

            delOptions: {
              recreateForm: true,
              beforeShowForm: beforeDeleteCallback,
            },
            //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
          },
        },
        {
          name: "clientId",
          index: "clientId",
          width: 60,
          editable: true,
          sorttype: "id",
        },
        {
          name: "clientCode",
          index: "clientCode",
          width: 90,
          editable: true,
        },
        {
          name: "clientName",
          index: "clientName",
          width: 100,
          editable: true,
          editrules: { custom: true, custom_func: validate_name },
          edittype: "text",
        },
        {
          name: "clientLastName1",
          index: "clientLastName1",
          editrules: { custom: true, custom_func: validate_last_name},
          width: 120,
          editable: true,
        },
        {
          name: "clientLastName2",
          index: "clientLastName2",
          width: 120,
          editrules: { custom: true, custom_func: validate_last_name},
          editable: true,
        },
        {
          name: "dateOfBirth",
          index: "dateOfBirth",
          width: 110,
          editable: true,
          editrules: { custom: true, custom_func: validate_date_of_birth},
          sorttype: "date",
          unformat: pickDate,
        },
        {
          name: "clientCI",
          index: "clientCI",
          width: 90,
          editable: true,
          editrules: { custom: true, custom_func: validate_ci},
        },
        {
          name: "status",
          index: "status",
          width: 80,
          sortable: true,
          editable: true,
          edittype: "select",
          editoptions: { value: "1:Activo;2:Inactivo" },
          unformat: aceSwitch,
        },
      ],

      pager: pager_selector,
      rowNum: 10,
      rowList: [10, 20, 30],
      sortname: "clientCode",
      sortorder: "asc",
      viewrecords: true,
      gridview: true,
      autoencode: true,
      altRows: true,
      //toppager: true,

      loadComplete: function () {
        var table = this;
        setTimeout(function () {
          styleCheckbox(table);

          updateActionIcons(table);
          updatePagerIcons(table);
          enableTooltips(table);
        }, 0);
      },

      editurl: "crudClient", //nothing is saved
      caption: "Lista de Clientes",

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
    })
    .hideCol("clientId");
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
      $(cell).find("input[type=text]").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
      });
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
      add: true,
      addicon: "ace-icon fa fa-plus-circle purple",
      del: false,
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
      multipleSearch: false,
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
    form.find("input[name=dateOfBirth]").datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
    });

    form
      .find("input[name=status]")
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
    $(table)
      .find("input:checkbox")
      .addClass("ace")
      .wrap("<label />")
      .after('<span class="lbl align-top" />');

    $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
      .find("input.cbox[type=checkbox]")
      .addClass("ace")
      .wrap("<label />")
      .after('<span class="lbl align-top" />');
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
    $(".navtable .ui-pg-button").tooltip({
      container: "body",
    });
    $(table).find(".ui-pg-div").tooltip({
      container: "body",
    });
  }

  //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

  $(document).one("ajaxloadstart.page", function (e) {
    $.jgrid.gridDestroy(grid_selector);
    $(".ui-jqdialog").remove();
  });
});
