<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style type="text/css" media="screen">
        @import url(http://fonts.googleapis.com/css?family=Varela+Round);
        @import url(http://necolas.github.io/normalize.css/3.0.2/normalize.css);
		
		body {
            background: #ECEEEF;
            margin: 100px auto;
            max-width: 462px;
            font: 18px normal 'Varela Round', Helvetica, serif;
            color: #777B7E;
        }
		
		#container {
			// border: 1px solid;
			width: 650px;
			height:670px;
		}
		
		.input-group {
			// border: 1px solid;
			width: 325px;
			float: right;
		}
		
		.question-wrapper {
			background: #fff;
            border-radius: 10px;
            border: 5px solid #D5DDE4;
            padding: 40px 40px;
            margin: 10px 0px;
			width: 650px;
			height: 600px;
			float:left;
		}
		
		.question-wrapper p {
			// border: 1px solid #D5DDE4;
		}
		
		ol.answer-list {
			list-style-type: upper-alpha;
			padding: 0;
            margin: 40px 0 0;
		}

        ol.answer-list li {
			// display: inline-block;
            width: 100%;
            padding: 22px 0;
            margin: 0;
            // border: 1px solid #D5DDE4;
        }		
		
		ol.answer-list li:hover {
			background: #D5DDE4 !important;
		}
		
		.button-clear-session {
			background-color:#e4685d;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			border:1px solid #18ab29;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:arial;
			font-size:12px;
			padding:5px 10px;
			text-decoration:none;
			text-shadow:0px 1px 0px #2f6627;
			margin-top: 5px;
		}
		.button-clear-session:hover {
			background-color:#eb675e;
		}
		.button-clear-session:active {
			position:relative;
			top:1px;
		}
		
		.button-submit {
			background-color:#44c767;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			border:1px solid #18ab29;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:arial;
			font-size:17px;
			padding:16px 31px;
			text-decoration:none;
			text-shadow:0px 1px 0px #2f6627;
		}
		.button-submit:hover {
			background-color:#5cbf2a;
		}
		.button-submit:active {
			position:relative;
			top:1px;
		}
		
		.button-cancel {
			background-color:#e4685d;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			border:1px solid #ffffff;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:arial;
			font-size:17px;
			padding:16px 31px;
			text-decoration:none;
			text-shadow:0px 1px 0px #b23e35;
		}
		.button-cancel:hover {
			background-color:#eb675e;
		}
		.button-cancel:active {
			position:relative;
			top:1px;
		}
		
		#process-container {
			width: 650px;
			float: right
		}
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
	</body>
	<script>
	$(function() {
		// The DOM is ready!
		<?php if ($isAnsAll == true) { ?>
			$(".question-wrapper").html("<p>Congrats, you have answered all the questions! Please click clear session to restart!</p>");
		<?php } else { ?>
			var selectedChoice = "";
			$("ol.answer-list li").on("click", buttonHandler);	
			
			$(document).on("click", ".button-submit",function() { 
				// alert(selectedChoice);
				$.ajax({
					url: 'ajaxCheckAns.php', // this is the PHP module that deals with checking answer by question id.
					type: 'post',
					data: {"ques_id":<?= $ques_id  ?>, "ans": selectedChoice},
					success: function(data, status) {
						console.log("$ques_id:" + "<?= $ques_id  ?>" + ", " + data);
						data = JSON.parse(data); // parse JSON string into JSON object
						if(data["correctness"] == "correct") {
							$(".question-wrapper").append("<br><p id=\"msg\">Correct!</p>");	
						}
						else if (data["correctness"] == "incorrect") {
							$(".question-wrapper").append("<br><p id=\"msg\">Incorrect! Correct answer is " + data["ans"] + ".</p>");	
						}
						
						$(".question-wrapper").fadeOut(3000, function() {
							 window.location.reload();
						});
					},
					error: function(xhr, desc, err) {
						console.log(xhr);
						console.log("Details: " + desc + "\nError:" + err);
					}
				});
			});
			
			// need to use $(document), otherwise wont work for dynamically created elements
			$(document).on("click", ".button-cancel", function() { 
				$(".button-submit, .button-cancel, #msg").fadeOut(500, function() {
					$("#buttons-msg-block").remove();
				});
				$("ol.answer-list li").css("background", "#fff");			
				$("ol.answer-list li").on("click", buttonHandler);
			});
			
			$(document).on("click", "#search-button", function() { 
				alert("search clicked");
			});
			
			function buttonHandler(e){
				$(e.target).css("background", "#BFDFFF"); // Highlight this choice
				selectedChoice = e.target.id; // This saved the choice (the id name) user made
				
				$("ol.answer-list li").off("click"); // Disable click for all choices			
				var submitbutton = "<a class=\"button-submit\" type=\"button\">Submit</a>"
				var cancelbutton = "<a class=\"button-cancel\" type=\"button\">Cancel</a>"
				// need div block to wrap around all things in order to remove them all, otherwise <br> and &nbsp will still be there
				$(".question-wrapper").append("<div id=\"buttons-msg-block\"><br>" + submitbutton + "&nbsp" + cancelbutton + "</div>");		
			}
		<?php } ?>
		
		$(document).on("click", ".button-clear-session", function() { 
			$.ajax({
				url: 'clearSession.php', // this is the PHP module that deals with checking answer by question id.
				type: 'post',
				success: function(data, status) {
					window.location.reload();
				},
				error: function(xhr, desc, err) {
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
				}
			});
		});
	});
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>