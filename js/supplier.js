var pager_selector = "#pager";
jQuery(function () {
    $(".grid_tab").on("shown.bs.tab", function () {
      $($(this).attr("href"))
        .find("#suppliers-table")
        .jqGrid(
          "setGridWidth",
          $($(this).attr("href")).find(".jqgrid_box").width()
        );
    });

    $("#suppliers-table")
      .jqGrid({
        url: "getSuppliers",
        datatype: "json",
        colNames: ["", "ID", "Nombre", "Tipo", "Dirección" , "Teléfono 1" , "Teléfono 2" , "Teléfono 3" , "Correo Electrónico" , "Estado"],
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
            name: "supplierId",
            editable: true,
          },
          {
            name: "type",
            width: 100,
            editable: true,
            edittype: "select",
            editoptions: { value: "1:Empresa;2:Persona Natural" },
          },
          {
            name: "name",
            width: 100,
            editable: true,
          },
          {
            name: "address",
            width: 100,
            editable: true,
          },
          {
            name: "phone1",
            width: 100,
            editable: true,
          },
          {
            name: "phone2",
            width: 100,
            editable: true,
          },
          {
            name: "phone3",
            width: 100,
            editable: true,
          },
          {
            name: "gmail",
            width: 100,
            editable: true,
          }
        ],
        pager: pager_selector,
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "asc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        altRows: true,
  
        loadComplete: function () {
          var table = this;
          setTimeout(function () {
            updateActionIcons(table);
            updatePagerIcons(table);
            enableTooltips(table);
          }, 0);
        },
        editurl: "crudSuppliers", //nothing is saved
      })
      .hideCol("supplierId");
    jQuery("#suppliers-table").jqGrid(
      "navGrid",
      "#pager",
      {
        edit: false,
        editicon: "ace-icon fa fa-pencil blue",
        add: true,
        addicon: "ace-icon fa fa-plus-circle purple",
        del: false,
        delicon: "ace-icon fa fa-trash-o red",
        search: false,
        searchicon: "ace-icon fa fa-search orange",
        refresh: true,
        refreshicon: "ace-icon fa fa-refresh green",
        view: false,
        viewicon: "ace-icon fa fa-search-plus grey",
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
    function style_edit_form(form) {
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