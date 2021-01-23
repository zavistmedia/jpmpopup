<?php
	if(isset($_POST['comment']) && !empty($_POST['comment'])){
		$comment = htmlentities(strip_tags(trim($_POST['comment'])));
		$time = htmlentities(strip_tags(trim($_POST['datetime'])));
		$comment = str_ireplace("|","",$comment);
		$comment = str_ireplace("~","",$comment);
		$comment = (strlen($comment) > 400) ? substr($comment, 0, 400) . "..." : $comment;
		$id = strip_tags(trim($_POST['id']));
		$id = preg_replace("/[^A-Za-z0-9.\-]/", "", $id);
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
		$file = "dbs/".$id."-db.txt";
		//$time = time();
		if(file_exists($file)){
			if(is_writable($file)){
				file_put_contents($file,$comment."|".$time."|".$ip."~",FILE_APPEND | LOCK_EX);
			}
		}else {
			file_put_contents($file,$comment."|".$time."~",LOCK_EX);
		}
		echo '<div class="acomment"><p>'.$comment.'</p><time>just posted</time></div>';
	}
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$comments = '';
		$id = strip_tags(trim($_GET['id']));
		$id = preg_replace("/[^A-Za-z0-9.\-]/", "", $id);
		$file = "dbs/".$id."-db.txt";
		if(file_exists($file)){
			$fcomments = file_get_contents($file);
			$a = explode("~",$fcomments);
			$commentsa = array_reverse($a);
			$i = 1;
			foreach($commentsa as $comment){
				if($i > 20){
					break;
				}
				if(!empty($comment)){
					$comment = explode("|",$comment);
					//$datetime = gmdate("Y-m-d\TH:i:s\Z", $comment[1]);
					$datetime = $comment[1];
					$comments .= '<div><p>'.$comment[0].'</p><time class="timeago" datetime="'.$datetime.'">'.$datetime.'</time></div>';
					$i++;
				}
			}
		}
		echo $comments;
	}
?>