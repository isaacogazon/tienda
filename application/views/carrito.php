<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Carrito
            <small>Listado</small>
        </h1>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <form action="<?php echo site_url('carrito/actualizarCarrito') ?>" method="post">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cantidad</th>
                                <th>Descripción</th>
                                <th style="text-align:right">Precio</th>
                                <th style="text-align:right">Sub-Total</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>

                            <tr>
                                <td><?php
                                    echo form_hidden($i . '[rowid]', $items['rowid']);
                                    echo form_input(array(
                                        'name' => $i . '[qty]',
                                        'value' => $items['qty'],
                                        'maxlength' => '3',
                                        'size' => '5'));
                                    ?>
                                </td>
                                <td>
                                    <?php echo $items['name']; ?>
                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                        <p>
                                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
                                                ?>
                                                <strong><?php echo $option_name; ?>:</strong>
                                                <?php echo $option_value; ?><br/>
                                            <?php endforeach; ?>
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align:right">
                                    <?php echo $this->cart->format_number($items['price']); ?>€
                                </td>
                                <td style="text-align:right">
                                    <?php echo $this->cart->format_number($items['subtotal']); ?>€
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td><!--<button type="submit">Actualizar el carrito</button>-->
                                <div class="col-xs-3">
                                    <a href="<?php echo site_url('carrito/actualizarCarrito')?>">
                                        <input type="submit"  value="Actualizar carrito" class="btn btn-primary btn-block btn-flat">
                                    </a>
                                </div>
                                <div class="col-xs-3">
                                    <a href="<?php echo site_url('principal') ?>">
                                        <input type="button"  value="Ver catálogo" class="btn btn-success btn-block btn-flat">
                                    </a>
                                </div>
                                <div class="col-xs-3">
                                    <a href="<?php echo site_url('carrito/vaciarCarrito') ?>">
                                        <input type="button"  value="Vaciar el carrito" class="btn btn-danger btn-block btn-flat">
                                    </a>
                                </div>
                            </td>
                            <td><strong>Total</strong></td>
                            <td>
                                <?php echo $this->cart->format_number($this->cart->total()); ?>€
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
</div>