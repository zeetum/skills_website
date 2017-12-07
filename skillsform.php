<?PHP
$user = 'skills';
$pass = 'Holidays2';
$conn = new PDO('mysql:host=localhost;dbname=skills', $user, $pass);


// Select users to get skills from
$stmt = $conn->prepare("SELECT DISTINCT staff_name FROM skills");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<form action='submitskills.php' method='POST' id='skills'>";
echo "<select name='name' change='this.form.submit()'>";
foreach ($result as $user) {
    	echo "<option value=".$user['staff_name'].">".$user['staff_name']."</option>";
}
echo "</select>";

// Display the questions to submit
$stmt = $conn->prepare("SELECT q_id, sentence FROM questions");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $question) {
	echo "<br>".$question['sentence']."<br>";
	echo "<input type='range' min='1' max='4' name='".$question['q_id']."'><br>";
}
echo "</form>";
echo "<button type='submit' form='skills'>Submit</button>"; 
	
$conn = null;
?>
