<div class="search_by_r">
    <p>Place Ad : Contact Details</p>
</div>
<div class="clear"></div>
<div class="content">

    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>
<div style="padding:14px;text-align: left;">
    <form id="valid_adz" action="<?= $action ?>" method="post" enctype="multipart/form-data">

        <table class="rajib_table_content">
            <tr><td colspan="2">
            Your Email Address will be used to edit or delete your ad later</td>
            </tr>

            <tr>

                <th>Email :<span style="color: red;">*</span></th>
                <td><input class="select-style2" type="text" name="seller_email" size="30" value="<? $_REQUEST['seller_email'] ?>"/>
                    <?= form_error('seller_email', '<span>', '</span>') ?></td>
            </tr>
        </table>
        <br/>
        <input type="button" style="margin-left: 14px;float:left;"  class="button" name="cancel" value="Previous Step" onclick='window.history.back();'/>
        <input type="submit" style="margin-right: 14px;float:right;" name="save" class="button" value="Next Step"/>




        <div class="clear"></div>
    </form>
    </div>
</div>
