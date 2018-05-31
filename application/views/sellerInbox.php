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
            <div class="sellerInbox">
                <?php echo $element['sender_mail'];?><br>
                <hr>
                <?php echo $element['message'];?><&nbsp;<?php echo $element['timestamp'];?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
