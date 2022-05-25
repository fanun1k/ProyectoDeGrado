<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
                <li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url(); ?>/inicio">Inicio</a>
				</li>
				<li>
					<a>Recursos Humanos</a>
				</li>
				<li>
					<a>Planillas</a>
				</li>
				<li class="active">Permisos / Vacaciones</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
            <div class="page-header">
				<h1>
                    Permisos / Vacaciones
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active">
                                        <a data-toggle="tab" href="#memorandumForm">
                                            <i class="orange ace-icon fa fa-exclamation-circle bigger-120"></i>
                                            Permiso / Vacación
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#allMemorandums">
                                            <i class="blue ace-icon fa fa-table bigger-120"></i>
                                            Visualizar Permiso / Vacaciones
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="memorandumForm" class="tab-pane fade in active">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">Nuevo Permiso / Vacación</h4>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form action="permisos_vacaciones/registrar_permiso_vacacion" method="post">
                                                        <div>
														    <label for="form-field-select-3">Para: </label>
															<br />
															<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Seleccionar empleado..." name="employee">
																<option value="">  </option>
																<?php foreach ($dataEmployee as $key => $value) {
                                                                    echo '<option value="' . $value["employeeId"] . '">' . $value["name"] .' '.$value["lastName1"].' '.$value["lastName2"]. '</option>';
                                                                } ?>
															</select>
														</div>
                                                        <hr>
                                                        <div>
                                                            <label for="timepicker1">Fecha de Inicio: </label>
                                                            <input id="timepicker1" type="date" name="startDate" class="form-control" style="width: 200px;"/>
                                                            
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <label for="timepicker1">Fecha de Fin: </label>
                                                            <input id="timepicker1" name="endDate" type="date" class="form-control" style="width: 200px;" />
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <label for="form-field-11">Descripción: </label>
                                                            <textarea id="form-field-11" class="autosize-transition form-control" name="description" style="height: 200px;"></textarea>
                                                        </div>
                                                        <div class="clearfix form-actions">
                                                            <div class="col-xs-12 center">
                                                                <button class="btn btn-info" type="submit" style="width: 250px;">
                                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                                    Registrar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="allMemorandums" class="tab-pane fade">
                                        <p>Aquí va la tabla de todos los permisos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->