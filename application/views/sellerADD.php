<div id="sellProfNav">
    <div class="left">
        <a href="<?php echo base_url('Account/sellerADD')?>">Add Advert</a>
    </div>
    <div class="center">
        <a href=""><i class="fa fa-envelope"></i></a>
    </div>
    <div class="right">
        <a href="#">Advert View</a>
    </div>
</div>
<div class="ADD">
    <table>
        <tr>
            <td rowspan="2"><img src="<?php echo base_url()?>img/img.png" style="width: 200px; height: 250px;"></td>
            <td><img src="<?php echo base_url()?>img/img.png" style="width: 100px; height: 100px;"></td>
            <td><img src="<?php echo base_url()?>img/img.png" style="width: 100px; height: 100px;"></td>
        </tr>
        <tr>
            <td><img src="<?php echo base_url()?>img/img.png" style="width: 100px; height: 100px;"></td>
            <td><img src="<?php echo base_url()?>img/img.png" style="width: 100px; height: 100px;"></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td colspan="2"><textarea ></textarea></td>
        </tr>
        <tr>
            <th>Category:</th>
            <td colspan="2">
                <select style="width: 200px; text-align: center;">
                    <option>--</option>
                    <option>1</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><input type="number" name="price" /></td>
            <td>
                <select>
                    <option>--</option>
                    <option>rsd</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Delivery:</th>
            <td colspan="2">
                <select>
                    <option>--</option>
                    <option>Po dogovoru</option>
                    <option>Licno preuzimanje</option>
                    <option>Placanje pouzecem</option>
                    <option>Placanje karticom</option>
                </select>
            </td>
        </tr>
        <tr>
            <th colspan="3"><button type="submit">ADD</button> </th>
        </tr>
    </table>
</div>