<?php include "db.php";

if(isset($_POST['login'])){
$email=$_POST['email'];
$pass=$_POST['password'];

$res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$pass' AND role='admin'");
$user=mysqli_fetch_assoc($res);

if($user){
$_SESSION['user']=$user;
header("Location:admin_dashboard.php");
}else{
echo "<script>alert('Invalid Login');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

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
    background:linear-gradient(135deg,#0a2a66,#1e4db7);
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
}

.left h1 { font-size:40px; }

/* RIGHT */
.right {
    width:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f4f6fb;
}

.form-box {
    background:white;
    padding:40px;
    width:320px;
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

button {
    width:100%;
    padding:12px;
    background:#0a2a66;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

button:hover { background:#1e4db7; }
</style>
</head>

<body>

<div class="left">
<h1>👮 Admin Panel</h1>
<p>Manage system efficiently</p>
</div>

<div class="right">
<div class="form-box">
<h2>Admin Login</h2>

<form method="post">
<input type="text" name="email" placeholder="Admin ID">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
</form>

</div>
</div>

</body>
</html>