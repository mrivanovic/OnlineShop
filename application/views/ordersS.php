<?php $this->load->view( "sabloni/profile_menu"); ?>
<?php foreach( $ordersS as $element):?>
<div class="orders">
    <form name="order" method="post" action="<?php echo base_url('Account/orderSent');?>">
        Orders from: <?php echo $element['buyer_mail'];?><br>
        Price: <?php echo $element['price'];?>&nbsp;<?php echo $element['currency'];?><br>
        <button type="submit">SEND</button>
    </form>
</div>
<?php endforeach; ?>
