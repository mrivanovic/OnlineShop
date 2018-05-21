<div id="singupK">
    <div class="singupK_left">
        <h1>Mesto za neki tekst</h1>
    </div>
    <div class="singupK_right">
        <h2>Dobrodosli</h2>
        <h3>Registrujte se</h3>
        <table>
            <?php echo form_open('Account/signUpB', 'method=POST'); ?>

            <tr>
                <th><?php echo form_label('Name'); ?> </th>
                <td><input type="text" name="dname" id="dname" value="<?php echo set_value('dname'); ?>" size="50" /></td>
                <td><?php echo form_error('dname'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Last Name'); ?></th>
                <td><input type="text" name="dlastname" id="dlastname" value="<?php echo set_value('dlastname'); ?>" size="50" /></td>
                <td> <?php echo form_error('dlastname'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Email'); ?> </th>
                <td><input type="text" name="demail" id="demail" value="<?php echo set_value('demail'); ?>" size="50" /></td>
                <td><?php echo form_error('demail'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Password'); ?> </th>
                <td><input type="password" name="dpassword" id="dpassword" value="<?php echo set_value('dpassword'); ?>" size="50" /></td>
                <td><?php echo form_error('dpassword'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Password Confirm'); ?> </th>
                <td><input type="password" name="dpasswordC" id="dpasswordC" value="<?php echo set_value('dpasswordC'); ?>" size="50" /></td>
                <td><?php echo form_error('dpasswordC'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Country'); ?> </th>
                <td><input type="text" name="dcountry" id="dcountry" value="<?php echo set_value('dcountry'); ?>" size="50" /></td>
                <td><?php echo form_error('dcountry'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('City'); ?> </th>
                <td><input type="text" name="dcity" id="dcity" value="<?php echo set_value('dcity'); ?>" size="50" /></td>
                <td><?php echo form_error('dcity'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Adress'); ?> </th>
                <td><input type="text" name="dadress" id="dadress" value="<?php echo set_value('dadress'); ?>" size="50" /></td>
                <td><?php echo form_error('dadress'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Tel'); ?> </th>
                <td><input type="text" name="dtel" id="dtel" value="<?php echo set_value('dtel'); ?>" size="50" /></td>
                <td><?php echo form_error('dtel'); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Date of birth'); ?> </th>
                <td><input type="text" name="ddate" id="ddate" value="<?php echo set_value('ddate'); ?>" size="50" /></td>
                <td><?php echo form_error('ddate'); ?></td>
            </tr>
            <tr>
                <td><?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?></td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;"><a href="<?php echo base_url("Category/login"); ?>">Log In</a></td>
            </tr>
            <?php echo form_close(); ?>
        </table>
        <?php if (isset($message)) { ?>
            <h3 style="color:red;"><?php echo $message; ?></h3>
        <?php } ?>
        </table>
    </div>
</div>