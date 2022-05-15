<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo base_url(); ?>/inicio">Inicio</a>
        </li>
        <li>
          <a>Gestión de proyectos</a>
        </li>
        <li>
          <a>Gestión Nutricional</a>
        </li>
        <li class="active">Insumos - Tabla Nutricional</li>
      </ul>
      <!-- /.breadcrumb -->
      <!-- /.nav-search -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>
          Tabla de Insumos
        </h1>
      </div>
      <!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

          <div class="row">
            <div class="col-xs-12">
              <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
              </div>

              <!-- div.table-responsive -->

              <!-- div.dataTables_borderWrap -->
              <div>

                <h4 class="pink">
                  <i class="ace-icon glyphicon-plus icon-animated-hand-pointer blue"></i>
                  <a href="#modal-form" role="button" class="green" data-toggle="modal"> Agregar Nuevo Insumo </a>
                </h4>
                <!--To edit the elements of the table, edit jquery.dataTables.min.js and jquery.dataTables.bootstrap.min.js-->
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Klc</th>
                      <th>Proteínas</th>
                      <th>Grasas</th>
                      <th>Carbohidratos</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    foreach ($dataSupply as $value) {
                      echo '<tr>
                              <td class="hidden-480">' . $value["supplyName"] . '</td>
                              <td class="hidden-480">' . $value["supplyTypeId"] . '</td>
                              <td class="hidden-480">' . $value["caloricValue"] . '</td>
                              <td class="hidden-480">' . $value["proteinValue"] . '</td>
                              <td class="hidden-480">' . $value["fatValue"] . '</td>
                              <td class="hidden-480">' . $value["carbohydratesValue"] . '</td>
                              <td>
                                <div class="hidden-sm hidden-xs action-buttons">                                                            
                                    <a href="#modalUpdateSupply'.$value["supplyId"].'" role="button" class="green" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    <a href="#modalDeleteSupply'.$value["supplyId"].'" role="button" class="red" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                  </a>
                                </div>
                                  <div class="hidden-md hidden-lg">
                                  <div class="inline pos-rel">
                                    <button
                                      class="btn btn-minier btn-yellow dropdown-toggle"
                                      data-toggle="dropdown"
                                      data-position="auto">
                                      <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>
                                    <ul
                                      class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                      <li>
                                        <a href="#"
                                          class="tooltip-info"
                                          data-rel="tooltip"
                                          title="View">
                                          <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                          </span>
                                        </a>
                                      </li>
                                      <li>
                                        <form action="" method="post">
                                          <input type="hidden" value=""/>
                                          <button
                                          type="submit"
                                          class="tooltip-success"
                                          data-rel="tooltip"
                                          title="Edit">
                                          <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                          </span>
                                        </button>
                                        </form>
                                      </li>
                                      <li>
                                        <form>
                                          <input type="hidden" value="">
                                          <button
                                          type="submit"
                                          class="tooltip-error"
                                          data-rel="tooltip"
                                          title="Delete">
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
                            </tr>';
                    } ?>
                  </tbody>
                </table>

                <div id="modal-form" class="modal" tabindex="-1"> <!-- INSERT SUPPLY MODAL STARTS -->
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="tabla_nutricional/registrar_insumo" method="post">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="blue bigger">Agregar Nuevo Insumo</h4>
                        </div>

                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xs-12 col-sm-5">
                              <div class="space"></div>

                              <input type="file" />
                            </div>

                            <div class="col-xs-12 col-sm-7">
                              <div class="row">
                                <label>Nombre del insumo</label><br>
                                <input type="text" placeholder="Nombre del insumo" name="supplyName" required />
                              </div>
                              <div class="row">
                                <label for="form-field-select-3">Tipo De Insumo</label>

                                <br />
                                <select class="chosen-select form-control" id="form-field-select-3" required data-placeholder="Selecciona el tipo" name="supplyType">
                                  <option value=""> </option>
                                  <?php
                                  foreach ($dataTypeSupply as $key => $value) {
                                    echo '<option value="' . $value["supplyTypeId"] . '">' . $value["supplyTypeName"] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="row">
                                <label>Kcal</label><br>
                                <input class="form" type="number" required placeholder="Valor de kilocalorías" name="caloricValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required />
                              </div>
                              <div class="row">
                                <label>Proteínas</label><br>
                                <input class="form" type="number" required placeholder="Valor de Proteínas" name="proteinValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required />
                              </div>
                              <div class="row">
                                <label>Grasas</label><br>
                                <input class="form" type="number" requiredplaceholder="Valor de Grasas" name="fatValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required />
                              </div>
                              <div class="row">
                                <label>Carbohidratos</label><br>
                                <input class="form" type="number" required placeholder="Valor de Carbohidratos" name="carbohydratesValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required />
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Cancelar
                          </button>

                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="ace-icon fa fa-check"></i>
                            Guardar
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>  <!-- INSERT SUPPLY MODAL STARTS -->

                <?php foreach ($dataSupply as $value) { ?> <!-- UPDATE SUPPLY MODAL STARTS -->
                <div id="modalUpdateSupply<?php echo $value["supplyId"]; ?>" class="modal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="<?php echo 'tabla_nutricional/editar_insumo/' . $value["supplyId"]; ?>" method="post">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="blue bigger">Actualizar Insumo</h4>
                        </div>

                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xs-12 col-sm-5">
                              <div class="space"></div>

                              <input type="file" />
                            </div>

                            <div class="col-xs-12 col-sm-7">
                              <div class="row">
                                <label>Nombre del insumo</label><br>
                                <input type="text" placeholder="Nombre del insumo" name="supplyName" required value="<?php echo $value["supplyName"]; ?>"/>
                              </div>

                              <div class="row">
                                <label for="form-field-select-3">Tipo De Insumo</label>

                                <br />
                                <select class="chosen-select form-control" id="form-field-select-3" required data-placeholder="Selecciona el tipo" name="supplyType" value="<?php echo $value["supplyTypeId"]; ?>">
                                  <option value=""> </option>
                                  <?php
                                  foreach ($dataTypeSupply as $key => $value1) {
                                    if($value["supplyTypeId"] == $value1["supplyTypeId"]) {
                                      echo '<option value="' . $value1["supplyTypeId"] . '" selected>';
                                    }
                                    else {
                                      echo '<option value="' . $value1["supplyTypeId"] . '">';
                                    }
                                    echo $value1["supplyTypeName"];
                                    echo '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="row">
                                <label>Kcal</label><br>
                                <input class="form" type="number" required placeholder="Valor de kilocalorías" name="caloricValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required value="<?php echo $value["caloricValue"]; ?>"/>
                              </div>
                              <div class="row">
                                <label>Proteínas</label><br>
                                <input class="form" type="number" required placeholder="Valor de Proteínas" name="proteinValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required value="<?php echo $value["proteinValue"]; ?>"/>
                              </div>
                              <div class="row">
                                <label>Grasas</label><br>
                                <input class="form" type="number" requiredplaceholder="Valor de Grasas" name="fatValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required value="<?php echo $value["fatValue"]; ?>"/>
                              </div>
                              <div class="row">
                                <label>Carbohidratos</label><br>
                                <input class="form" type="number" required placeholder="Valor de Carbohidratos" name="carbohydratesValue" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required value="<?php echo $value["carbohydratesValue"]; ?>"/>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Cancelar
                          </button>

                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="ace-icon fa fa-check"></i>
                            Guardar
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                <?php } ?> <!-- UPDATE SUPPLY MODAL ENDS -->

                <?php foreach ($dataSupply as $value) { ?> <!-- DELETE SUPPLY MODAL STARTS -->
                <div id="modalDeleteSupply<?php echo $value["supplyId"]; ?>" class="modal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">Eliminar Insumo</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>¿Estás seguro de que quiere eliminar este insumo?</label>
                          </div>
                        </div>
                        <div class="space"></div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <button class="btn btn-block" type="button" data-dismiss="modal" aria-label="Close">No</button>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <form action="<?php echo 'tabla_nutricional/eliminar_insumo/' . $value["supplyId"]; ?>" method="get">
                              <button type="submit" class="btn btn-danger btn-block">Sí, elimina este insumo</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?> <!-- DELETE SUPPLY MODAL ENDS -->
              </div>
            </div>
          </div>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>
<!-- /.main-content -->

<script src="<?php echo base_url() ?>/assets/js/script_new_supply.js"></script>
<!-- /.main-content -->