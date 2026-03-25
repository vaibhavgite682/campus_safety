<?php include "db.php";

if(isset($_POST['login'])){
$email=$_POST['email'];
$pass=$_POST['password'];

$res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$pass' AND role='student'");
$user=mysqli_fetch_assoc($res);

if($user){
$_SESSION['user']=$user;
header("Location:student_dashboard.php");
}else{
echo "<script>alert('Invalid Login');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>

<style>
body {
    margin:0;
    font-family:'Segoe UI';
    height:100vh;
    display:flex;
}

/* LEFT SIDE */
.left {
    width:50%;
    background:linear-gradient(135deg,#0a2a66,#1e4db7);
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    text-align:center;
}

.left h1 { font-size:38px; }
.left p { font-size:16px; }

/* RIGHT SIDE */
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
    width:340px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

.form-box h2 {
    margin-bottom:20px;
}

/* INPUT */
input {
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ccc;
    transition:0.3s;
}

input:focus {
    border-color:#0a2a66;
    outline:none;
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
<h1>👨‍🎓 Student Portal</h1>
<p>Report and track campus issues easily</p>
</div>

<div class="right">
<div class="form-box">

<h2>Student Login</h2>

<form method="post">
<input type="email" name="email" placeholder="Enter Email" required>
<input type="password" name="password" placeholder="Enter Password" required>
<button name="login">Login</button>
</form>

<a href="register.php" class="link">Create New Account</a>
<a href="index.php" class="link">← Back to Home</a>

</div>
</div>

</body>
</html>