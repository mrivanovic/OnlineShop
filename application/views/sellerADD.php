<?php $this->load->view( "sabloni/profile_menu"); ?>
<div class="ADD">
    <form name="Add" method="get" action="<?php echo base_url('Category/insertProduct');?>">
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
                <th>Name:</th>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td colspan="2"><textarea name="desc"></textarea></td>
            </tr>
            <tr>
                <th>Category:</th>
                <td colspan="2">
                    <select style="width: 200px; text-align: center;" name="category">
                        <option>-</option>
                        <?php foreach ($category as $element):?>
                            <option value="<?php echo $element['id'];?>"><?php echo $element['ime'];?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input type="number" name="price" style="width: 200px;" /></td>
                <td>
                    <select style="width: 60px; text-align: center;" name="currency">
                        <option>-</option>
                        <?php foreach ($currency as $element):?>
                            <option value="<?php echo $element['id'];?>"><?php echo $element['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Delivery:</th>
                <td colspan="2">
                    <select style="width: 200px; text-align: center;" name="delivery">
                        <option>-</option>
                        <?php foreach ($delivery as $element):?>
                            <option value="<?php echo $element['id'];?>"><?php echo $element['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="3"><button type="submit">ADD</button> </th>
            </tr>
        </table>
    </form>
</div>