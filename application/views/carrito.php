<?php
//echo form_open('ruta/al/controller/update/function');
echo anchor('principal', 'Ver productos');
?>
<form action="<?php base_url() ?>actualizarCarrito" method="post">
    <table cellpadding="6" cellspacing="0" style="width:100%" border="1">
        <tr>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th style="text-align:right">Precio</th>
            <th style="text-align:right">Sub-Total</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>
    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
            <tr>
                <td><?php
                    echo form_input(array('name' => $i . '[qty]',
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
                                <?php echo $option_value; ?><br />
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
            <td colspan="2"><button type="submit">Actualizar el carrito</button><a href="<?php base_url() ?>vaciarCarrito">Vaciar el carrito</a></td>
            <td class="right"><strong>Total</strong></td>
            <td class="right">
<?php echo $this->cart->format_number($this->cart->total()); ?>€
            </td>
        </tr>
    </table>
</form>