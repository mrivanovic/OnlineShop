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

</div>
</div>