<!-- cek apakah form telah di submit -->
<?php if (isset($_POST["submit"])) {
function validate($str) {
    return trim(htmlspecialchars($str));
}

// cek apakah "name" sudah diisi 
if (empty($_POST['name'])) {
    $nameError = 'Name should be filled';
} else {
    $name = validate($_POST['name']);
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
        $nameError = 'Name can only contain letters, numbers and white spaces';
    }
}


// cek apakah "username" sudah diisi dengan kombinasi karakter huruf dan angka
if (empty($_POST['username'])) {
    $usernameError = 'User Name should be filled';
} else {
    $username = validate($_POST['username']);
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $usernameError = 'Name can only contain letters, numbers and white spaces';
    }
}

// cek apakah "gender" sudah diisi menggunakan radio button
if (empty($_POST['gender'])) {
    $genderError = 'Please enter your gender';
} else {
    $gender = $_POST['gender'];
}


// cek apakah "birthday" sudah diisi menggunakan calendar 
if (empty($_POST['date'])){
    $dateError = 'Please fill your birthday';
} else{
    $date = validate($_POST['date']);
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
        $dateError = "Field with format YYYY - MM - DD";
}}

// cek apakah "Alamat" sudah diisi menggunakan Text Area
if (empty($_POST['address'])) {
    $addressError = 'Please enter your address';
} else {
    $address = $_POST['address'];
}


// cek apakah "email" sudah diisi dan memiliki karakter '@"
if (empty($_POST['email'])) {
    $emailError = 'Please enter your email';
} else {
    $email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid Email';
    }
}

// cek apakah "Programs" sudah diisi menggunakan check box
if (empty($_POST['programs'])) {
    $programsError = 'Please enter your address';
} else {
    $programs = $_POST['programs'];
}

// cek apakah "City" sudah diisi menggunakan Select Option
if (empty($_POST['city'])) {
    $cityError = 'Please enter your city';
} else {
    $city = $_POST['city'];
}

// jika tidak ada error, tampilkan isi form
if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($genderError)) {
    // great form filling
    echo "You have filled the form successfully!";
    echo "<br>
        Name: $name <br>
        Username : $username <br>
        Gender : $gender <br>
        Birthday : $date <br>
        Address : $address <br>
        Email: $email <br>
        Program : $programs <br>
        City : $city <br>
    ";
    exit(); // terminates the script
} }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM REGISTRATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
<h1 class="text-center bg-dark text-white">PENGISIAN FORM DENGAN VALIDASI</h1>
<br>
<div class="container">
    <h2>Registrasi</h2>
<br>
<form action="" method="post">
<!-- Nama lengkap -->
<div class="form-group">
    <label>Full Name : </label>
    <input type="text" name="name" value="<?php if (isset($name)) echo $name ?>"> 
    <span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>
</div>

<!-- Username dengan ketentuan -->
<div class="form-group">
    <label>User Name : </label>
    <input type="text" name="username" value="<?php if (isset($username)) echo $username ?>"> 
    <span class="error"><?php if (isset($usernameError)) echo $usernameError ?></span><br>
</div>

<!-- Gender -->
<div class="form-group">
    <label>Gender : </label>
    <br><input type="radio" name="gender" id="gender" value="Pria" <?php if (isset($gender) && $gender=="pria") echo "checked";?> /> Pria
    <br><input type="radio" name="gender" id="gender" value="Wanita" <?php if (isset($gender) && $gender=="wanita") echo "checked";?>/> Wanita
</div>

<!-- Birthday -->
<div class="form-group">
    <label>Birthday : </label>
    <input type="date" name="date" id="date" class="form-control" value="<?php echo $date ?>"/>
</div>

<!-- Alamat -->
<div class="form-group">
    <label>Address : </label>
    <textarea class="form-control"rows="3" name ="address" id="address" value="<?php echo $address ?>"></textarea>
</div>

<!-- Email -->
<div class="form-group">
    <label>Email : </label>
    <input type="text" name="email" value="<?php if (isset($email)) echo $email ?>"> 
    <span class="error"><?php if (isset($emailError)) echo $emailError ?></span><br>
</div>

<!-- Ketentuan -->
<div class="form-group">
    <label class="col-lg-3 control-label">Ketentuan Form Validation</label>
        <div class="col-lg-5">
            <div class="checkbox">
                <label>
                    <br><input type="checkbox" name="programs" value="Text Box" <?php if (isset($programs) && $programs=="Text Box") echo "checked";?>/> Text Box
                    <br><input type="checkbox" name="programs" value="Box Username" <?php if (isset($programs) && $programs=="Box Username") echo "checked";?>/> Box Username
                    <br><input type="checkbox" name="programs" value="Text Area" <?php if (isset($programs) && $programs=="Text Area") echo "checked";?>/> Text Area
                    <br><input type="checkbox" name="programs" value="Select Option" <?php if (isset($programs) && $programs=="Select Option") echo "checked";?>/> Select Option
                    <br><input type="checkbox" name="programs" value="Check Box" <?php if (isset($programs) && $programs=="Check Box") echo "checked";?>/> Check Box
                    <br><input type="checkbox" name="programs" value="Radio Button" <?php if (isset($programs) && $programs=="Radio Button") echo "checked";?>/> Radio Button
                </label>
            </div>
        </div>
</div>

<!-- City -->
<div class="form-group">
    <label class="col-lg-3 control-label">City</label>
        <div class="col-lg-5">
            <select class="form-control" name="city" id="city" value="<?php echo $city ?>">
                <option value="">-- Select a city --</option>
                <option value="Bekasi">Bekasi</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Semarang">Semarang</option>
                <option value="Surabaya">Surabaya</option>
                <option value="Jogja">DIY Jogjakarta</option>
                <option value="Denpasar">Denpasar</option>
            </select>
        </div>
</div>
<input type="submit" name="submit" class="btn btn-primary">
</form>
</body>
</html>