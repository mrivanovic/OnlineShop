<div id="singupP">
    <div class="singupP_left">
        <h1>Mesto za neki tekst</h1> 
    </div>
    <div class="singupP_right">
        <h2>Dobrodosli</h2>
        <h3>Registrujte se</h3>
        <?php if (isset($message)) { ?>
            <h3 style="color:green;">Data inserted successfully</h3>
        <?php } ?>
        <table>
            <?php echo form_open('Account/registerP', 'method=POST'); ?>

            <tr>
                <th><?php echo form_label('Name:'); ?> <?php echo form_error('dname'); ?></th>
                <td><input type="text" name="dname" id="dname" value="<?php echo set_value('dname'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Last Name:'); ?> <?php echo form_error('dlastname'); ?></th>
                <td><input type="text" name="dlastname" id="dlastname" value="<?php echo set_value('dlastname'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Email:'); ?> <?php echo form_error('demail'); ?></th>
                <td><input type="text" name="demail" id="demail" value="<?php echo set_value('demail'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Password:'); ?> <?php echo form_error('dpassword'); ?></th>
                <td><input type="text" name="dpassword" id="dpassword" value="<?php echo set_value('dpassword'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Password Confirm:'); ?> <?php echo form_error('dpasswordC'); ?></th>
                <td><input type="text" name="dpasswordC" id="dpasswordC" value="<?php echo set_value('dpasswordC'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Country:'); ?> <?php echo form_error('dcountry'); ?></th>
                <td><input type="text" name="dcountry" id="dcountry" value="<?php echo set_value('dcountry'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('City:'); ?> <?php echo form_error('dcity'); ?></th>
                <td><input type="text" name="dcity" id="dcity" value="<?php echo set_value('dcity'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Adress:'); ?> <?php echo form_error('dadress'); ?></th>
                <td><input type="text" name="dadress" id="dadress" value="<?php echo set_value('dadress'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Tel:'); ?> <?php echo form_error('dtel'); ?></th>
                <td><input type="text" name="dtel" id="dtel" value="<?php echo set_value('dtel'); ?>" size="50" /></td>
            </tr>
            <tr>
                <th><?php echo form_label('Date of birth:'); ?> <?php echo form_error('ddate'); ?></th>
                <td><input type="text" name="ddate" id="ddate" value="<?php echo set_value('ddate'); ?>" size="50" /></td>
            </tr>
            <tr>
                <td><?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?></td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;"><a href="<?php echo base_url("Category/login"); ?>">Log In</a></td>
            </tr>
            <?php echo form_close(); ?>
        </table>
<<<<<<< HEAD
        <?php if (isset($message)) { ?>
            <h3 style="color:green;">Data inserted successfully</h3>
        <?php } ?>
=======
>>>>>>> 4ae630c004b48860dee1790f02b6b29d22603946
    </div>
</div>