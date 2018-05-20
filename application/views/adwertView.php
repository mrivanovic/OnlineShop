<?php foreach ($productsAll as $element):?>
    <div class="adwertALL">
        <form>
            <img src="<?php echo base_url()?>img/img.png"><br>
            <?php echo $element['name'];?><br>
            <textarea><?php echo $element['descriptions'];?></textarea><br>
            <?php echo $element['delivery_id'];?><br>
            <input type="text" name="price" value="<?php echo $element['price'];?>" />&nbsp;-&nbsp;<?php echo $element['currency_id'];?><br>
            <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>&nbsp;<button type="submit"><i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>
    </div>
<?php endforeach; ?>
