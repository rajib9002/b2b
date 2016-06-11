<div class="search_by_r">
    <p>Success</p>
</div>
<div class="clear"></div>
<div class="content">
    <h3>Your Paypal payment is Successful</h3>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" border="0" style="margin-top: 5px; font-family: Tahoma;">
                <tr>
                    <td align="left" style="background-color:#769704; padding:5px; color:#fff;">
                        <div class="dotted"><strong><?php echo $msg;?></strong></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="normal_text" style="color:Green;padding:10px 10px;font-size: 14px;font-family: arial;">
                           . Thank you for transaction!
                           Your Success Paypal Transaction Id : <?php echo $paypal_transaction_id?>
                        </div>
                    </td>
                </tr>
            </table>
    <div class="clear"></div>
    <div style="height:10px;"></div>
    </div>


<?php $session_id = $this->session->unset_userdata('session_id');?>


