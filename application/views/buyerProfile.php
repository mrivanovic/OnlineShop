<?php $this->load->view( "sabloni/buyer_menu"); ?>
<div id="buyer1">
    <div id="buyer">
        <div class="buyerleft">
            <form method="POST" action="<?php echo base_url('Account/setImageB');?>" enctype="multipart/form-data">
                <label for="image">
                    <input type="file" name="image" id="image" style="display:none;"/>
                    <img src="<?php echo base_url() . ($user->image != null ? $user->image : 'img/profile.png') ?>" style="height: 200px; width: 200px; border: 1px solid grey; padding: 5px;">
                </label><br>
                <button type="submit">Upload</button>
            </form>

        </div>
        <div class="buyerright">
            <form name="updateB" method="post" action="<?php echo base_url('Account/updateB');?>">
                <table>

                    <tr>
                        <th colspan="2" style="background-color: grey; color: white;">User Info:</th>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>

                        <th>Name:</th>
                        <td><input type="text" value="<?= $user->name ?>" name="name" /></td>
                    </tr>
                    <tr>
                        <th>Lastname:</th>
                        <td><input type="text" value="<?= $user->lastname ?>" name="lastname" /></td>
                    </tr>
                    <tr>
                        <th>Tel:</th>
                        <td><input type="text" value="<?= $user->tel ?>" name="tel" /></td>
                    </tr>
                    <tr>

                        <th>Country:</th>
                        <td><input type="text" value="<?= $user->country ?>" name="country" /></td>
                    </tr>
                    <tr>

                        <th>City:</th>
                        <td><input type="text" value="<?= $user->city ?>" name="city" /></td>
                    </tr>
                    <tr>
                        <th>Adress:</th>
                        <td><input type="text" value="<?= $user->adress ?>" name="adress" /></td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <input type="hidden" value="<?php echo $user->mail;?>" name="mailID" />
                            <input type="submit" value="Save Changes" />
                        </th>

                    </tr>
                </table>
            </form>
            <form name="passwordUpdateB" method="post" action="<?php echo base_url('Account/updatePassB');?>">
                <table>
                    <tr>
                        <th colspan="2" style="background-color: grey; color: white;">Change Password</th>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td><input type="text" name="pass" /></td>
                    </tr>
                    <tr>
                        <th>Confirm Password:</th>
                        <td><input type="text" name="pass1" /></td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <input type="hidden" value="<?php echo $user->mail;?>" name="mailID" />
                            <input type="submit" value="Save Changes" />
                        </th>
                    </tr>
                </table>
            </form>
            <?php if (isset($message)) { ?>
                <h3 style="color:red;"><?php echo $message; ?></h3>
            <?php } ?>
            <table>
                <tr>
                    <th colspan="2" style="background-color: grey; color: white;">Delete Account</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <form method="post" action="<?php echo base_url("Account/deleteB"); ?>">
                            <input type="hidden" value="<?php echo $user->mail ?>" name="idbuyer"/>
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this account?')" />
                        </form>
                    </th>
                </tr>
            </table>
        </div>

    </div>
</div>