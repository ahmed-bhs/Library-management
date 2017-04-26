<?php
	include 'config1.php';
	
	extract($_POST);
	$user_ip = $_SERVER['REMOTE_ADDR'];

	// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
		$dislike_sql = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
		$dislike_count = mysql_result($dislike_sql, 0); 

		$like_sql = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
		$like_count = mysql_result($like_sql, 0); 

	if($act == 'like'): //if the user click on "like"
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "1")');
		}
		if($dislike_count == 1){
			mysql_query('UPDATE wcd_yt_rate SET rate = 1 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
		}

	endif;
	if($act == 'dislike'): //if the user click on "like"
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "2")');
		}
		if($like_count == 1){
			mysql_query('UPDATE wcd_yt_rate SET rate = 2 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
		}

	endif;
?>