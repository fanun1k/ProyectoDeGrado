jQuery(function ($) {
  var sampleData = initiateDemoData(); //see below
  $("#tree2").ace_tree({
    dataSource: sampleData["dataSource2"],
    loadingHTML:
      '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
    "open-icon": "ace-icon fa fa-folder-open",
    "close-icon": "ace-icon fa fa-folder",
    itemSelect: true,
    folderSelect: true,
    multiSelect: true,
    "selected-icon": null,
    "unselected-icon": null,
    "folder-open-icon": "ace-icon tree-plus",
    "folder-close-icon": "ace-icon tree-minus",
  });

  /**
			//Use something like this to reload data	
			$('#tree1').find("li:not([data-template])").remove();
			$('#tree1').tree('render');
			*/

  /**
			//please refer to docs for more info
			$('#tree1')
			.on('loaded.fu.tree', function(e) {
			})
			.on('updated.fu.tree', function(e, result) {
			})
			.on('selected.fu.tree', function(e) {
			})
			.on('deselected.fu.tree', function(e) {
			})
			.on('opened.fu.tree', function(e) {
			})
			.on('closed.fu.tree', function(e) {
			});
			*/

  function initiateDemoData() {
    var tree_data_2 = {
      "Capacitación 1": {
        text: "Capacitación 1",
        type: "folder",
        "icon-class": "orange",
      },
      "Capacitación 2": {
        text: "Capacitación 2",
        type: "folder",
        "icon-class": "orange",
      },
      "Capacitación 3": {
        text: "Capacitación 3",
        type: "folder",
        "icon-class": "orange",
      },
      "Capacitación 4": {
        text: "Capacitación 4",
        type: "folder",
        "icon-class": "orange",
      },
    };
    tree_data_2["Capacitación 2"]["additionalParameters"] = {
      children: [
        {
          text: '<i class="ace-icon fa fa-music blue"></i> song1.ogg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-music blue"></i> song2.ogg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-music blue"></i> song3.ogg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-music blue"></i> song4.ogg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-music blue"></i> song5.ogg',
          type: "item",
        },
      ],
    };
    tree_data_2["Capacitación 3"]["additionalParameters"] = {
      children: [
        {
          text: '<i class="ace-icon fa fa-film blue"></i> movie1.avi',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-film blue"></i> movie2.avi',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-film blue"></i> movie3.avi',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-film blue"></i> movie4.avi',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-film blue"></i> movie5.avi',
          type: "item",
        },
      ],
    };
    tree_data_2["Capacitación 1"]["additionalParameters"] = {
      children: {
        wallpapers: {
          text: "Wallpapers",
          type: "folder",
          "icon-class": "pink",
        },
        camera: {
          text: "Camera",
          type: "folder",
          "icon-class": "pink",
        },
      },
    };
    tree_data_2["Capacitación 1"]["additionalParameters"]["children"][
      "wallpapers"
    ]["additionalParameters"] = {
      children: [
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper1.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper2.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper3.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper4.jpg',
          type: "item",
        },
      ],
    };
    tree_data_2["Capacitación 1"]["additionalParameters"]["children"]["camera"][
      "additionalParameters"
    ] = {
      children: [
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo1.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo2.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo3.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo4.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo5.jpg',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-picture-o green"></i> photo6.jpg',
          type: "item",
        },
      ],
    };
    tree_data_2["Capacitación 4"]["additionalParameters"] = {
      children: [
        {
          text: '<i class="ace-icon fa fa-file-text red"></i> document1.pdf',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-file-text grey"></i> document2.doc',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-file-text grey"></i> document3.doc',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-file-text red"></i> document4.pdf',
          type: "item",
        },
        {
          text: '<i class="ace-icon fa fa-file-text grey"></i> document5.doc',
          type: "item",
        },
      ],
    };
    var dataSource2 = function (options, callback) {
      var $data = null;
      if (!("text" in options) && !("type" in options)) {
        $data = tree_data_2; //the root tree
        callback({
          data: $data,
        });
        return;
      } else if ("type" in options && options.type == "folder") {
        if (
          "additionalParameters" in options &&
          "children" in options.additionalParameters
        )
          $data = options.additionalParameters.children || {};
        else $data = {}; //no data
      }

      if ($data != null)
        //this setTimeout is only for mimicking some random delay
        setTimeout(function () {
          callback({
            data: $data,
          });
        }, parseInt(Math.random() * 500) + 200);

      //we have used static data here
      //but you can retrieve your data dynamically from a server using ajax call
      //checkout examples/treeview.html and examples/treeview.js for more info
    };

    return {
      dataSource2: dataSource2,
    };
  }
});
