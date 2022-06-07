jQuery(function ($) {
    var grid_selector = "#nutritional_table";
    var pager_selector = "#pager";
  
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
    function validate_supply_name(value, colname) {
      value = value.toLowerCase();
      if (value == "") {
        return [false, "El Nombre no puede estar vacío"];
      }
      if (/^[0-9a-zA-Z\s\.]+$/.test(value) && value.length <= 45) {
        return [true, ""];
      } else {
        return [false, "El Nombre solo se admite letras, números y ."];
      }
    }
    function validate_cho(value, colname) {
      if (value == "") {
        return [false, "La cantidad de Carbohidratos no puede estar vacía"];
      }
      if (value == 0) {
        return [false, "La cantidad de Carbohidratos no puede ser 0"];
      }
      if (/^(\d{1,4})(\.\d{1,2})?$/.test(value)) {
        return [true, ""];
      } else {
        return [false, "formato de Carbohidratos incorrecto"];
      }
    }
    function validate_fat(value, colname) {
      if (value == "") {
        return [false, "La cantidad de grasa no puede estar vacía"];
      }
      if (value == 0) {
        return [false, "La cantidad de grasa no puede ser 0"];
      }
      if (/^(\d{1,4})(\.\d{1,2})?$/.test(value)) {
        return [true, ""];
      } else {
        return [false, "formato de grasa incorrecto"];
      }
    }
    function validate_protein(value, colname) {
      if (value == "") {
        return [false, "La cantidad de Proteína no puede estar vacía"];
      }
      if (value == 0) {
        return [false, "La cantidad de Proteína no puede ser 0"];
      }
      if (/^(\d{1,4})(\.\d{1,2})?$/.test(value)) {
        return [true, ""];
      } else {
        return [false, "formato de Proteína incorrecto"];
      }
    }
    function validate_caloric(value, colname) {
      if (value == "") {
        return [false, "La cantidad de Calorías no puede estar vacía"];
      }
      if (value == 0) {
        return [false, "La cantidad de Calorías no puede ser 0"];
      }
      if (/^(\d{1,4})(\.\d{1,2})?$/.test(value)) {
        return [true, ""];
      } else {
        return [false, "formato de Calorías incorrecto"];
      }
    }
    function imageFormat(cellvalue, options, rowObject) {
      return '<img src="' + cellvalue + '" style="height:50px" />';
    }
    function imageUnFormat(cellvalue, options, cell) {
      return $("img", cell).attr("src");
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
        url: "getSupplyTable",
        datatype: "JSON",
        height: 400,
        colNames: [
          "ID",
          "Imagen",
          "Nombre del insumo",
          "Tipo de Insumo",
          "Valor  Calórico",
          "Valor de Proteína",
          "Valor de Grasa",
          "Valor de Carbohidrato",
        ],
        colModel: [
          {
            name: "supplyId",
            index: "supplyId",
            width: 60,
            editable: true,
            sorttype: "id",
          },
          {
            name: "image",
            index: "image",
            width: 60,
            editable: true,         
            edittype: "file",
            editoptions: {
              enctype: "multipart/form-data",
              accept:"image/*"
            },
            formatter: imageFormat,
            unformat: fileStyle,
          },
          {
            name: "supplyName",
            index: "supplyName",
            width: 90,
            editable: true,
            editrules: { custom: true, custom_func: validate_supply_name,required:true },
          },
          {
            name: "supplyTypeName",
            index: "supplyTypeName",
            width: 100,
            editable: true,
            //editrules: { custom: true, custom_func: validate_product_price },
            edittype: "select",
            editoptions: { dataUrl: "getOptionsSupplyType" },
            
            unformat: aceSwitch,
          },
          {
            name: "caloricValue",
            index: "caloricValue",
            width: 120,
            editable: true,
            editrules: { custom: true, custom_func: validate_caloric,required:true },
          },
          {
            name: "proteinValue",
            index: "proteinValue",
            width: 120,
            editable: true,
            editrules: { custom: true, custom_func: validate_protein,required:true },
          },
          {
            name: "fatValue",
            index: "fatValue",
            width: 120,
            editable: true,
            editrules: { custom: true, custom_func: validate_fat,required:true },
          },
          {
            name: "carbohydratesValue",
            index: "carbohydratesValue",
            width: 120,
            editable: true,
            editrules: { custom: true, custom_func: validate_cho,required:true },
          },
        ],
  
        pager: pager_selector,
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "supplyName",
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
        },
  
        editurl: "crudSupply", //nothing is saved
        caption: "Lista de Insumos",
        autowidth: true,
        /*grouping: true,
        groupingView: {
          groupField: ["productCategoryId"],
          groupDataSorted: true,
          plusicon: "fa fa-chevron-down bigger-110",
          minusicon: "fa fa-chevron-up bigger-110",
        },
        caption: "Grouping",*/
      })
      .hideCol("supplyId");
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
    function fileStyle(cellvalue, options, cell) {
      setTimeout(function () {
        $(cell)
          .find("input[type=file]")
          .addClass(" ace-icon ace-icon fa fa-cloud-upload")        
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
        edit: true,
        editicon: "ace-icon fa fa-pencil blue",
        add: true,
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
        editCaption: "Editar Registro",
        bSubmit: "Editar",
        bCancel: "Cancelar",
        closeAfterEdit: true,
        recreateForm: true,
        onInitializeForm: function (formid) {
          $(formid).attr("method", "POST");
          $(formid).attr("enctype", "multipart/form-data");
        },
        beforeShowForm: function (e) {
          var form = $(e[0]);
          form
            .closest(".ui-jqdialog")
            .find(".ui-jqdialog-titlebar")
            .wrapInner('<div class="widget-header" />');
          style_edit_form(form);
        },
        afterSubmit: function (response, postdata) {
          if ($("#image").val() != "") {
            ajaxFileUpload(postdata["id"],postdata["oper"]);
          } else {
            console.log("no entro img");
          }
  
          return [true, ""];
        },
      },
      {
        //new record form
        //width: 700,
        addCaption: "Agregar Registro",
        bSubmit: "Agregar",
        bCancel: "Cancelar",
        closeAfterAdd: true,
        recreateForm: true,
        viewPagerButtons: false,
        onInitializeForm: function (formid) {
          $(formid).attr("method", "POST");
          $(formid).attr("enctype", "multipart/form-data");
        },
        beforeShowForm: function (e) {
          var form = $(e[0]);
          form
            .closest(".ui-jqdialog")
            .find(".ui-jqdialog-titlebar")
            .wrapInner('<div class="widget-header" />');
          style_edit_form(form);
        },
        afterSubmit: function (response, postdata) {
          id=response["responseText"];
          if ($("#image").val() != "") {
            ajaxFileUpload(id,postdata["oper"]);
          } else {
            console.log("no entro img");
          }
          return [true, ""];
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
          form
              .find("img")
              .css("height","250");
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
  
    function ajaxFileUpload(id,oper) {
      
      $.ajaxFileUpload({
        url: 'crudSupply',
        secureuri: false,
        fileElementId: "image",
        dataType: "JSON",
        data: { id: id,oper:oper },
        success: function (data, status) {
          return true;        
        },
        error: function (data, status, e) {
          return alert(e);
        },
      });
    }
  });
  