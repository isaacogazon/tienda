<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Producto</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <!--<div class="row">-->
                <div class="col-md-12">
                    <!--contenido -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="product-images">
                                    <div class="thumbs" style="margin: 15px;">
                                        <img height="230" src="<?php echo base_url() . $producto->imagen ?>" alt="<?= $producto->nombre ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <!-- Product content -->
                                <div class="product-content">
                                    <div class="box">

                                        <!-- Tab panels' navigation -->
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#product" data-toggle="tab">
                                                    <i class="fa fa-reorder fa-lg"></i>
                                                    <span class="hidden-xs">Producto</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#shipping" data-toggle="tab">
                                                    <i class="fa fa-truck fa-lg"></i>
                                                    <span class="hidden-xs">Shipping</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#returns" data-toggle="tab">
                                                    <i class="fa fa-undo fa-lg"></i>
                                                    <span class="hidden-xs">Returns</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End Tab panels' navigation -->


                                        <!-- Tab panels container -->

                                        <div class="tab-content">

                                            <!-- Product tab -->
                                            <div class="tab-pane active" id="product" style="margin: 10px;">
                                                <form action="<?php echo site_url();?>/carrito/inserta" method="post">

                                                    <div class="details">
                                                        <input type="hidden" name="id" value="<?= $producto->id ?>">
                                                        <h1><?= $producto->nombre ?></h1><input type="hidden" name="nombre" value="<?= $producto->nombre ?>">
                                                        <div class="prices"><span class="price"><?= $producto->precio ?>€<input type="hidden" name="precio" value="<?= $producto->precio ?>"></span></div>
                                                        <div class="prices"><span class="price"><p class="text-danger"><?= $producto->descuento ?>% DESCUENTO<input type="hidden" name="descuento" value="<?= $producto->descuento ?>"></p></span></div>
                                                    </div>
                                                    <div class="short-description">
                                                        <p><?= $producto->descripcion ?></p>
                                                    </div>
                                                    <div class="col-5 form-group has-feedback">
                                                        <input type="text" class="form-control" value="1" name="cantidad">
                                                        <span class="glyphicon glyphicon-share-alt form-control-feedback"></span>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block-xs" data-toggle="modal" data-target="#added">
                                                            <!--<a href="<?//php echo base_url()?>carrito/inserta" style="color: white;">--><i class="fa fa-plus"></i> &nbsp; Añadir al carrito<!--</a>-->
                                                        </button>
                                                    </div>
                                                </form>						
                                            </div>
                                            <!-- End id="product" -->

                                            <!-- Shipping tab -->
                                            <div class="tab-pane" id="shipping">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                                <p><img class="img-thumbnail" src="http://www.tfingi.com/repo/royal-mail.png" alt=""><img class="img-thumbnail" src="http://www.tfingi.com/repo/ups-logo.png" alt=""></p>
                                                <p>Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                <h6><em class="fa fa-gift"></em> Giftwrap?</h6>
                                                <p>Let us take care of giftwrapping your presents by selecting <strong>Giftwrap</strong> in the order process. Eligible items can be giftwrapped for as little as £0.99, and larger items may be presented in gift bags.</p>						
                                            </div>
                                            <!-- End id="shipping" -->

                                            <!-- Returns tab -->
                                            <div class="tab-pane" id="returns">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                <p class="lead">For any unwanted goods La Boutique offers a <strong>21-day return policy</strong>.</p>
                                                <p>If you receive items from us that differ from what you have ordered, then you must notify us as soon as possible using our <a href="#">online contact form</a>.</p>
                                                <p>If you find that your items are faulty or damaged on arrival, then you are entitled to a repair, replacement or a refund. Please note that for some goods it may be disproportionately costly to repair, and so where this is the case, then we will give you a replacement or a refund.</p>
                                                <p>Please visit our <a href="#">Warranty section</a> for more details.</p>						
                                            </div>
                                            <!-- End id="returns" -->
                                        </div>                                            
                                        <!-- End tab panels container -->
                                    </div>
                                </div>                                    
                                <!-- End class="product-content" -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </div>
        <!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

