<?PHP
ini_set('display_errors', 1);
$user = 'skills';
$pass = 'Holidays2';
$conn = new PDO('mysql:host=localhost;dbname=skills', $user, $pass);

echo "<h1>Get Users Skills</h1>";

// Create New User if required
if (isset($_POST["new"])) {
    $stmt = $conn->prepare("INSERT INTO skills 
			    (staff_name, completion_date, q1)
			    VALUES
			    (:staff_name, NOW(), 1)");

    $stmt->execute(array(
        "staff_name" => $_POST["new"],
    ));
}


// Display users to get skills from
$stmt = $conn->prepare("SELECT DISTINCT staff_name FROM skills");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<form action='getskills.php' method='POST' id='selectuser'>";
echo "Select User<br>";
echo "<select name='name' change='this.form.submit()'>";
foreach ($result as $user) {
    	echo "<option value=".$user['staff_name'].">".$user['staff_name']."</option>";
}
echo "</select>";
echo "<br>New User<br>";
echo "<input type='text' name='new'>";
echo "</form>";
echo "<button type='submit' form='selectuser'>Submit</button>"; 


// Display latest Skills from User
if (isset($_POST['name'])) {
	echo "<h1>".$_POST['name']." Records</h1>";
	
	// Get answers for the selected user
	$stmt = $conn->prepare("SELECT completion_date FROM skills
                        	WHERE staff_name = :staff_name
		                ORDER BY completion_date DESC");
	$stmt->execute(array(
		"staff_name" => $_POST['name']
	));
	$date_results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// Select the date to print
	echo "<form action='getskills.php' method='POST' id='selectdate'>";
        echo "Select Date<br>";
	echo "<select name='date' change='this.form.submit()'>";
	foreach ($date_results as $date) {
	    	echo "<option value='".$date['completion_date']."'>".$date['completion_date']."</option>";
	}
	echo "</select>";
	echo "<input type='hidden' name='name' value=".$_POST['name'].">";
	echo "</form>";
	echo "<button type='submit' form='selectdate'>Get Data</button>"; 
	
	if (isset($_POST['date'])) {
		// Get Skills Data
		$stmt = $conn->prepare("SELECT q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14 FROM skills
                                	WHERE staff_name = :staff_name AND completion_date = :completion_date");
		$stmt->execute(array(
			"staff_name" => $_POST['name'],
			"completion_date" => $_POST['date']
		));
		$user_results = $stmt->fetch(PDO::FETCH_NUM);
		
		// Get question sentences
		$stmt = $conn->prepare("SELECT sentence FROM questions
					ORDER BY q_id");
		$stmt->execute();
		$sentence = $stmt->fetchAll(PDO::FETCH_NUM); 

		// Print results
                foreach ($user_results as $key => $value) {
		    echo "<p>".$sentence[$key][0].": ".$value."</p>";
		}
	}
}
	
$conn = null;
?>
