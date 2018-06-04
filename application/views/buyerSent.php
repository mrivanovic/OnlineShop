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
        <div class="sellerSentMsg">
            <b>To:&nbsp;</b> <?php echo $element['receiver_mail'];?>
            <hr>
            <?php echo $element['message'];?><br/></br>
            <p class="time"><?php echo $element['timestamp'];?></p></br>
        </div>
    <?php endforeach; ?>
</div>
</div>