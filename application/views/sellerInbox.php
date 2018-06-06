<?php $this->load->view( "sabloni/profile_menu"); ?>
    <div class="sellInbox">
        <div class="left">
            <a href="#">Inbox</a>
        </div>
        <div class="right">
            <a href="<?php echo base_url("Account/sellerSent");?>">Sent</a>
        </div>
    </div>
    <div class="messageContent">
        <?php foreach ($inboxS as $element):?>
            <div class="message">
                <div class="left_top">
                    <b>From:&nbsp;</b> <?php echo $element['sender_mail'];?>
                </div>
                <div class="right_top">
                   <?php echo $element['timestamp'];?>
                </div>
                <div class="message_text">
                    <?php echo $element['message'];?><br>
                    <input type="button" class="replyMessage" value="Reply" />
                    <textarea name="text" style="" class="text"></textarea><br><button class="send" type="submit">SEND</button><br>
                </div>
            </div>
        <?php endforeach; ?>
</div>
<script>
    $(document).ready(function() {
        $(".replyMessage").click(function() {
            $("textarea").toggle();
            $(".send").toggle();
        });
    });
</script>

