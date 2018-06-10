<?php $this->load->view( "sabloni/profile_menu"); ?>
<?php foreach ($productsAll as $element):?>
    <form name="adwertUpdate" method="post" action="<?php echo base_url('Category/adwertUpdate');?>">
    <div class="all_product">
        <form name="adwertEdit" method="post" action="<?php echo base_url('Category/adwertUpdate');?>">
            <input type="hidden" name="id" value=" <?php echo $element['info']['id'];?>" /><br>
            <img src="<?php echo base_url().$element['main_image']; ?>"><br>
            <input type="text" name="name" value="<?php echo $element['info']['name'];?>" /><br><br>
            <textarea name="desc"><?php echo $element['info']['descriptions'];?></textarea><br><br>
            <?php echo $element['delivery'];?><br>
            <input type="text" name="price" value=" <?php echo $element['info']['price'];?>" />&nbsp;-&nbsp;<?php echo $element['currency'];?><br>
            <button type="submit" name="update"><i class="fa fa-pencil" aria-hidden="true"></i></button>&nbsp;<button type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>
    </div>
<?php endforeach; ?>
