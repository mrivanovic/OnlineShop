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
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=20">Mouses</a>
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=21">Keyboards</a>
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=22">Speakers</a>
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=23">Gaming</a>
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=24">Webcams</a>
     <a class="equi" href="<?php echo base_url('Category/Menu');?>?id=25">Microphones</a>
     <a  class="equi" href="<?php echo base_url('Category/Menu');?>?id=28">Printers</a>
</div>
<div class="dropcomp">
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=9">Processors</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=10">Motherboards</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=11">Grapich cards</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=12">Hard drives</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=13">SSD</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=14">Power suplys</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=15">Cabinets</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=16">Controllers</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=18">Sound Cards</a>
     <a class="comp" href="<?php echo base_url('Category/Menu');?>?id=19">Coolers</a>
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
