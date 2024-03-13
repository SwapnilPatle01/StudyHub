<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["psw"];

    if (!empty($email) && !empty($password)) {
        $host = "localhost";
        $dbemail = "root";
        $dbpassword = "";
        $dbname = "StudyHubStudents";

        $conn = new mysqli($host, $dbemail, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $SELECT = "SELECT email FROM register WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO register (email, password) VALUES (?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum === 0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            echo "New record inserted successfully";
        } else {
            echo "Someone is already registered using this email";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "All the fields are required";
    }
}

?>
