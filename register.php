<?php include "db.php";

if(isset($_POST['register'])){
mysqli_query($conn,"INSERT INTO users(name,email,password,role)
VALUES('{$_POST['name']}','{$_POST['email']}','{$_POST['password']}','student')");

echo "<script>alert('Registration Successful');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Register</title>

<style>
body {
    margin:0;
    font-family:'Segoe UI';
    height:100vh;
    display:flex;
}

/* LEFT */
.left {
    width:50%;
    background:linear-gradient(135deg,#1e4db7,#0a2a66);
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    text-align:center;
}

.left h1 { font-size:36px; }

/* RIGHT */
.right {
    width:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f4f6fb;
}

/* FORM */
.form-box {
    background:white;
    padding:40px;
    width:350px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

input {
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ccc;
}

input:focus {
    border-color:#0a2a66;
}

/* BUTTON */
button {
    width:100%;
    padding:12px;
    background:#0a2a66;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

button:hover {
    background:#1e4db7;
}

/* LINK */
.link {
    text-align:center;
    display:block;
    margin-top:10px;
    text-decoration:none;
    color:#0a2a66;
}
</style>
</head>

<body>

<div class="left">
<h1>📝 Create Account</h1>
<p>Join and make campus safer</p>
</div>

<div class="right">
<div class="form-box">

<h2>Student Register</h2>

<form method="post">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>
</form>

<a href="student_login.php" class="link">Already have account? Login</a>

</div>
</div>

</body>
</html>