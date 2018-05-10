<div id="singupK">
    <div class="singupK_left">
        <h1>Mesto za neki tekst</h1>
    </div>
    <div class="singupK_right">
        <h2>Dobrodosli</h2>
        <h3>Registrujte se</h3>
        <table>     
            <form name="singupK" action="" method="POST">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" /></td>
                </tr>
                <tr>
                    <th>lastname:</th>
                    <td><input type="text" name="lastname" /></td>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <td><input type="text" name="mail" /></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <th>Password Confirm:</th>
                    <td><input type="password" name="passwordC" /></td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td><input type="text" name="country" /></td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td><input type="text" name="city" /></td>
                </tr>
                <tr>
                    <th>Adress:</th>
                    <td><input type="text" name="adress" /></td>
                </tr>
                <tr>
                    <th>Tel:</th>
                    <td><input type="text" name="tel" /></td>
                </tr>
                <tr>
                    <th>Date of birth:</th>
                    <td><input type="date" name="date" /></td>
                </tr>
                <tr>
                    <td><button type="submit">Sing UP</button> </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><a href="<?php echo base_url("Category/login"); ?>">Log In</a></td>
                </tr>
            </form>
        </table>
    </div>
</div>