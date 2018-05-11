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
                    <td><?php echo form_input(array('id' => 'dname', 'name' => 'dname')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Last Name:'); ?> <?php echo form_error('dlastname'); ?></th>
                    <td><?php echo form_input(array('id' => 'dlastname', 'lastname' => 'dlastname')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Email:'); ?> <?php echo form_error('demail'); ?></th>
                    <td><?php echo form_input(array('id' => 'demail', 'mail' => 'demail')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Password:'); ?> <?php echo form_error('dpassword'); ?></th>
                    <td><?php echo form_input(array('id' => 'dpassword', 'password' => 'dpassword')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Password Confirm:'); ?> <?php echo form_error('dpasswordC'); ?></th>
                    <td><?php echo form_input(array('id' => 'dpasswordC', 'passwordC' => 'dpasswordC')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Country:'); ?> <?php echo form_error('dcountry'); ?></th>
                    <td><?php echo form_input(array('id' => 'dcountry', 'country' => 'dcountry')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('City:'); ?> <?php echo form_error('dcity'); ?></th>
                    <td><?php echo form_input(array('id' => 'dcity', 'city' => 'dcity')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Adress:'); ?> <?php echo form_error('dadress'); ?></th>
                    <td><?php echo form_input(array('id' => 'dadress', 'adress' => 'dadress')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Tel:'); ?> <?php echo form_error('dtel'); ?></th>
                    <td><?php echo form_input(array('id' => 'dtel', 'tel' => 'dtel')); ?></td>
                </tr>
                <tr>
                    <th><?php echo form_label('Date of birth:'); ?> <?php echo form_error('ddate'); ?></th>
                    <td><?php echo form_input(array('id' => 'ddate', 'date' => 'ddate')); ?></td>
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