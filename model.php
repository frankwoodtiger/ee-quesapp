<?php
	class QuesAnsPair {
		private $ques_id;
		private $question;
		private $answers;
		private $answer;
		
		function __construct($ques_id, $question, $answers, $answer) {
			$this->ques_id = $ques_id;
			$this->question = $question;
			$this->answers = $answers;
			$this->answer = $answer;
		}
		
		public function getQuesId() {
			return $this->ques_id;
		}
		
		public function getQuestion() {
			return $this->question;
		}
		
		public function getAnswers() {
			return $this->answers;
		}
		
		public function getAnswer() {
			return $this->answer;
		}
		
		public function getJSON() {
			return "{" .
				"ques_id:" . $this->ques_id . "," .
				"question:\"" . $this->question . "\"," .
				"answers:[\"" . implode('","', $this->answers) . "\"]," .
				"answer:\"" . $this->answer . "\"" .
			"}";
		}
	}
	
	/*
	$QAP = new QuesAnsPair("1", "Where are you?", array("Hong Kong","Seattle","New York","Charlotte"), "Hong Kong");
	echo $QAP->getQuestion() . "\n";
	echo $QAP->getJSON() . "\n";
	*/
?>