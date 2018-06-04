<?php $this->load->view("sabloni/profile_menu"); ?>
<div class="sellSent">
    <div class="left">
        <a href="<?php echo base_url('Account/sellerInbox'); ?>">Inbox</a>
    </div>
    <div class="right">
        <a href="<?php echo base_url("Account/sellerSent"); ?>">Sent</a>
    </div>
</div>
<div class="messageContent">
    <?php foreach ($sentS as $element):?>
        <div class="sellerSentMsg">
            <b>To:&nbsp;</b> <?php echo $element['receiver_mail'];?>
            <hr>
            <?php echo $element['message'];?><br/></br>
            <p class="time"><?php echo $element['timestamp'];?></p></br>
        </div>
    <?php endforeach; ?>
</div>