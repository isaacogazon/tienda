
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Productos
            <small>Listado</small>
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
                        <div class="row">
                            <?php foreach ($productos as $producto): ?>   
                            <div class="col-6 col-md-4" style="margin-top: 25px; box-shadow: 5px 10px 18px #888888; border-radius: 10px;">
                                <img class="img-fluid img-portfolio img-hover mb-3" height="210" src="<?php echo base_url(). $producto->imagen ?>" alt="<?= $producto->nombre ?>">
                                    <div class="caption">
                                        <h3 class="pull-left"><a href="<?php echo site_url()?>/principal/producto/<?= $producto->nombre ?>"/><?= $producto->nombre ?></a></h3>
                                        <h4 class="pull-right price-mob">
                                            <span class="product-block-not-available">Stock <?= $producto->stock ?> piezas.</span>
                                        </h4>
                                        <div class="clearfix"><?=$producto->descuento ?>%</div>
                                        <p class="product-block-description hidden-sm-down"><?= $producto->descripcion ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-xs-offset-4 col-md-3 col-md-offset-5">
                                <?= $pagination?>
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