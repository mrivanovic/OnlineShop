<script>
     $(document).ready(function() {
          $(".menu").click(function() {
               $(".dropmenu").toggle();
          });
     });
     $(document).ready(function() {
          $(".equi").hover(function() {
               $(".dropequi").toggle();
          });
     });
     $(document).ready(function() {
          $(".comp").hover(function() {
               $(".dropcomp").toggle();
          });
     });
</script>
<div class="dropmenu">
     <a href="<?php echo base_url('Category/Menu');?>?id=1">Laptops</a>
     <a href="<?php echo base_url('Category/Menu');?>?id=2">Desktops</a>
     <a href="<?php echo base_url('Category/Menu');?>?id=3">Tablets</a>
     <a href="<?php echo base_url('Category/Menu');?>?id=4">Mobile phones</a>
     <a href="<?php echo base_url('Category/Menu');?>?id=5">Monitors</a>
     <a class="equi">Equipments &nbsp;<i class="fa fa-caret-right"></i></a>
     <a class="comp">Components &nbsp;<i class="fa fa-caret-right"></i></a>
</div>
<div class="dropequi">
     <a class="equi" href="">Mouses</a>
     <a class="equi" href="">Keyboards</a>
     <a class="equi" href="">Speakers</a>
     <a class="equi" href="">Gaming</a>
     <a class="equi" href="">Webcams</a>
     <a class="equi" href="">Microphones</a>
     <a  class="equi" href="">Printers</a>
</div>
<div class="dropcomp">
     <a class="comp" href="">Processors</a>
     <a class="comp" href="">Motherboards</a>
     <a class="comp" href="">Grapich cards</a>
     <a class="comp" href="">Hard drives</a>
     <a class="comp" href="">SSD</a>
     <a class="comp" href="">Power suplys</a>
     <a class="comp" href="">Cabinets</a>
     <a class="comp" href="">Controllers</a>
     <a class="comp" href="">Sound Cards</a>
</div>
<?php foreach ($product as $element):?>
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
<div style="clear: both;">
<?php echo $this->pagination->create_links();?>
</div>