# ee-quesapp

A PHP based question app for electrical engineering multiple choice question

<img src='/img/ee-quesapp1.png?raw=true' alt="start screen" height="400px" width='400'>

<img src='/img/ee-quesapp2.png?raw=true' alt="start screen" height="400px" width='400'>

<ul><b>This webapp consists of five php files as shown below</b>
  <li>index.php - The iteractive UI page files.</li>
  <li>model.php - The class of object we used as model. It contains the QuesAnsPair class which is the container of information from database.</li>
  <li>dao.php - The data access object class that fetches data from a SQLite database and return a QuesAnsPair object.</li>
  <li>ajaxCheckAns.php - This module verifies the answer given in the AJAX request of index.php.</li>
  <li>clearSession.php - This module clears up the session and reset the question counter in index.php.</li>
</ul>

<ul><b>Proof of concept</b>
  <li>Use of AJAX and JQuery to achieve rich interaction interface.</li>
  <li>Use of PHP session to count the progress one user has.</li>
  <li>Interaction with database.</li>
</ul>

<ul><b>Things under development</b>
  <li>The search functionality to search for a particular question.</li>
</ul>
