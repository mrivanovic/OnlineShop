<?php foreach ($products as $element):?>
    <div class="all_product">
        <form method="get" action="<?php echo base_url("Account/productPage");?>">
            <img src="<?php echo base_url().$element['main_image']; ?>" /><br>
            <span class="nameProduct"><a href="<?php echo base_url('Account/productPage');?>"><?php echo $element['info']['name'];?></span></a><br>
            <?php echo $element['info']['descriptions'];?><br>
            <?php echo $element['category'];?><br>
            <?php echo $element['delivery'];?><br>
            <?php echo $element['info']['price'];?>&nbsp;-&nbsp;<?php echo $element['currency'];?><br>
            Contact:<br><?php echo $element['info']['seller_mail'];?><br>
            <button type="submit"><i class="fa fa-heart"></i></button>
            <input type="hidden" name="id" value="<?php echo $element['info']['id'];?>" /><br>
        </form>
    </div>
<?php endforeach; ?>