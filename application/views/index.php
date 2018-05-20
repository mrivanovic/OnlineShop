<?php foreach ($product as $element):?>
<div class="all_product">
     <form>
          <img src="<?php echo base_url()?>img/img.png"><br>
          <?php echo $element['name'];?><br>
         <?php echo $element['descriptions'];?><br>
          <?php echo $element['delivery_id'];?><br>
          <?php echo $element['price'];?>&nbsp;-&nbsp;<?php echo $element['currency_id'];?><br>
          Contact:<br><?php echo $element['seller_mail'];?><br>
     </form>
</div>
<?php endforeach; ?>