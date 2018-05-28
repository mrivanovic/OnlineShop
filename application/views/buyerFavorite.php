<?php $this->load->view( "sabloni/buyer_menu"); 

        ?>

<?php foreach ($favorite as $element):?>
    <?php echo $element->name ?><br>

<?php endforeach; ?>


