<script type="text/javascript">
    var imagecount = 1;
    var total = 4;

    function slide(x) {
        var Image = document.getElementById("imgSlide");
        imagecount = imagecount + x;
        if (imagecount > total) {
            imagecount = 1;
        }
        if (imagecount < 1) {
            imagecount = total;
        }
        Image.src = "../img/laptop" + imagecount + ".jpg";
    }
</script>
<script>
$(document).ready(function(){
    $("#phone").click(function(){
        $("p").toggle();
    });
});
</script>
<div id="productDesc">
    <div class="productDescLeft">
        <div id="slideshow">
            <img src="../img/laptop1.jpg" id="imgSlide" style="max-width: 100%; max-height: 100%; display:block; margin: 0 auto;"/>
            <div id="leftHolder"><img  onClick="slide(-1)" class="leftArrow" src="../img/arrow-left.png"/></div>
            <div id="rightHolder"><img onClick="slide(-1)" class="rightArrow" src="../img/arrow-right.png"/></div>
        </div>
    </div>
    <div class="productDescCenter">
        <table>
            <tr>
                <th>Name:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>Description:</th><br/>
            <td><input type="text"></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input type="text"></td>
                <th>Currency:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><button id="like" style="width: 50px; height: 50px;"><i class="fa fa-heart fa-2x"></i></a></button></td>
            </tr>
        </table>
    </div>
    <div class="productDescRight">
        <table>
            <tr>    
            <th>Name:</th>
            <td><input type="text" id="SellerName"></td>
            </tr>
            <tr>
                <td><button id="message"><i class="fa fa-envelope"></i>&nbsp;Send message</button></td>
            </tr>
            <tr>
                <td><button id="phone">Click for seller's phone number</button></td>
            </tr>
            <tr>
                <td><p style="display: none">064/1234567</p></td>
            </tr>
        </table>
    </div>
</div>