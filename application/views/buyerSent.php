<?php $this->load->view( "sabloni/buyer_menu"); ?>
<div class="buyerSent">
    <div class="left">
        <a href="<?php echo base_url('Account/buyerInbox');?>">Inbox</a>
    </div>
    <div class="right">
        <a href="<?php echo base_url("Account/buyerSent"); ?>">Sent</a>
    </div>
</div>
<div class="messageContent">
    <?php foreach ($buyerS as $element):?>
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
</div>
