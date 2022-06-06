<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li class="active">
					<i class="ace-icon fa fa-home home-icon"></i>
					Inicio
				</li>
                <li>
					<a href="#">Aprovisionamiento y Cadena de Suministro</a>
				</li>
				<li class="active">
					Proveedores
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="page-header">
                        <h1>
                            Lista de Proveedores
                        </h1>
                    </div><!-- /.page-header -->
                    <div class="row">
                        <div class="col-sm-8 col-xs-12 clearfix">
                            <a href="#modalAddSupplier" class="btn btn-sm btn-success" data-toggle="modal">
								<i class="ace-icon fa fa-plus"></i>
								Nuevo Proveedor
                            </a>
                        </div>
                        <div class="col-sm-4 col-xs-12 clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                    </div>
                    <div class="table-header">
                        Proveedores
                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div class="table-responsive">
                        <div class="dataTables_borderWrap">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono 1</th>
                                        <th>Teléfono 2</th>
                                        <th>Correo Electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $index = 1;
                                        foreach($data as $value) { ?>
                                            <tr>
                                                <td class="center"><?php echo $index; ?></td>
                                                <td>
                                                    <?php 
                                                        if($value['legalEntityName']!=null){
                                                            echo $value['legalEntityName'];
                                                        }
                                                        elseif($value['name']!=null)
                                                            echo $value['name']." ".$value['lastName1']." ".$value['lastName2']; 
                                                    ?>
                                                </td>
                                                <td><?php echo $value['address']; ?></td>
                                                <td><?php echo $value['phone1']; ?></td>
                                                <td><?php echo $value['phone2']; ?></td>
                                                <td><?php echo $value['gmail']; ?></td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green" href="#modalUpdateSupplier<?php echo $value["supplierId"]; ?>" data-toggle="modal">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red" href="#modalDeleteSupplier<?php echo $value["supplierId"]; ?>" data-toggle="modal">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>

                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                
                                                                <li>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" value=""/>
                                                                        <button	type="submit" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                            <span class="green">
                                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <li>
                                                                    <form>
                                                                        <input type="hidden" value="">
                                                                        <button	type="submit" class="tooltip-error"	data-rel="tooltip" title="Delete">
                                                                            <span class="red">
                                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        $index++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- ADD SUPPLIER MODAL STARTS -->
                        <div id="modalAddSupplier" class="modal" tabindex="-1">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">Nuevo Proveedor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form class="form-horizontal" role="form" action="lista_proveedores/registrar_proveedor" method="POST">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Tratamiento: </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="form-field-select-1" onChange="treatmentType()" name="treatment">
                                                                <option value="" selected disabled>Seleccionar tipo de tratado</option>
                                                                <option value="1">Empresa</option>
                                                                <option value="2">Persona Natural</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="divLegalEntity" hidden>
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="legalEntityName" placeholder="Nombre de la Empresa" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                                    <div id="divNaturalPerson" hidden>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" name="name" placeholder="Nombre" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Primer Apellido: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" name="lastName1" placeholder="Primer Apellido" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Segundo Apellido: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" name="lastName2" placeholder="Segundo Apellido" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="address" placeholder="Dirección" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-2"> Teléfono 1: </label>
                                                        <div class="col-sm-9">
                                                            <input class="input-mask-phone col-xs-10 col-sm-5" name="phone1" placeholder="Teléfono 1" type="text" id="form-field-mask-2" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono 2: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="phone2" placeholder="Teléfono 2" class=" input-mask-phone col-xs-10 col-sm-5" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono 3: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="phone3" placeholder="Teléfono 3" class="input-mask-phone col-xs-10 col-sm-5" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo electrónico: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="gmail"  placeholder="Correo electrónico" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="space"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <button class="btn btn-block" type="button" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                    <button type="submit" class="btn btn-success btn-block">Añadir Proveedor</button>
                                                
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ADD SUPPLIER MODAL ENDS -->
                        <!-- UPDATE SUPPLIER MODAL STARTS -->
                        <?php foreach ($data as $value) { ?>
                        <div id="modalUpdateSupplier<?php echo $value["supplierId"]; ?>" class="modal" tabindex="-1">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">Editar Proveedor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form class="form-horizontal" id="form" role="form" action="<?php echo 'lista_proveedores/editar_proveedor/' . $value["supplierId"]; ?>" method="POST">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Tratamiento: </label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="form-field-select-2" disabled  >
                                                                <option value="" disabled>Seleccionar tipo de tratado</option>
                                                                <option value="1" <?php if($value['treatment']==1) echo "selected" ?>>Empresa</option>
                                                                <option value="2" <?php if($value['treatment']==2) echo "selected" ?>>Persona Natural</option>
                                                            </select>
                                                        </div>
                                                        <input hidden value="<?php echo $value['treatment']; ?>" name="treatment"/>
                                                    </div>
                                                    <div class="form-group" id="divLegalEntity" <?php if($value['treatment']==2) echo "hidden"; ?>>
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" value="<?php echo $value["legalEntityName"]; ?>" name="legalEntityName" placeholder="Nombre de la Empresa" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                                    <div id="divNaturalPerson" <?php if($value['treatment']==1) echo "hidden"; ?>>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" value="<?php echo $value["name"]; ?>" name="name" placeholder="Nombre" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Primer Apellido: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" name="lastName1" value="<?php echo $value["lastName1"]; ?>" placeholder="Primer Apellido" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Segundo Apellido: </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="form-field-1" name="lastName2" value="<?php echo $value["lastName2"]; ?>" placeholder="Segundo Apellido" class="col-xs-10 col-sm-5" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="address" value="<?php echo $value["address"]; ?>" placeholder="Dirección" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-2"> Teléfono 1: </label>
                                                        <div class="col-sm-9">
                                                            <input class="input-mask-phone col-xs-10 col-sm-5" value="<?php echo $value["phone1"]; ?>" name="phone1" placeholder="Teléfono 1" type="text" id="form-field-mask-2" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono 2: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="phone2" value="<?php echo $value["phone2"]; ?>" placeholder="Teléfono 2" class=" input-mask-phone col-xs-10 col-sm-5" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono 3: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="phone3" value="<?php echo $value["phone3"]; ?>" placeholder="Teléfono 3" class="input-mask-phone col-xs-10 col-sm-5" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo electrónico: </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="form-field-1" name="gmail" value="<?php echo $value["gmail"]; ?>" placeholder="Correo electrónico" class="col-xs-10 col-sm-7" />
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="space"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <button class="btn btn-block" type="button" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                    <button type="submit" class="btn btn-success btn-block">Añadir Proveedor</button>
                                                
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- UPDATE SUPPLIER MODAL ENDS -->
                        <!-- DELETE DINING AREA MODAL STARTS -->
                        <?php foreach ($data as $value) { ?> 
                        <div id="modalDeleteSupplier<?php echo $value["supplierId"]; ?>" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">Eliminar Proveedor</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>¿Estás seguro de que quieres eliminar el proveedor?</label>
                                            </div>
                                        </div>
                                        <div class="space"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <button class="btn btn-block" type="button" data-dismiss="modal" aria-label="Close">No</button>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <form action="<?php echo 'lista_proveedores/eliminar_proveedor/' . $value["supplierId"]; ?>" method="get">
                                                    <button type="submit" class="btn btn-danger btn-block">Sí, eliminar proveedor</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- DELETE DINING AREA MODAL ENDS -->
                    </div>
				</div><!-- /.col -->
			</div><!-- /.row -->
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
				<a href="https://www.youtube.com/c/Irizam">
					<i class="ace-icon fa fa-youtube-square red bigger-150"></i>
				</a>

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

<!-- page specific plugin scripts -->
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.print.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/jquery.maskedinput.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url().'/assets/'?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url().'/assets/'?>/js/ace.min.js"></script>

<script src="<?php echo base_url()?>/js/supplier.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: true,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					"sScrollXInner": "100%",
					"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50,
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
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
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
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
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
                $.mask.definitions['~']='[+-]';
                $('.input-mask-phone').mask('99999999');

                $("#form").submit(function() {
                    $("#form-field-select-2").prop("disabled", false);
                });
			})
</script>

</body>
</html>