<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url(); ?>/inicio">Inicio</a>
                </li>
                <li><a href="#">Ventas</a></li>
                <li class="active">Realizar Ventas</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6" >
                    <div class="row">
                        <?php foreach ($productsList as $value) { ?>
                        <div class="col-sm-6" style="width:250px;">
                            <div class="thumbnail search-thumbnail" id="card_<?php echo $value->productId; ?>">
                                <img class="media-object" src="<?php echo base_url("images/product-images")."/".$value->productId.".jpg"; ?>" style="width:200px; height:200px;" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button class="ace-icon btn btn-success btn-block" id="add_<?php echo $value->productId."_".$value->productName."_".$value->categoryName."_".$value->productPrice; ?>" onclick="changeList(this)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="ace-icon btn btn-danger btn-block" id="subtract_<?php echo $value->productId."_".$value->productName."_".$value->categoryName."_".$value->productPrice; ?>" onclick="changeList(this)"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3 class="search-title"><a class="blue"><?php echo $value->productName; ?></a></h3>
                                    <p><?php echo $value->productPrice; ?> bs.</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="search-area well well-sm" id="productListDiv">
                        <b class="gray bigger-150">Debe agregar productos a la lista</b>
                    </div>
                    <div id="productListButton">
                        <b class="gray bigger-150">Total: Bs. 0</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.main-content -->
<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">Ace</span> Application &copy; 2013-2014
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
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->
<!--[if !IE]> -->
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . '/assets/' ?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url() . '/assets/' ?>/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>/assets/js/holder.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url() . '/assets/' ?>/js/ace-elements.min.js"></script>
<script src="<?php echo base_url() . '/assets/' ?>/js/ace.min.js"></script>

<script type="text/javascript">
var products = [];
function changeList(button) {

    const getIDandAction = (button.id).split("_");
    let action = getIDandAction[0];
    let productId = getIDandAction[1];
    let productName = getIDandAction[2];
    let categoryName = getIDandAction[3];
    let productPrice = getIDandAction[4];
    let productQuantity = 0;
    let productExist = false;
    let productIndex = -1;
    let buttonExist = false;

    for (var i = 0; i < Object.keys(products).length; i++) {
        if(products[i][0] == productId) {
            productQuantity = products[i][1];
            productExist = true;
            productIndex = i;
        }
    }

    switch(action) {
        case "add": productQuantity++;
            break;
        case "subtract": productQuantity--;
            break;
    }

    if(productQuantity >= 0){
        product = [productId, productQuantity, productName, categoryName, productPrice];
        if(productExist) products[productIndex] = product;
        else products.push(product);
    }

    document.getElementById("productListDiv").innerHTML = "";
    document.getElementById("productListButton").innerHTML = "";

    for (var i = 0; i < products.length; i++) {
        if(products[i][1] > 0){
            var addMedia = `<div class="media search-media" style="background-color:white;">
                    <div class="media-left">
                        <a><img class="media-object" src="<?php echo base_url("images/product-images")."/"?>` + products[i][0] + `.jpg" style="width:100px; height:100px;"/></a>
                    </div>
                    <div class="media-body">
                        <div>
                            <h4 class="media-heading">
                                <h3 class="search-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="blue bolder" style="font-size:18px;">` + products[i][2] + `</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="blue" style="font-size:18px;">Cantidad: </span>
                                            <span class="blue" style="font-size:18px;">` + products[i][1] + `</span>
                                        </div>
                                    </div>
                                </h3>
                            </h4>
                        </div>

                        <div class="search-actions text-center">
                            
                            <span class="blue bigger-150">Bs.</span>
                            <span class="blue bigger-150">` + products[i][4] + `</span>
                            <div class="action-buttons bigger-125">
                                <a href="#">
                                    <i class="ace-icon fa fa-phone green"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-heart red"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-star orange2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>`;
            document.getElementById("productListDiv").appendChild(createElementFromHTML(addMedia));
        }
    }

    if(productQuantity == 0) products.splice(productIndex, 1);
    
    if(products.length == 0){
        var addMedia = `<b class="gray bigger-150">Debe agregar productos a la lista</b>`;
        document.getElementById("productListDiv").appendChild(createElementFromHTML(addMedia));
    } else {
        var addMedia = `<form id='form' action="<?php echo base_url('ventas/procesando_venta') ?>" method="post">
                        <input id='myarray' name='myarray' type='hidden' value=''>
                        <button type="submit" class="btn btn-lg btn-success pull-right">
                            Realizar Venta<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                        </form>`;
        document.getElementById("productListButton").appendChild(createElementFromHTML(addMedia));
    }
    var res=[];
    for (let index = 0; index < products.length; index++) {
        res.push([products[index][0],products[index][1]]);     
    }
    $('#myarray').val( JSON.stringify(res));
}

function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}
</script>

</body>

</html>