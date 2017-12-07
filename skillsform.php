<?PHP
$user = 'skills';
$pass = 'Holidays2';
$conn = new PDO('mysql:host=localhost;dbname=skills', $user, $pass);

// Display users to get skills from
$stmt = $conn->prepare("SELECT DISTINCT staff_name FROM skills");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);



// Display users to get skills from
$stmt = $conn->prepare("SELECT DISTINCT staff_name FROM skills");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<form action='submitskills.php' method='POST' id='skills'>";
echo "<select name='name' change='this.form.submit()'>";
foreach ($result as $user) {
    	echo "<option value=".$user['staff_name'].">".$user['staff_name']."</option>";
}
echo "</select>";

echo "<form action='submitskills.php' method='POST' id='skills'><br>";
echo "<input type='range' min='1' max='4' name='q1'><br>";
echo "<input type='range' min='1' max='4' name='q2'><br>";
echo "<input type='range' min='1' max='4' name='q3'><br>";
echo "<input type='range' min='1' max='4' name='q4'><br>";
echo "<input type='range' min='1' max='4' name='q5'><br>";
echo "<input type='range' min='1' max='4' name='q6'><br>";
echo "<input type='range' min='1' max='4' name='q7'><br>";
echo "<input type='range' min='1' max='4' name='q8'><br>";
echo "<input type='range' min='1' max='4' name='q9'><br>";
echo "<input type='range' min='1' max='4' name='q10'><br>";
echo "<input type='range' min='1' max='4' name='q11'><br>";
echo "<input type='range' min='1' max='4' name='q12'><br>";
echo "<input type='range' min='1' max='4' name='q13'><br>";
echo "<input type='range' min='1' max='4' name='q14'><br>";
echo "</form>";
echo "<button type='submit' form='skills'>Submit</button>"; 
	
$conn = null;
?>
