<?php $this->load->view( "sabloni/profile_menu"); ?>
<div class="ADD">
    <form name="Add" method="get" action="<?php echo base_url('Category/insertProduct');?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td rowspan="2"><label for="image">
                    <input type="file" name="image[]" id="image" style="display:none;" multiple />
                    <img src="<?php echo base_url() /*($user->image != null ? $user->image :*/ ; ?>img/profile.png" style="height: 200px; width: 200px; border: 1px solid grey; padding: 5px;">
                </label></td>
                <td</td>
                <td><label for="image1">
                    <input type="file" name="image[]" id="image1" style="display:none;" multiple />
                    <img src="<?php echo base_url()  /*($user->image != null ? $user->image :*/; ?>img/profile.png" style="height: 100px; width: 100px; border: 1px solid grey; padding: 5px;">
                </label></td>
                <td><label for="image2">
                        <input type="file" name="image[]" id="image2" style="display:none;" multiple/>
                        <img src="<?php echo base_url()  /*($user->image != null ? $user->image :*/; ?>img/profile.png" style="height: 100px; width: 100px; border: 1px solid grey; padding: 5px;">
                    </label></td>
            </tr>
            <tr>
                <td><label for="image3">
                    <input type="file" name="image[]" id="image3" style="display:none;" multiple/>
                    <img src="<?php echo base_url() /*($user->image != null ? $user->image :*/; ?>img/profile.png" style="height: 100px; width: 100px; border: 1px solid grey; padding: 5px;">
                </label></td>
                <td><label for="image4">
                    <input type="file" name="image[]" id="image4" style="display:none;" multiple/>
                    <img src="<?php echo base_url() /*($user->image != null ? $user->image :*/; ?>img/profile.png" style="height: 100px; width: 100px; border: 1px solid grey; padding: 5px;">
                </label></td>
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