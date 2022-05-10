<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>

        <li>
          <a href="#">Gestión de proyectos</a>
        </li>
        <li>
          <a href="#">Gestión Nutricional</a>
        </li>
        <li>
          <a href="#">Insumos - Tabla Nuricional</a>
        </li>

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
                    foreach ($data as $value) {
                      echo '<tr>
                              <td class="hidden-480">' . $value["supplyName"] . '</td>
                              <td class="hidden-480">' . $value["supplyTypeId"] . '</td>
                              <td class="hidden-480">' . $value["caloricValue"] . '</td>
                              <td class="hidden-480">' . $value["proteinValue"] . '</td>
                              <td class="hidden-480">' . $value["fatValue"] . '</td>
                              <td class="hidden-480">' . $value["carbohydratesValue"] . '</td>
                              <td>
                                <div class="hidden-sm hidden-xs action-buttons">                                                            
                                    <a class="green" href="#">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    <a class="red" href="tabla_nutricional/eliminar_insumo/'.$value["supplyId"].'">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                  </a>
                                </div>
                                  <div class="hidden-md hidden-lg">
                                  <div class="inline pos-rel">
                                    <button
                                      class="btn btn-minier btn-yellow dropdown-toggle"
                                      data-toggle="dropdown"
                                      data-position="auto">
                                      <i
                                        class="ace-icon fa fa-caret-down icon-only bigger-120"
                                      ></i>
                                    </button>
                                    <ul
                                      class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                      <li>
                                        <a
                                          href="#"
                                          class="tooltip-info"
                                          data-rel="tooltip"
                                          title="View"
                                        >
                                          <span class="blue">
                                            <i
                                              class="ace-icon fa fa-search-plus bigger-120"
                                            ></i>
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
                                            
                                            <iclass="ace-icon fa fa-pencil-square-o bigger-120"></i>
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
                                          title="Delete"
                                        >
                                          <span class="red">
                                            <i
                                              class="ace-icon fa fa-trash-o bigger-120"
                                            ></i>
                                          </span>
                                        </button>
                                        </form>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </td>
                            </tr>';
                    }

                    ?>

                  </tbody>
                </table>

                <div id="modal-form" class="modal" tabindex="-1">
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
                                <select class="chosen-select form-control" id="form-field-select-3" required data-placeholder="Seleciona el tipo" name="supplyType">
                                  <option value=""> </option>
                                  <?php
                                  foreach ($dataTypeSupply as $key => $value) {
                                    echo '<option value="' . $value["supplyTypeId"] . '">' . $value["supplyTypeName"] . '  </option>';
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
                            Cancel
                          </button>

                          <button class="btn btn-sm btn-primary" type="submit">
                            <i class="ace-icon fa fa-check"></i>
                            Save
                          </button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div><!-- PAGE CONTENT ENDS -->
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