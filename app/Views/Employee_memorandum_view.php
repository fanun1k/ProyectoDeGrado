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
				<li class="active">Memorándums</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
            <div class="page-header">
				<h1>
                    Memorándums
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
                                            Memorándum
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#allMemorandums">
                                            <i class="blue ace-icon fa fa-table bigger-120"></i>
                                            Visualizar Memorándums
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="memorandumForm" class="tab-pane fade in active">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">Nuevo Memorándum</h4>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form action="memorandum/registrar_memorandum" method="post">
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
															<label for="form-field-8">De: </label>
                                                            <?php if (session()->has('userId')) { ?>
                                                                <input class="form-control collapse" name="employeeId" type="text" id="form-field-8" class="col-xs-6 col-sm-5" value="<?php echo session()->get('userId'); ?>" />
                                                                <?php
                                                            } else if (isset($_COOKIE['userId'])) { ?>
                                                                <input class="form-control collapse" name="employeeId" type="text" id="form-field-8" class="col-xs-6 col-sm-5" value="<?php echo $_COOKIE['userId']; ?>" />
                                                                <?php
                                                            } ?>
                                                            <?php if (session()->has('name')) { ?>
                                                                <input class="form-control" disabled type="text" id="form-field-8" class="col-xs-6 col-sm-5" value="<?php echo session()->get('name').' '.session()->get('lastName1').' '.session()->get('lastName2'); ?>" />
                                                                <?php
                                                            } else if (isset($_COOKIE['name'])) { ?>
                                                                <input class="form-control" disabled type="text" id="form-field-8" class="col-xs-6 col-sm-5" value="<?php echo $_COOKIE['name'].' '.$_COOKIE['lastName1'].' '.$_COOKIE['lastName2']; ?>" />
                                                                <?php
                                                            } ?>
														</div>
                                                        <hr>
                                                        <div>
                                                            <label for="form-field-11">Descripción: </label>
                                                            <textarea id="form-field-11" class="autosize-transition form-control" name="description" style="height: 300px;"></textarea>
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
                                        <p>Aquí va la tabla de todos los memorándums</p>
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