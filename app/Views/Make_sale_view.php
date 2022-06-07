<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li class="active">
                    <i class="ace-icon fa fa-home home-icon"></i>
                    Inicio
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6" >
                    <div class="row">
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="col-sm-6" style="width:250px;">
                            <div class="thumbnail search-thumbnail" id="<?php echo $i; ?>" onclick="addToList(this)">
                                <img class="media-object" src="https://www.196flavors.com/wp-content/uploads/2018/12/pique-macho-3-FP.jpg" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button class="ace-icon btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="ace-icon btn btn-danger btn-block"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3 class="search-title"><a class="blue">Pique</a></h3>
                                    <p>100 bs</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="search-area well well-sm">
                        <div class="media search-media" style="background-color:white;">
                            <div class="media-left">
                                <a><img class="media-object" src="https://www.196flavors.com/wp-content/uploads/2018/12/pique-macho-3-FP.jpg" style="width:80px;"/></a>
                            </div>
                            <div class="media-body" style="vertical-align: middle;">
                                <div>
                                    <h4 class="media-heading">
                                        <h3 class="search-title"><a class="blue">Pique</a></h3>
                                    </h4>
                                </div>

                                <div class="search-actions text-center">
                                    <span class="blue bolder bigger-150">3</span>
                                    <span class="text-info">Bs</span>

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
                        </div>
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



<style type="text/css">
</style>

<script type="text/javascript">
var products = [];
function addToList(card) {
    let productId = card.id;
    let productQuantity = 0;
    let product = [productId, productQuantity];
    products.push(product);
}

</script>

<!-- inline scripts related to this page -->

</body>

</html>