<!--  
Membuat tampilan web form sederhana
NAMA :
1. Dimas Yudha Saputra     24060122120025
2. Zikry Alfahri Akram     24060122120033
3. Ardy Hasan Rona Akhmad  24060122130053
4. Yahya Ilham Riyadi      24060122130069

KELAS : PBP-D 
-->


<?php
$username = $email = $perguruan_tinggi = $program_studi = "";
$hobi = array();
$errors = array();

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $errors['username'] = "Username is required.";
    } else {
        $username = sanitize_input($_POST["username"]);
        if (!preg_match('/^[a-zA-Z]+$/', $username)) {
            $errors['username'] = "Username must only contain letters.";
        }
    }
   
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required.";
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }
    }
    
    if (isset($_POST["perguruan_tinggi"])) {
        $perguruan_tinggi = sanitize_input($_POST["perguruan_tinggi"]);
    }
  
    if (empty($_POST["program_studi"])) {
        $errors['program_studi'] = "Program Studi is required.";
    } else {
        $program_studi = sanitize_input($_POST["program_studi"]);
    }


    if (isset($_POST["hobi"]) && is_array($_POST["hobi"])) {
        $hobi = $_POST["hobi"];
        $hobi = array_map('sanitize_input', $hobi);
    } elseif (empty($_POST["hobi"])) {
        $hobi = array(); 
    }


    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required.";
    } else {
        $password = sanitize_input($_POST["password"]);
        $password_errors = validate_password($password);
        if (!empty($password_errors)) {
            $errors['password'] = implode(" ", $password_errors);
        }
    }

    if (empty($errors)) {
        echo "<script>alert('Form submitted successfully');</script>";
        echo "<h1>Display Detail Informasi Data</h1>";
        echo "<p style = 'font-size:30px;'>Username: $username</p>";
        echo "<p style = 'font-size:30px;'>Email: $email</p>";
        echo "<p style = 'font-size:30px;'>Perguruan Tinggi: $perguruan_tinggi</p>";
        echo "<p style = 'font-size:30px;'>Program Studi: $program_studi</p>";
        if (empty($hobi)) {
            echo "<p style='font-size:30px;'>Hobi: Tidak ada hobi yang dipilih</p>";
        } else {
            echo "<p style='font-size:30px;'>Hobi: " . implode(', ', $hobi) . "</p>";
        }
    } else {
        echo "<script>";
        $semua_error = "";
        foreach ($errors as $key => $error) {
            $semua_error .= $error . "\n";
        }
        $semua_error = json_encode($semua_error);  // biar string aman untuk JavaScript
        echo "alert($semua_error);"; 
        echo "history.back();";
        echo "</script>";
        
    }
}
?>
