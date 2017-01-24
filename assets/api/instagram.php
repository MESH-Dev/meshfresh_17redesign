<?php
	function getInstagram(){
		$json = file_get_contents('https://api.instagram.com/v1/users/1167443738/media/recent?access_token=1167443738.d346c1d.1213de64f26e485e8ffe33eab03e1905');
		$obj = json_decode($json);
		return $obj->data;
	}
?>
 