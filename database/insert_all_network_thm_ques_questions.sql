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

-- Regular Exp to capture from the text using notepad++
-- (\d|\d\d)\.\s+(.*?)\r\n\(a\)\s+(.*?)\r\n\(b\)\s+(.*?)\r\n\(c\)\s+(.*?)\r\n\(d\)\s+(.*?)\r\nAns: (\w)
-- \(($1),'($2)','($3)','($4)','($5)','($6)','($7)'\)\,

--insert all question
INSERT or REPLACE INTO NETWORK_THM_QUES (
	QUES_ID,
	QUESTION,
	CHOICE_A,
	CHOICE_B,
	CHOICE_C,
	CHOICE_D,
	ANS
) 
values 
(1,'Kirchhoff s current law states that ','net current flow at the junction is positive','Hebraic sum of the currents meeting at the junction is zero','no current can leave the junction without some current entering it.','total sum of currents meeting at the junction is zero','b'),

(2,'According to Kirchhoffs voltage law, the algebraic sum of all IR drops and e.m.fs. in any closed loop of a network is always','negative ','positive','determined by battery e.m.fs.','zero','d'),

(3,'Kirchhoffs current law is applicable to only','junction in a network','closed loops in a network','electric circuits','electronic circuits','a'),

(4,'Kirchhoffs voltage law is related to','junction currents','battery e.m.fs.','IR drops','both (b) and (c)','d'),

(5,'Superposition theorem can be applied only to circuits having','resistive elements','passive elements','non-linear elements','linear bilateral elements','d'),

(6,'The concept on which Superposition theorem is based is','reciprocity','duality','non-linearity','linearity','d'),

(7,'Thevenin resistance Rth is found','by removing voltage sources along with their internal resistances','by short-circuiting the given two terminals','between any two ''open'' terminals','between same open terminals as for Etk','d'),

(8,'An ideal voltage source should have','large value of e.m.f.','small value of e.m.f.','zero source resistance','infinite source resistance','c'),

(9,'For a voltage source','terminal voltage is always lower than source e.m.f.','terminal voltage cannot be higher than source e.m.f.','the source e.m.f. and terminal voltage are equal','none of the above','b'),

(10,'To determine the polarity of the voltage drop across a resistor, it is necessary to know','value of current through the resistor','direction of current through the resistor','value of resistor','e.m.fs. in the circuit','b'),

(11,'"Maximum power output is obtained from a network when the load resistance is equal to the output resistance of the network as seen from the terminals of the load". The above statement is associated with','Millman''s theorem','Thevenin''s theorem','Superposition theorem','Maximum power transfer theorem','d'),

(12,'"Any number of current sources in parallel may be replaced by a single current source whose current is the algebraic sum of individual source currents and source resistance is the parallel combination of individual source resistances". The above statement is associated with','Thevenin''s theorem','Millman''s theorem','Maximum power transfer theorem','None of the above','b'),

(13,'"In any linear bilateral network, if a source of e.m.f. E in any branch produces a current I in any other branch, then same e.m.f. acting in the second branch would produce the same current / in the first branch". The above statement is associated with','compensation theorem','superposition theorem','reciprocity theorem','none of the above','c'),

(14,'Which of the following is non-linear circuit parameter ?','Inductance   ','Condenser','Wire wound resistor','Transistor','a'),

(15,'A capacitor is generally a','bilateral and active component','active, passive, linear and nonlinear component','linear and bilateral component','non-linear and active component','c'),

(16,'"In any network containing more than one sources of e.m.f. the current in any branch is the algebraic sum of a number of individual fictitious currents (the number being equal to the number of sources of e.m.f.), each of which is due to separate action of each source of e.m.f., taken in order, when the remaining sources of e.m.f. are replaced by conductors, the resistances of which are equal to the internal resistances of the respective sources". The above statement is associated with','Thevenin''s theorem','Norton''s theorem','Superposition theorem','None of the above','c'),

(17,'Kirchhoff s law is applicable to','passive networks only','a.c. circuits only','d.c. circuits only','both a.c. as well d.c. circuits','d'),

(18,'Kirchhoff s law is not applicable to circuits with','lumped parameters','passive elements','distributed parameters','non-linear resistances','c'),

(19,'Kirchhoff s voltage law applies to circuits with','nonlinear elements only','linear elements only','linear, non-linear, active and passive elements','linear, non-linear, active, passive, time varying as wells as time-in-variant elements','d'),

(20,'The resistance LM will be','6.66 Q ','12 Q','18Q ','20Q','a'),

(21,'For high efficiency of transfer of power, internal resistance of the source should be','equal to the load resistance','less than the load resistance','more than the load resistance','none of the above','b'),

(22,'Efficiency of power transfer when maximum transfer of power c xerosis','100% ','80%','75% ','50%','d'),

(23,'If resistance across LM in Fig. 2.30 is 15 ohms, the value of R is','10 Q ','20 Q ','30 Q ','40 Q','c'),

(24,'For maximum transfer of power, internal resistance of the source should be','equal to load resistance','less than the load resistance','greater than the load resistance','none of the above','a'),

(25,'If the energy is supplied from a source, whose resistance is 1 ohm, to a load of 100 ohms the source will be','a voltage source','a current source','both of above','none of the above','a'),

(26,'The circuit whose properties are same in either direction is known as','unilateral circuit','bilateral circuit','irreversible circuit','reversible circuit','b'),

(27,'In a series parallel circuit, any two resistances in the same current path must be in','series with each other','parallel with each other','series with the voltage source','parallel with the voltage source','a'),

(28,'The circuit has resistors, capacitors and semi-conductor diodes. The circuit will be known as','non-linear circuit','linear circuit','bilateral circuit','none of the above','a'),

(29,'A non-linear network does not satisfy','superposition condition','homogeneity condition','both homogeneity as well as superposition condition','homogeneity, superposition and associative condition','c'),

(30,'An ideal voltage source has','zero internal resistance','open circuit voltage equal to the voltage on full load','terminal voltage in proportion to current','terminal voltage in proportion to load','a'),

(31,'A network which contains one or more than one source of e.m.f. is known as','linear network','non-linear network','passive network','active network','c'),

(32,'The superposition theorem is applicable to','linear, non-linear and time variant responses','linear and non-linear resistors only','linear responses only','none of the above','c'),

(33,'Which of the following is not a nonlinear element ?','Gas diode ','Heater coil','Tunnel diode ','Electric arc','b'),

(34,'Application of Norton''s theorem to a circuit yields','equivalent current source and impedance in series','equivalent current source and impedance in parallel','equivalent impedance','equivalent current source','a'),

(35,'Millman''s theorem yields','equivalent resistance','equivalent impedance','equivalent voltage source','equivalent voltage or current source','d'),

(36,'The superposition theorem is applicable to','voltage only ','current "only','both current and voltage','current voltage and power','d'),

(37,'Between the branch voltages of a loop the Kirchhoff s voltage law imposes','non-linear constraints','linear constraints','no constraints','none of the above','b'),

(38,'A passive network is one which contains','only variable resistances','only some sources of e.m.f. in it','only two sources of e.m.f. in it','no source of e.m.f. in it','d'),

(39,'A terminal where three on more branches meet is known as','node ','terminus','combination  ','anode','a'),

(40,'Which of the following is the passive element ?','Capacitance','Ideal current source','Ideal voltage source','All of the above','a'),

(41,'Which of the following is a bilateral element ?','Constant current source','Constant voltage source','Capacitance','None of the above','c'),

(42,'A closed path made by several branches of the network is known as','branch ','loop','circuit ','junction','b'),

(43,'A linear resistor having 0 &lt; R &lt; &#176;o is a','current controlled resistor','voltage controlled resistor','both current controlled and voltage controlled resistor','none of the above','c'),

(44,'A star circuit has element of resistance R/2. The equivalent delta elements will be','R/6 ','fi?','2R ','4R','b'),

(45,'A delta circuit has each element of value R/2. The equivalent elements of star circuit with be','RIG ','R/3','2R ','3R','a'),

(46,'In Thevenin''s theorem, to find Z','all independent current sources are short circuited and independent voltage sources are open circuited','all independent voltage sources are open circuited and all independent current sources are short circuited','all independent voltage and current sources are short circuited','all independent voltage sources are short circuited and all independent current sources are open circuited','d'),

(47,'While calculating Rth in Thevenin''s theorem and Norton equivalent','all independent sources are made dead','only current sources are made dead','only voltage sources are made dead','all voltage and current sources are made dead','a'),

(48,'The number of independent equations to solve a network is equal to','the number of chords','the number of branches','sum of the number of branches and chords','sum of number of branches, chords and nodes','a'),

(49,'The superposition theorem requires as many circuits to be solved as there are','sources, nodes and meshes','sources and nodes','sources ','nodes','c'),

(50,'Choose the incorrect statement.','A branch formed by the parallel connection of any resistor R and open circuit has the characteristic of an open circuit.','A branch formed by the parallel connection of any resistor R and a short circuit has the characteristic of a short circuit.','A branch formed by the series connection of any resistor R and an open circuit has the characteristic of an open circuit.','A branch formed by the series connection of any resistor R and a short circuit has the characteristic of resistor R.','a');