<!--  
Membuat tampilan web form sederhana
NAMA :
1. Dimas Yudha Saputra     24060122120025
2. Zikry Alfahri Akram     24060122120033
3. Ardy Hasan Rona Akhmad  24060122130053
4. Yahya Ilham Riyadi      24060122130069

KELAS : PBP-D 
-->

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
                    <input type="text" name="username">
                    <span>Note: Username cannot contain numbers</span>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email">
                    <span>Note: Email must contain @ followed by a domain</span>
                </td>
            </tr>
            <tr>
                <td>Perguruan Tinggi:</td>
                <td><input type="text" name="perguruan_tinggi" ></td>
            </tr>
            <tr>
                <td><label for="program_studi" >Program Studi:</label></td>
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
                    <input type="checkbox" name="hobi[]" value="Futsal" id="Futsal"> <label for="Futsal">Futsal</label><br>
                    <input type="checkbox" name="hobi[]" value="Badminton" id="Badminton"> <label for="Badminton">Badminton</label><br>
                    <input type="checkbox" name="hobi[]" value="Membaca" id="Membaca"> <label for="Membaca">Membaca</label><br>
                    <input type="checkbox" name="hobi[]" value="Menulis" id="Menulis"> <label for="Menulis">Menulis</label><br>
                    <input type="checkbox" name="hobi[]" value="Travelling" id="Travelling"><label for="Travelling">Travelling</label><br> 
                </td>
            </tr>

            <tr>
                <td><label for="password">Password:</label></td>
                <td>
                    <input type="password" name="password">
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