<?php $this->load->view( "sabloni/profile_menu"); ?>
<div id="Seller1">
    <div id="Seller">
        <div class="sellerfleft">
            <label for="image">
                <input type="file" name="image" id="image" style="display:none;"/>
                <img src="<?php echo base_url()?>img/profile.png" style="height: 200px; width: 200px; border: 1px solid grey; padding: 5px;">
            </label>
        </div>
        <div class="sellerright">
            <form name="update" method="post" action="<?php echo base_url('Account/update');?>">
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
            <form name="passwordUpdate" method="post" action="<?php echo base_url('Account/updatePass');?>">
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
                        <form method="post" action="<?php echo base_url("Account/delete"); ?>">
                            <input type="hidden" value="<?php echo $user->mail ?>" name="idseller"/>
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this account?')" />
                        </form>
                    </th>
                </tr>
            </table>
        </div>

    </div>
</div>