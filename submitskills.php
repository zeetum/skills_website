<?PHP
$user = 'skills';
$pass = 'Holidays2';
$conn = new PDO('mysql:host=localhost;dbname=skills', $user, $pass);

if (isset($_POST["name"])) {
    echo "<h1>Submitted</h1>";
    echo "<meta http-equiv='refresh' content='0; url=getskills.php' />";

    $stmt = $conn->prepare("INSERT INTO skills
			    (staff_name, completion_date, 
                             q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14)
			    VALUES
			    (:staff_name, NOW(), 
                             :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10, :q11, :q12, :q13, :q14)");

    $stmt->execute(array(
        "staff_name" => $_POST["name"],
	"q1" => $_POST["q1"],
	"q2" => $_POST["q2"],
	"q3" => $_POST["q3"],
	"q4" => $_POST["q4"],
	"q5" => $_POST["q5"],
	"q6" => $_POST["q6"],
	"q7" => $_POST["q7"],
	"q8" => $_POST["q8"],
	"q9" => $_POST["q9"],
	"q10" => $_POST["q10"],
	"q11" => $_POST["q11"],
	"q12" => $_POST["q12"],
	"q13" => $_POST["q13"],
	"q14" => $_POST["q14"]
    ));
}

$conn = null;
