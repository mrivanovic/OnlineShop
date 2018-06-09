<?php $this->load->view( "sabloni/profile_menu"); ?>
<div class="order">
<?php foreach( $ordersS as $element):?>
<div class="orders">
    <form name="order" method="post" action="<?php echo base_url('Account/orderSent');?>">
        <table>
        <tr>
            <th>Orders from:</th>
            <td><?php echo $element['buyer_mail'];?></td>
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
                <td colspan="2"> <button class="checkB" type="submit" name="send" onclick="change()"><?php if ($element['sent'] == 1) echo "<span class=\"check\"><i class=\"fa fa-check-circle\"></i></span>"; else echo "SEND";  ?></button></td>
            </tr>
        </table>
    </form>
    <hr>
</div>
<?php endforeach; ?>

</div>