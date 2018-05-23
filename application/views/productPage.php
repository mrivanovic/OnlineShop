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
<div id="productDesc">
    <div class="productDescLeft">
        <div id="slideshow">
            <img src="../img/laptop1.jpg" id="imgSlide" style="max-width: 450px; max-height: 650px;"/>
            <div id="leftHolder"><img  onClick="slide(-1)" class="leftArrow" src="../img/arrow-left.png"/></div>
            <div id="rightHolder"><img onClick="slide(-1)" class="rightArrow" src="../img/arrow-right.png"/></div>
        </div>
    </div>
    <div class="productDescCenter">
        <table>
            <tr>
                <th>Name:</th>
                <td></td>
            </tr>
            <tr>
                <th>Description:</th><br/>
            <td></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td></td>
                <th>Currency:</th>
                <td></td>
            </tr>
            <tr>
                <td><i class="fa fa-heart"></i></td>
            </tr>
        </table>
    </div>
    <div class="productDescRight">
        <table>
            <tr>    
            <th>Name:</th>
            <td></td>
            </tr
            <tr>
                <td><input type="button" id="messageToSeller" value="Send message"></i></td>
            </tr>
            <tr>
                <th><input type="button" id="sellerTell" value="Click for mobile number"</th>
            </tr>
        </table>
    </div>
</div>