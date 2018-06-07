<?php $this->load->view( "sabloni/buyer_menu"); ?>

<<<<<<< HEAD
<?php foreach ($products as $element):?>
    <div class="all_product">
        <img src="<?php echo base_url().$element['main_image']; ?>" /><br>
        <span class="nameProduct"><a href="<?php echo base_url('Account/productPage');?>?id=<?php echo $element['info']['id'];?>"><?php echo $element['info']['name'];?></a></span><br>
        <?php echo $element['info']['descriptions'];?><br>
        <?php echo $element['category'];?><br>
        <?php echo $element['delivery'];?><br>
        <?php echo $element['info']['price'];?>&nbsp;-&nbsp;<?php echo $element['currency'];?><br>
        Contact:<br><?php echo $element['info']['seller_mail'];?><br>

        <button id="btnlike<?php echo $element['info']['id']; ?>" type="button" onclick="likeF(<?php echo $element['info']['id']; ?>)" style="visibility:visible"><i class="fa fa-heart"></i></button>

        <button id="btnunlike<?php echo $element['info']['id']; ?>" type="button" onclick="unlikeF(<?php echo $element['info']['id']; ?>)" style="visibility:hidden">ne</button>
    </div>
=======
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
>>>>>>> 09c5525d900b8ed7261d7be725d928303dba9e9f
<?php endforeach; ?>
   