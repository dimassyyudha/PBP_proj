<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign On Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student Sign On Form</h1>
    <form action="validationform.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" pattern="[A-Za-z]+" required>
                    <span>Note: Username cannot contain numbers</span>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <span>Note: Email must contain @ followed by a domain</span>
                </td>
            </tr>
            <tr>
                <td>Perguruan Tinggi:</td>
                <td><input type="text" name="perguruan_tinggi" required></td>
            </tr>
            <tr>
                <td><label for="program_studi" required>Program Studi:</label></td>
                <td>
                    <label><input type="radio" name="program_studi" value="Informatika"> Informatika</label><br>
                    <label><input type="radio" name="program_studi" value="Matematika"> Matematika</label><br>
                    <label><input type="radio" name="program_studi" value="Fisika"> Fisika</label><br>
                    <label><input type="radio" name="program_studi" value="Kimia"> Kimia</label><br>
                    <label><input type="radio" name="program_studi" value="Statistika"> Statistika</label><br>
                    <label><input type="radio" name="program_studi" value="Biologi"> Biologi</label>
                </td>
            </tr>
            <tr>
                <td><label for="hobi">Hobi:</label></td>
                <td>
                    <label><input type="checkbox" name="hobi1" value="Futsal"> Futsal</label><br>
                    <label><input type="checkbox" name="hobi2" value="Badminton"> Badminton</label><br>
                    <label><input type="checkbox" name="hobi3" value="Membaca"> Membaca</label><br>
                    <label><input type="checkbox" name="hobi4" value="Menulis"> Menulis</label><br>
                    <label><input type="checkbox" name="hobi5" value="Travelling"> Travelling</label>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td>
                    <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <span>Hint: Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one number.</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
