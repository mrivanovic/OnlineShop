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
        <div class="sellerSentMsg">
            <b>From:&nbsp;</b> <?php echo $element['sender_mail'];?>
            <hr><br/>
            <?php echo $element['message'];?><br/></br>
            <p class="time"><?php echo $element['timestamp'];?></p></br>
            <input type="button" class="openMessage" value="Reply">
        </div>
        <?php endforeach; ?>
</div>
