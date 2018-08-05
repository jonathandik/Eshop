<?php
	error_reporting(E_ERROR); //hide errors.
	include ("includes/db_connection.php"); //connected to database
	
	$userVote=trim($_POST["vote"]); //retrieves user's vote.
	
	/*FILTER_SANITIZE_STRING remove all HTML tags from a stringFILTER_SANITIZE_STRING,
	FILTER_FLAG_STRIP_LOW remove chars with ascii value < 32,FILTER_FLAG_STRIP_HIGH Remove characters with ASCII value > 127.*/
	$voteOneTimeId = filter_var(trim($_POST["oneTimeId"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		
	$voteOneTimeId = hash('md5', $voteOneTimeId); //Message Digest algorithm 5 is used for security reasons.
		
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die(); //check whether it is an AJAX request.
    } 
	
	switch ($userVote)
	{							
		case 'like': //determines that user likes the site.
						
			if (isset($_COOKIE["voted_".$voteOneTimeId])) //$_COOKIE[] variable is used to check whether user has already voted.
			{
				header('HTTP/1.1 500 You are allowed to vote only once!'); //There is a cookie so the user has already voted.
				exit();
			}			
			
			$sqlLike="SELECT LIKEVOTE FROM countvotes WHERE VOTEONETIMEID='$voteOneTimeId' LIMIT 1";			
			$sqlLike_result = $conn->query($sqlLike);
			$total_rows = $sqlLike_result->fetch_assoc(); //like vote is retrieved from database by VOTEONETIMEID.
			
			if($total_rows)
			{
				$sqlUpdate="UPDATE countvotes SET LIKEVOTE=LIKEVOTE+1 WHERE VOTEONETIMEID='$voteOneTimeId'";
				$sqlLike_result = $conn->query($sqlUpdate); //in case there is a record update the like vote.
			}else{
				$sqlInsert="INSERT INTO countvotes (VOTEONETIMEID, LIKEVOTE) value('$voteOneTimeId',1)";
				$sqlLike_result = $conn->query($sqlInsert); //in case there is NOT a record insert one.				
			}
			
			setcookie("voted_".$voteOneTimeId, 1, time()+31556926); //determines that Cookie will expire in one year.
			echo ($total_rows["LIKEVOTE"]+1); //display total liked votes.
			break;	
				
		case 'dislike': //determines that user dislikes the site.
						
			if (isset($_COOKIE["voted_".$voteOneTimeId])) //$_COOKIE[] variable is used to check whether user has already voted.
			{
				header('HTTP/1.1 500 You are allowed to vote only once!'); //There is a cookie so the user has already voted.
				exit();
			}
			
			$sqlDislike="SELECT DISLIKEVOTE FROM countvotes WHERE VOTEONETIMEID='$voteOneTimeId' LIMIT 1";			
			$sqlDislike_result = $conn->query($sqlDislike);
			$total_rows = $sqlDislike_result->fetch_assoc(); //dislike vote is retrieved from database by VOTEONETIMEID.					
			
			if($total_rows)
			{
				$sqlUpdate="UPDATE countvotes SET DISLIKEVOTE=DISLIKEVOTE+1 WHERE VOTEONETIMEID='$voteOneTimeId'";
				$sqlDislike_result = $conn->query($sqlUpdate); //in case there is a record update the dislike vote.
			}else{
				$sqlInsert="INSERT INTO countvotes (VOTEONETIMEID, DISLIKEVOTE) value('$voteOneTimeId',1)";
				$sqlDislike_result = $conn->query($sqlInsert); //in case there is NOT a record insert one.
			}		
			
			setcookie("voted_".$voteOneTimeId, 1, time()+31556926); //determines that Cookie will expire in one year.
			echo ($total_rows["DISLIKEVOTE"]+1);//display total disliked votes.
			break;	
				
		case 'checkVote': //check each vote.	
			$sql = "SELECT LIKEVOTE,DISLIKEVOTE FROM countvotes WHERE VOTEONETIMEID='$voteOneTimeId' LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc(); //retrieve each vote from database via VOTEONETIMEID.
			
			if (!$row) {
				echo "An error occured"; 
			}
				
			$likeVote = ($row["LIKEVOTE"])?$row["LIKEVOTE"]:0; 
			$dislikeVote = ($row["DISLIKEVOTE"])?$row["DISLIKEVOTE"]:0; //indicates that value is NOT empty.
						
			$sendResponse = array('LIKEVOTE'=>$likeVote, 'DISLIKEVOTE'=>$dislikeVote);
			echo json_encode($sendResponse); //convert PHP var $sendResponse into JSON.
			break;
	}
	$conn->close();
?>