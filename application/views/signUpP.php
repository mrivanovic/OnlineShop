<div id="singupP">
    <div class="singupP_left">
        <h1>Mesto za neki tekst</h1>
    </div>
    <div class="singupP_right">
        <h2>Dobrodosli</h2>
        <h3>Registrujte se</h3>
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
                <td><?php echo form_input(array('id' => 'dpassword', 'name' => 'dpassword')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Password Confirm:'); ?> <?php echo form_error('dpasswordC'); ?></th>
                <td><?php echo form_input(array('id' => 'dpasswordC', 'name' => 'dpasswordC')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Country:'); ?> <?php echo form_error('dcountry'); ?></th>
                <td><?php echo form_input(array('id' => 'dcountry', 'name' => 'dcountry')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('City:'); ?> <?php echo form_error('dcity'); ?></th>
                <td><?php echo form_input(array('id' => 'dcity', 'name' => 'dcity')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Adress:'); ?> <?php echo form_error('dadress'); ?></th>
                <td><?php echo form_input(array('id' => 'dadress', 'name' => 'dadress')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Tel:'); ?> <?php echo form_error('dtel'); ?></th>
                <td><?php echo form_input(array('id' => 'dtel', 'name' => 'dtel')); ?></td>
            </tr>
            <tr>
                <th><?php echo form_label('Date of birth:'); ?> <?php echo form_error('ddate'); ?></th>
                <td><?php echo form_input(array('id' => 'ddate', 'name' => 'ddate')); ?></td>
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
            <h3 style="color:green;">Data inserted successfully</h3>
        <?php } ?>
    </div>
</div>