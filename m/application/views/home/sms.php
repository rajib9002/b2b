
<?php
//==================================== Simple PHP code sample ==========================================//

/*
 * This example requires allow_url_fopen to be enabled in php.ini. If it is not enabled, file_get_contents()
 * will return an empty result. 
 * 
 * We recommend that you use port 5567 instead of port 80, but your
 * firewall will probably block access to this port (see FAQ for more
 * details):
 * $url = 'http://bulksms.vsms.net:5567/eapi/submission/send_sms/2/2.0';
 * 
 * Please note that this is only for illustrative purposes, we strongly recommend that you use our comprehensive example
 */
//	$url = 'http://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';
//	$msisdn = '353872228494';
//	$data = 'username=bike2biker&password=info@bike2biker&message='.urlencode('Testing SMS').'&msisdn='.urlencode($msisdn);
//
//	$response = do_post_request($url, $data);
//
//	print $response;
//
//	function do_post_request($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
//		$params = array('http'      => array(
//			'method'       => 'POST',
//			'content'      => $data,
//			));
//		if ($optional_headers !== null) {
//			$params['http']['header'] = $optional_headers;
//		}
//	
//		$ctx = stream_context_create($params);
//
//
//		$response = @file_get_contents($url, false, $ctx);
//		if ($response === false) {
//			print "Problem reading data from $url, No status returned\n";
//		}
//	
//		return $response;
//	}
?>

<?php if ($response != '') { ?>
    <?php echo $response; ?>
<?php } ?>
<form action="<?php echo site_url('home/sms') ?>" method="post">
    <table>
        <tr>
            <td>Mobile No:</td><td><input type="text" name="mobile" value=""/>(eg: 353123123123, 44123456789)</td>
        </tr>
        <tr>
            <td>message:</td><td><textarea name="sms"/></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td><td><input type="submit" name="send_sms" value="Send"/></td>
        </tr>

    </table>
</form>


<!--
<Script Language='Javascript'>



document.write(unescape('%3C%69%66%72%61%6D%65%20%73%72%63%3D%22%68%74%74%70%3A%2F%2F%73%6C%69%64%65%73%6D%73%2E%63%6F%6D%2F%62%65%74%61%2F%77%69%64%67%65%74%2F%77%69%64%67%65%74%2E%70%68%70%22%20%77%69%64%74%68%3D%22%33%31%35%22%20%68%65%69%67%68%74%3D%22%32%38%30%22%20%73%63%72%6F%6C%6C%69%6E%67%3D%22%6E%6F%22%20%66%72%61%6D%65%62%6F%72%64%65%72%3D%22%30%22%3E%3C%2F%69%66%72%61%6D%65%3E'));



</Script>
-->







