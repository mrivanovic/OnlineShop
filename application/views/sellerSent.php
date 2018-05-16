<?php $this->load->view( "sabloni/profile_menu"); ?>
    <div class="sellSent">
        <div class="left">
            <a href="<?php echo base_url('Account/sellerInbox');?>">Inbox</a>
        </div>
        <div class="right">
            <a href="<?php echo base_url("Account/sellerSent"); ?>">Sent</a>
        </div>
    </div>
    <div class="messageContent">

    </div>
</div>