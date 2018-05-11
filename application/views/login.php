<div id="login">
    <div class="login_left">
        <h1>Mesto za neki tekst</h1>
    </div>
    <div class="login_right">
        <h2>Dobrodosli</h2>
        <h3>Ulogujte se</h3>
        <table>
            <form name="loginform" action="<?php echo base_url('Account/ulogujse'); ?>" method="POST">
                <tr>
                    <th>E-mail:</th>
                    <td><input type="text" name="mail" /></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="text" name="password" /></td>
                </tr>
                <tr>
                    <td><button type="submit">LogIn</button> </td>
                    <td><a href="#">Zaboravili ste lozinku?</a></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><a href="<?php echo base_url("Category/SignUp"); ?>">Sign UP</a></td>
                </tr>
            </form>
        </table>
    </div>
</div>