<?php $this->load->view( "sabloni/profile_menu"); ?>
<?php foreach ($productsAll as $element):?>
    <div class="adwertALL">
        <form name="adwertEdit" method="post" action="<?php echo base_url();?>">
            <img src="<?php echo base_url()?>img/img.png"><br>
            <input type="text" name="name" value="<?php echo $element['name'];?>" /><br><br>
            <textarea><?php echo $element['descriptions'];?></textarea><br><br>
            <?php echo $element['delivery_id'];?><br>
            <input type="text" name="price" value="<?php echo $element['price'];?>" />&nbsp;-&nbsp;<?php echo $element['currency_id'];?><br>
            <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>&nbsp;<button type="submit"><i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>
    </div>
<?php endforeach; ?>
