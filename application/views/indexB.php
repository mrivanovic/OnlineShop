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
<?php foreach ($products as $element):?>
    <div class="all_product">
        <img src="<?php echo base_url().$element['main_image']; ?>" /><br>
        <span class="nameProduct"><a href="<?php echo base_url('Account/productPage');?>?id=<?php echo $element['info']['id'];?>"><?php echo $element['info']['name'];?></a></span><br>
        <?php echo $element['info']['descriptions'];?><br>
        <?php echo $element['category'];?><br>
        <?php echo $element['delivery'];?><br>
        <?php echo $element['info']['price'];?>&nbsp;-&nbsp;<?php echo $element['currency'];?><br>
        Contact:<br><?php echo $element['info']['seller_mail'];?><br>
        
        <button id="btnlike<?php echo $element['info']['id']; ?>" type="button" onclick="likeF(<?php echo $element['info']['id']; ?>)" style="visibility:<?php
            if($element['like']==1) echo 'hidden'; else echo 'visible';
        ?>"><i class="fa fa-heart"></i></button>
      
        <button id="btnunlike<?php echo $element['info']['id']; ?>" type="button" onclick="unlikeF(<?php echo $element['info']['id']; ?>)" style="visibility:<?php
            if($element['like']==0) echo 'hidden'; else echo 'visible';
        ?>">ne</button>
    </div>
<?php endforeach; ?>
<div id="nesto"></div>
<script>
    function likeF(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById("btnlike"+id).style.visibility="hidden";
                    document.getElementById("btnunlike"+id).style.visibility="visible";
                }
            };
            xmlhttp.open("GET", "<?php echo base_url(); ?>index.php/Account/favoriteArticle?id="+id, true);
            xmlhttp.send();
            
        }
        
        function unlikeF(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById("btnunlike"+id).style.visibility="hidden";
                    document.getElementById("btnlike"+id).style.visibility="visible";
                }
            };
            xmlhttp.open("GET", "<?php echo base_url(); ?>index.php/Account/unfavoriteArticle?id="+id, true);
            xmlhttp.send();
            
        }
        
</script>
<div style="clear: both;">
<?php echo $this->pagination->create_links();?>
</div>