<?php
include('model.php');

class DAO {
	const DIR = "database/questions.db";
	
	private function connectDB() {
		try {
			return new PDO("sqlite:" . DAO::DIR);
		}
		catch (Exception $e) {
			echo "Could not connect to the database";
			exit;
		}
	}
	
	public function getAnsByQuesID($ques_id) {
		$db = $this->connectDb();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "SELECT ANS FROM NETWORK_THM_QUES WHERE QUES_ID = '" . $ques_id . "'";
		$result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
		return $result[0]['ANS'];
	}
	
	public function getQuesAnsPairByQuesId($ques_id) {
		if ($ques_id < 1 OR $ques_id > 50) {
			echo "QUES_ID:" . $ques_id . " is out of range.";
			return new QuesAnsPair;
		}
		else {
			$db = $this->connectDb();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =  "SELECT * FROM NETWORK_THM_QUES WHERE QUES_ID = " . $ques_id . " limit 1";
			$result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
			return new QuesAnsPair(
				$result[0]['QUES_ID'], 
				$result[0]['QUESTION'], 
				array($result[0]['CHOICE_A'], $result[0]['CHOICE_B'], $result[0]['CHOICE_C'], $result[0]['CHOICE_D']),
				$result[0]['ANS']
			);
		}
	}
	
	public function printAll() {
		$db = $this->connectDB();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query =  "SELECT * FROM NETWORK_THM_QUES";
		
		foreach ($db->query($query) as $row) {
			$sep = "";
			echo $row[0];
			foreach($row as $col) {
				echo $sep . "," . $col;
				$sep = ',';
			}
			echo "\n";
		}
	}
	
	public function printDimension() {
		$db = $this->connectDB();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$query =  "PRAGMA table_info('NETWORK_THM_QUES')";
		$result = $db->query($query);
		$colCount = count($result->fetchAll(PDO::FETCH_ASSOC));
		
		$query = "SELECT COUNT(QUES_ID) FROM NETWORK_THM_QUES";
		$rowCount = $db->query($query)->fetchColumn();
		echo $rowCount . "x" . $colCount . "\n";
	}
}

/*
$dao = new DAO;
$dao->printDimension();
$qap = $dao->getQuesAnsPairByQuesId(1);
echo $qap->getJSON();
*/
?>