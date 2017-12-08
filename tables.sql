CREATE TABLE skills (
	staff_name VARCHAR(20) NOT NULL,
	completion_date DATETIME NOT NULL,
	q1 INT,
	q2 INT,
	q3 INT,
	q4 INT,
	q5 INT,
	q6 INT,
	q7 INT,
	q8 INT,
	q9 INT,
	q10 INT,
	q11 INT,
	q12 INT,
	q13 INT,
	q14 INT,

	PRIMARY KEY(staff_name, completion_date)
);

CREATE TABLE questions (
	q_id VARCHAR(20) NOT NULL,
	sentence VARCHAR(255),

	PRIMARY KEY(q_id)
);

insert into questions (q_id, sentence) VALUES ('q1', "The quick brown fox");
