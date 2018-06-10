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
        <div class="message">
            <div class="left_top">
                <b>To:&nbsp;</b> <?php echo $element['receiver_mail'];?>
            </div>
            <div class="right_top">
                <?php echo $element['timestamp'];?>
            </div>
            <div class="message_text">
                <?php echo $element['message'];?><br>
            </div>
        </div>
    <?php endforeach; ?>
</div>