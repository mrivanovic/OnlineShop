<?php $this->load->view( "sabloni/buyer_menu"); ?>

<?php foreach ($favorite as $element):?>
<div class="all_product">
    <form>
    
    <?php echo $element->name ?><br>
    <?php echo $element->descriptions ?><br>
    <?php echo $element->seller_mail ?><br>
    <?php echo $element->price ?><br>
    <?php echo $element->delivery_id ?><br>
    <?php echo $element->currency_id ?><br>
  
    
    </form>
</div>
<?php endforeach; ?>
   