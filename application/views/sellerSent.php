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
    <div class="sellerSentMsg">

        <th><b>From:</b></th>
        sender mail<hr><br/><br/>
        Text<br/></br>
        <p class="time">Time</p></br><br/>
        <input type="button" class="openMessage" value="OPEN">

    </div>
</div>
</div>