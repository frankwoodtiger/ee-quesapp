<?php
include_once("DAO.php");
if (isset($_POST)) {
	$ques_id = $_POST["ques_id"];
	$ans = explode("-", $_POST["ans"])[1];
	$dao = new DAO;
	$db_ans = $dao->getAnsByQuesId($ques_id);
	if (strcmp($ans, $db_ans) == 0) {
		echo "{\"correctness\":\"correct\", \"ans\":\"" . $db_ans . "\"}";
	}
	else {
		echo "{\"correctness\":\"incorrect\", \"ans\":\"" . $db_ans . "\"}";
	}
}
?>