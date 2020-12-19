<div class="wrap">
        <h2>Movers Forms Options</h2>
        <form method="post" novalidate="novalidate">
            <h3>Main form options</h3>
            <table class="form-table">
                <!-- <tbody>
                    <tr>
                        <th scope="row"><label for="two_step_form">Two step form</label></th>
                        <td><input type="checkbox" name="two_step_form" id="two_step_form" value="true" <?php if($form_options['two_step_form'] == '1') echo "checked"; ?>></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="two_step_form_only_mobile">Two step form mobile only</label></th>
                        <td><input type="checkbox" name="two_step_form_only_mobile" id="two_step_form_only_mobile" value="true" <?php if($form_options['two_step_form_only_mobile'] == '1') echo "checked"; ?>></td>
                    </tr> -->
                    <tr>
                        <th scope="row"><label for="form_header_text">Form header text</label></th>
                        <td><input type="text" name="form_header_text" id="form_header_text" maxlength="255" value="<?php echo $form_options['form_header_text'] ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="redirect_url">Form redirect link</label></th>
                        <td><input type="text" name="redirect_url" id="redirect_url" maxlength="255" value="<?php echo $form_options['redirect_url'] ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="company_id">Copmany ID</label></th>
                        <td><input type="text" name="company_id" id="company_id" maxlength="255" value="<?php echo $form_options['company_id'] ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="primary_color">Primary Color</label></th>
                        <td><input type="text" name="primary_color" id="primary_color" maxlength="255" value="<?php echo $form_options['primary_color'] ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="secondary_color">Secondary Color</label></th>
                        <td><input type="text" name="secondary_color" id="secondary_color" maxlength="255" value="<?php echo $form_options['secondary_color'] ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="send_bitton_text">Send button text</label></th>
                        <td><input type="text" name="send_bitton_text" id="send_bitton_text" maxlength="255" value="<?php echo $form_options['send_bitton_text'] ?>"></td>
                    </tr>
                    <style>
                        .form-table td{
                            vertical-align: baseline;
                        }
                        .form-table td img{
                            max-width:200px; 
                            display:block;
                        }
                    </style>
                    <tr>
                        <th scope="row"><label for="form_preset">Preset</label></th>
                        <td>
                            <input type="radio" name="form_preset" id="form_preset" value="0" <?php echo $form_options['form_preset'] == 0 ? "checked" : ""  ?>>
                            <label>First</label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>presets/img/1.jpg" >
                        </td>
                        <td>
                            <input type="radio" name="form_preset" id="form_preset" value="1" <?php echo $form_options['form_preset'] == 1 ? "checked" : ""  ?>>
                            <label>Second</label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>presets/img/2.jpg" >
                        </td>
                        <td>
                            <input type="radio" name="form_preset" id="form_preset" value="2" <?php echo $form_options['form_preset'] == 2 ? "checked" : ""  ?>>
                            <label>Third</label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>presets/img/3.jpg">
                        </td>
                        <td>
                            <input type="radio" name="form_preset" id="form_preset" value="3" <?php echo $form_options['form_preset'] == 3 ? "checked" : ""  ?>>
                            <label>Fourth</label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>presets/img/4.jpg">
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
            

            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save">
        </form>
    </div>
