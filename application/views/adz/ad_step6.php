
<div class="step2_upper">
    <h2>Place Ad : Confirm Contact Details</h2>
</div>


<div class="content" style="background-color:#376388;padding:20px 40px;border-radius:5px; margin:20px auto 20px auto;">
    <form action='<?= $action ?>' method='post'  class="form_content_bike2biker">
        <? $seller_email = $this->session->userdata('seller_email'); ?>

        <table class="rajib_table_content">

            <tr>

                <th>Email :*</th>
                <td><input class="select-style2" type="email" name="seller_email" size="30" value="<? echo (($session_array['seller_email']) ? $session_array['seller_email'] : $this->session->userdata('user_email'));  ?>"/>
                    <?= '<br/>' . form_error('seller_email', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Your Name:*</th>
                <td><input class="select-style2" type="text" name="seller_name" size="30" value="<? echo (($session_array['seller_name']) ? $session_array['seller_name'] : $this->session->userdata('user_full_name'));  ?>"/>
                    <?= '<br/>' . form_error('seller_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Your Mobile:*</th>
                <td><input class="select-style2" type="text" name="seller_phone" size="30" value="<? echo (($session_array['seller_phone']) ? $session_array['seller_phone'] : $this->session->userdata('user_phone'));  ?>"/>
                    <?= '<br/>' . form_error('seller_phone', '<span>', '</span>') ?></td>
            </tr>

            <tr>
                <th>Your Mobile 2:</th>
                <td><input class="select-style2" type="text" name="mobile_phone2" size="30" value="<?= $session_array['mobile_phone2'] ?>"/>
                </td>
            </tr>

            <tr>
                <th>Home Phone:</th>
                <td><input class="select-style2" type="text" name="land_phone" size="30" value="<?= $session_array['land_phone'] ?>"/>
                </td>
            </tr>


        </table>

        <div class="clear"></div>

</div>


  <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step">
        <input  class="next_previous_button" type="submit" name="save" value="Preview Your Ad"/>
    </span>

<!--<div style="margin-bottom: 50px;">
    <span style="text-align:left; margin-left: 20px;">
        <a class="next_previous_button" href="" onclick='window.history.back();'>
            < Previous Step
        </a>
    </span>
    <span  style="float:right; margin-right: 20px">        
        <input  class="next_previous_button" type="submit" name="save" value="Preview Your Ad"/>
    </span>
</div>-->
</form>
</div>




<!--
<div class="search_by_r">
    <p>Place Ad : Confirm Contact Details</p>
</div>
<div class="clear"></div>

<div class="content">


<?php
//if ($msg != '') {
  //  echo "<div class='success'>" . $msg . "</div>";
//}//
?>
<div style="background-color:#fff;width:100%;">
    <div style="padding:14px;text-align: left;">
    <form id="valid_adz" action="<?//= $action ?>" method="post" enctype="multipart/form-data">

<?// $seller_email = $this->session->userdata('seller_email'); ?>

        <table class="rajib_table_content">
            <tr><td colspan="3">Please Confirm that contact details below are correct</td></tr>
            <tr>

                <th>Email :<span style="color: red;">*</span></th>
                <td><input class="select-style2" type="text" name="seller_email" size="30" value="<? //$_REQUEST['seller_email'] ?>"/>
<?//= '<br/>' . form_error('seller_email', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Your Name:<span style="color: red;">*</span></th>
                <td><input class="select-style2" type="text" name="seller_name" size="30" value="<?//= $_REQUEST['seller_name'] ?>"/>
<?//= '<br/>' . form_error('seller_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Your Mobile:<span style="color: red;">*</span></th>
                <td><input class="select-style2" type="text" name="seller_phone" size="30" value="<?//= $_REQUEST['seller_phone'] ?>"/>
<?//= '<br/>' . form_error('seller_phone', '<span>', '</span>') ?></td>
            </tr>
                        
                         <tr>
                <th>Your Mobile 2:<span style="color: red;">*</span></th>
                <td><input class="select-style2" type="text" name="mobile_phone2" size="30" value="<?//= $_REQUEST['mobile_phone2'] ?>"/>
               </td>
            </tr>
                        
                        <tr>
                <th>Home Phone:</th>
                <td><input class="select-style2" type="text" name="land_phone" size="30" value="<?//= $_REQUEST['land_phone'] ?>"/>
                  </td>
            </tr>
                        
        </table>
        <br/>
        <input type="button"  style="float:left;" class="button" name="cancel" value="Previous Step" onclick='window.history.back();'/>
        <input type="submit" style="float:right;" name="save" class="button" value="Preview Your Ad"/>
        <div class="clear"></div>
    </form>
</div>
    </div>
    </div>-->
