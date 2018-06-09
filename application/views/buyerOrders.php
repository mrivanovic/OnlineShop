<?php $this->load->view( "sabloni/buyer_menu"); ?><div class="order">
    <?php foreach( $ordersB as $element):?>
    <div class="orders">
        <form name="order" method="post" action="<?php echo base_url('Account/orderArrived');?>">
            <table>
                <tr>
                    <th>Sent From:</th>
                    <td><?php echo $element['seller_mail'];?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $element['name'];?></td>
                </tr>
                <tr>
                    <th>Descriptions:</th>
                    <td> <?php echo $element['descriptions'];?></td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td> <?php echo $element['price'];?>&nbsp;<?php echo $element['currency'];?></td>
                </tr>
                <input type="hidden" name="id" value="<?php echo $element['id'];?>" />
                <tr>
                    <td colspan="2"> <button class="checkS" type="submit">Arrived</button></td>
                </tr>
            </table>
        </form>
        <hr>
        <?php endforeach; ?>
    </div>
