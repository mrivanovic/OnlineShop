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
    <a href="<?php echo base_url('Category/Menu');?>">Laptops</a>
    <a href="<?php echo base_url('Category/Menu');?>">Desktops</a>
    <a href="<?php echo base_url('Category/Menu');?>">Tablets</a>
    <a href="<?php echo base_url('Category/Menu');?>">Mobile phones</a>
    <a href="<?php echo base_url('Category/Menu');?>">Monitors</a>
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
    <a class="equi" href="">Printers</a>
</div>
<div class="dropcomp">
    <a class="comp" href="">Processors</a>
    <a class="comp"href="">Motherboards</a>
    <a class="comp" href="">Grapich cards</a>
    <a class="comp" href="">Hard drives</a>
    <a class="comp" href="">SSD</a>
    <a class="comp" href="">Power suplys</a>
    <a class="comp" href="">Cabinets</a>
    <a class="comp" href="">Controllers</a>
    <a class="comp" href="">Sound Cards</a>
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
        
        <button id="btnlike<?php echo $element['info']['id']; ?>" type="button" onclick="likeF(<?php echo $element['info']['id']; ?>)" style="visibility:visible"><i class="fa fa-heart"></i></button>
      
        <button id="btnunlike<?php echo $element['info']['id']; ?>" type="button" onclick="unlikeF(<?php echo $element['info']['id']; ?>)" style="visibility:hidden">ne</button>
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