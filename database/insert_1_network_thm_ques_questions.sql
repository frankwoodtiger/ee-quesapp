/* 
CREATE TABLE NETWORK_THM_QUES (
	QUES_ID INTEGER PRIMARY KEY AUTOINCREMENT,
	QUESTION TEXT,
	CHOICE_A TEXT,
	CHOICE_B TEXT,
	CHOICE_C TEXT,
	CHOICE_D TEXT,
	ANS TEXT
); 
*/
--insert 1 question
INSERT or REPLACE INTO NETWORK_THM_QUES (
	QUES_ID,
	QUESTION,
	CHOICE_A,
	CHOICE_B,
	CHOICE_C,
	CHOICE_D,
	ANS
) 
values (
	null,
	'Kirchhoff s current law states that',
	'net current flow at the junction is positive',
	'Hebraic sum of the currents meeting at the junction is zero',
	'no current can leave the junction without some current entering it',
	'total sum of currents meeting at the junction is zero',
	'B'
);
