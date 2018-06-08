<?php $this->load->view( "sabloni/buyer_menu"); ?>
<?php foreach( $ordersB as $element):?>
    <div class="orders">
        <form name="order" method="post" action="<?php echo base_url('Account/orderSent');?>">
            Sent From: <?php echo $element['seller_mail'];?><br>
            Price: <?php echo $element['price'];?>&nbsp;<?php echo $element['currency'];?><br>
            <button type="submit">Check</button>
        </form>
    </div>
<?php endforeach; ?>
