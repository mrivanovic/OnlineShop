<script type="text/javascript">

    var base_url = '<?php echo base_url(); ?>';

    var images = <?php echo json_encode($product['images']); ?>;
    var total = images.length;
    var imagecount = 0;

    console.log(total);

    function slide(x) {
        imagecount = imagecount + x;

        if (imagecount > total) {
            imagecount = 0;
        }
        if (imagecount < 0) {
            imagecount = total;
        }

        var Image = document.getElementById("imgSlide");
        Image.src = base_url + images[imagecount]['path'];
    }
</script>
<script>
    $(document).ready(function(){
        $("#phone").click(function(){
            $("p").toggle();
        });
    });
    $(document).ready(function() {
        $("#message").click(function() {
            $("textarea").toggle();
            $(".send").toggle();
        });
    });
</script>
<div id="productDesc">
    <div class="productDescLeft">
        <div id="slideshow">
            <img src="<?php echo base_url().$product['images'][0]['path']; ?>" id="imgSlide" style="max-width: 300px; max-height: 300px; display:block; margin: 0 auto;"/>
            <div id="leftHolder"><img  onClick="slide(1)" class="leftArrow" src="<?php echo base_url(); ?>img/arrow-left.png"/></div>
            <div id="rightHolder"><img onClick="slide(-1)" class="rightArrow" src="<?php echo base_url();?>/img/arrow-right.png"/></div>
        </div>
    </div>
    <div class="productDescCenter">
        <form name="product" method="post" action="<?php echo base_url('Stripe/order');?>">
        <table>
            <tr>
                <th>Name:</th>
                <td><?php echo $product['info']['name']; ?></td>
            </tr>
            <tr>
                <th>Description:</th><br/>
                <td><?php echo $product['info']['descriptions']; ?></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td class="price"><span class="price"><?php echo $product['info']['price']; ?></span>&nbsp;<?php echo $product['currency']; ?></td>
                <td>
                    <button id="button_buy" type="button">Buy now</button>
                </td>
            </tr>
        </table>
        </form>
        <br>
        <div class="addcomments">
            <form method="post" action="<?php echo base_url("Account/comments")?>">
                <table>
                    <input type="hidden" name="id" value="<?php echo $product['info']['id']; ?>" />
                    <tr>
                        <th> <textarea  name="text" placeholder="ADD comment"></textarea><br></th>
                        <td><button type="submit"><i class="fa fa-commenting-o" aria-hidden="true"></i>Comment</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="productDescRight">
        <button id="message"><i class="fa fa-envelope"></i>&nbsp;Send message</button><br>
        <form name="message" action="<?php echo base_url("Account/message")?>" method="post">
            <textarea name="text" style="" class="text"></textarea><br><button class="send" type="submit">SEND</button><br>
            <input type="hidden" name="receiver_mail" value="<?php echo $product['seller']['mail']; ?>" /><br>
        </form>
        
        <span class="name"><?php echo $product['seller']['name']; ?></span><br>

        <?php echo $product['seller']['city'];?><br><br>
        
        <form action="<?php echo base_url("Account/reactions");?>" method="post">
            <input type="hidden" name="receiver_mail" value="<?php echo $product['seller']['mail']; ?>" />
            <input type="hidden" name="id" value="<?php echo $product['info']['id']; ?>" />
            <button type="submit" name="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>&nbsp;
            <button type="submit" name="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
            </button>
        </form><br>
        
        <button id="phone"><i class="fa fa-phone"></i> Click for seller's phone number</button>
        <p style="display: none"><?php echo $product['seller']['tel']; ?></p><br>
        <b>STATUS:</b><br> <?php echo $product['seller']['status']; ?>
        
    </div>
</div>

<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    var amount = '<?php echo $product['info']['price'] * 100; ?>';
    var currency = '<?php echo $product['currency']; ?>';
    var product_id = '<?php echo $product['info']['id'];?>';
    var seller_mail = '<?php echo $product['seller']['mail']; ?>';

    let stripe = StripeCheckout.configure({
        key: 'pk_test_oXpp2smuiw4u2cv0zoh2Sm7X',
        image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
        locale: 'auto',
        email: '<?php echo $_SESSION['mail']; ?>',
        currency: currency,
        amount: amount,
        description: '<?php echo $product['info']['name']; ?>',
        token: function (token) {
            var url = '<?php echo base_url('stripe/order'); ?>';
            var data = {
                token: token.id,
                currency: currency,
                amount: amount,
                product: product_id,
                seller_mail: seller_mail};

            $.post(url, data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (data) {
                    console.log(data);
                });
        }
    });

    $('#button_buy').click(function (event) {
        stripe.open({
            name: 'eShop.it'
        });
    });
</script>