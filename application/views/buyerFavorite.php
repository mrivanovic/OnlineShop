<?php $this->load->view( "sabloni/buyer_menu"); ?>

<?php foreach ($favorite as $element):?>
<div class="all_product">
     <form>
          <img src="<?php echo base_url().$element['main_image']; ?>" /><br>
          <?php echo $element['info']['name'];?><br>
          <?php echo $element['info']['descriptions'];?><br>
          <?php echo $element['category'];?><br>
          <?php echo $element['delivery'];?><br>
          <?php echo $element['info']['price'];?>&nbsp;-&nbsp;<?php echo $element['currency'];?><br>
          Contact:<br><?php echo $element['info']['seller_mail'];?><br>
     </form>
</div>
<?php endforeach; ?>
   