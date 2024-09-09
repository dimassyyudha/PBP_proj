<?php
// Initialize variables to hold form data and errors
$username = $email = $perguruan_tinggi = $program_studi = "";
$hobi = array();
$errors = array();

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate password
function validate_password($password) {
    $errors = array();
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must include at least one uppercase letter.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must include at least one lowercase letter.";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must include at least one number.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    return $errors;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data

    // Username
    if (empty($_POST["username"])) {
        $errors['username'] = "Username is required.";
    } else {
        $username = sanitize_input($_POST["username"]);
        if (!preg_match('/^[a-zA-Z]+$/', $username)) {
            $errors['username'] = "Username must only contain letters.";
        }
    }
    
    // Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required.";
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }
    }
    
    // Perguruan Tinggi
    if (isset($_POST["perguruan_tinggi"])) {
        $perguruan_tinggi = sanitize_input($_POST["perguruan_tinggi"]);
    }
    
    // Program Studi
    if (empty($_POST["program_studi"])) {
        $errors['program_studi'] = "Program Studi is required.";
    } else {
        $program_studi = sanitize_input($_POST["program_studi"]);
    }
    
    // Hobi
    if (isset($_POST["hobi"]) && is_array($_POST["hobi"])) {
        $hobi = $_POST["hobi"];
        // Sanitize each hobby selection
        $hobi = array_map('sanitize_input', $hobi);
    } elseif (empty($_POST["hobi"])) {
        $hobi = array(); // No hobbies selected
    } else {
        // If hobi is set but not an array, throw an error
        $errors['hobi'] = "Hobi must be an array of selected hobbies or left empty.";
    }

    // Password
    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required.";
    } else {
        $password = sanitize_input($_POST["password"]);
        $password_errors = validate_password($password);
        if (!empty($password_errors)) {
            $errors['password'] = implode(" ", $password_errors);
        }
    }

    // Display errors or show the submitted data
    if (empty($errors)) {
        // Display the submitted data (excluding password)
        echo "<h2>Submitted Data</h2>";
        echo "<p>Username: $username</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Perguruan Tinggi: $perguruan_tinggi</p>";
        echo "<p>Program Studi: $program_studi</p>";
        echo "<p>Hobi: " . (empty($hobi) ? "None" : implode(', ', $hobi)) . "</p>";
    } else {
        // Display errors one by one using JavaScript alerts
        echo "<script>";
        foreach ($errors as $key => $error) {
            echo "alert('$error');";
        }
        echo "history.back();";
        echo "</script>";
    }
}
?>
