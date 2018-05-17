<?php $this->load->view( "sabloni/profile_menu"); ?>
<div class="ADD">
    <form name="Add" method="get" action="<?php base_url('Account/AddProduct');?>">
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
                        <?php foreach ($category as $element):?>
                            <option><?php echo $element['name'];?></option>
                        <?php endforeach;?>
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
                        <option>Negotiated</option>
                        <option>Personalized Pick-Up</option>
                        <option>Mail order</option>
                        <option>Credit card</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="3"><button type="submit">ADD</button> </th>
            </tr>
        </table>
    </form>
</div>