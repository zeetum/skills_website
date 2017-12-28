<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/main.js"></script>
    </body>
</html>
