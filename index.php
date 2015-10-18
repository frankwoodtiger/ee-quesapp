<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/submit-cancel-logic.js"></script>
		<script src="js/search-logic.js"></script>
		<script src="js/clear-session-logic.js"></script>
		<link rel="stylesheet" type="text/css" href="css/theme.css">
	</style>
	</head>
	<?php 
	include("dao.php");
	
	session_start(); // Start of the session
	
	if (!isset($_SESSION['ques_left_count'])) {
		$_SESSION['ques_left_count'] = 50;
		$_SESSION['ques_progress_array'] = range(1,50); // array(1, 2, ... , 50)
	}
	
	$ques_left_count = $_SESSION['ques_left_count'];
	$ques_progress_array = $_SESSION['ques_progress_array'];
	$isAnsAll = false;
	$ques_id = 0;
	$question = "";
	$answers = array("", "", "", "");
	$process_bar_percentage = 0;
	
	if ($ques_left_count == 0) {
		// User has answered all questions
		$isAnsAll = true;
		$process_bar_percentage = 100;
	}
	else {
		$offset = $ques_left_count - 1;
		$random_index = rand(0, $offset);
		
		// this does not work because $ques_progress_array is another reference
		// $ques_id = array_splice($ques_progress_array, $random_index, 1)[0];
		
		// $_SESSION['ques_progress_array'] keeps track of the questions that were not picked
		// We then pick up an random element, and remove it from the progress array
		// array_splice remove the element and returns the array consisting of the extracted elements
		$ques_id = array_splice($_SESSION['ques_progress_array'], $random_index, 1)[0];
		$process_bar_percentage = (50 - $ques_left_count) * 2;
		$ques_left_count--;
		$_SESSION['ques_left_count'] = $ques_left_count;
		
		$dao = new DAO;
		$qap = $dao->getQuesAnsPairByQuesId($ques_id);
		// $ques_id = $qap->getQuesId();
		$question = $qap->getQuestion();
		$answers = $qap->getAnswers();
	}
	$sessionId = session_id();
	session_write_close();  // Closing the PHP's writing pipe line to avoid session locking of PHP session files
	// var_dump($offset);
	// var_dump($random_index);
	// var_dump($_SESSION['ques_progress_array']);
	// var_dump($ques_id);
	// var_dump($ques_left_count);
	?>
	<body>
		<div id="container">
			<a class="button-clear-session" type="button">Clear Session</a>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button id="search-button" type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			<div class="question-wrapper">
				<p><?= $ques_id . ". " . $question ?></p>
				<ol class="answer-list">
					<li id="answer-a"><?= $answers[0] ?></li>
					<li id="answer-b"><?= $answers[1] ?></li>
					<li id="answer-c"><?= $answers[2] ?></li>
					<li id="answer-d"><?= $answers[3] ?></li>
				</ol>
			</div>
			<div id="process-container">
				<div class="progress">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $process_bar_percentage ?>"
				  aria-valuemin="0" aria-valuemax="100" style="width:<?= $process_bar_percentage ?>%">
					<?= $process_bar_percentage ?>%
				  </div>
				</div>
			</div>
			<p>Session id: <?= $sessionId ?></p>
		</div>
		<!-- using the HTML element dataset property to pass PHP variable to JavaScript -->
		<div id="ques-id-container" data-ques-id="<?= $ques_id ?>">
	</body>
	<script>
	$(function() {
		// The DOM is ready!
		<?php if ($isAnsAll == true) { ?>
			$(".question-wrapper").html("<p>Congrats, you have answered all the questions! Please click clear session to restart!</p>");
		<?php } ?>
	});
	</script>
	
</html>