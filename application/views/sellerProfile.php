
<div id="Seller1">
    <div id="sellProfNav">
        <div class="left">
            <a href="<?php echo base_url("Account/sellerADD"); ?>">Add Advert</a>
        </div>
        <div class="center">
            <a href=""><i class="fa fa-envelope"></i></a>
        </div>
        <div class="right">
            <a href="#">Advert View</a>
        </div>
    </div>
    <div id="Seller">
        <div class="sellerfleft">
            <label for="image">
                <input type="file" name="image" id="image" style="display:none;"/>
                <img src="<?php echo base_url()?>img/profile.png" style="height: 200px; width: 200px; border: 1px solid grey; padding: 5px;">
            </label>
        </div>
        <div class="sellerright">
            <table>

                <tr>
                    <th colspan="2" style="background-color: grey; color: white;">Licni Podaci:</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <form name="update" method="post" action="<?php base_url('Account/update');?>">
                    <th>Name:</th>
                    <td><input type="text" value="<?= $user->name ?>" name="name" /></td>
                </tr>
                <tr>
                    <th>Lastname:</th>
                    <td><input type="text" value="<?= $user->lastname ?>" name="lastname" /></td>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <td><input type="text" value="<?= $user->mail ?>" name="mail" /></td>
                </tr>
                <tr>
                    <th>Tel:</th>
                    <td><input type="text" value="<?= $user->tel ?>" name="tel" /></td>
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
                        <input type="hidden" value="<?php echo $user->mail;?>" name="mail" />
                        <input type="submit" value="Sacuvaj promene" />
                    </th>
                    </form>
                </tr>

                <tr>
                    <th colspan="2" style="background-color: grey; color: white;">Promenite lozinku</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <th>Lozinka</th>
                    <td><input type="text" name="pass" /></td>
                </tr>
                <tr>
                    <th>Potvrdite lozinku</th>
                    <td><input type="text" name="pass1" /></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" value="Sacuvaj promene" /></th>
                </tr>
                <tr>
                    <th colspan="2" style="background-color: grey; color: white;">Izbrisi nalog</th>
                </tr>
                <tr>
                    <th colspan="2">
                        <form method="post" action="<?php echo base_url("Account/delete"); ?>">
                            <input type="hidden" value="<?php echo $user->mail ?>" name="idseller"/>
                            <input type="submit" value="Obrisi" onclick="return confirm('Da li ste sigurni da zelite da obrisete ?')" />
                        </form>
                    </th>
                </tr>
            </table>
        </div>

    </div>
</div>