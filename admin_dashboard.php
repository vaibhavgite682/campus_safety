<?php include "db.php";

if(!isset($_SESSION['user'])){
header("Location:admin_login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body { margin:0; font-family:'Segoe UI'; background:#f1f5f9; }

/* SIDEBAR */
.sidebar {
    width:220px;
    height:100vh;
    background:#0a2a66;
    color:white;
    position:fixed;
    padding:20px;
}

.sidebar a {
    display:block;
    color:white;
    margin:15px 0;
    text-decoration:none;
}

/* MAIN */
.main {
    margin-left:240px;
    padding:20px;
}

/* CARD */
.card {
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:10px;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
}

input, select {
    width:100%;
    padding:10px;
    margin:8px 0;
}

button {
    padding:8px 12px;
    background:#0a2a66;
    color:white;
    border:none;
}

/* TABLE */
table { width:100%; border-collapse:collapse; }
th, td { padding:10px; border-bottom:1px solid #ccc; }
</style>
</head>

<body>

<div class="sidebar">
<h2>Admin</h2>
<a href="#">Dashboard</a>
<a href="#students">Students</a>
<a href="#reports">Reports</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<!-- ADD ADMIN -->
<div class="card">
<h3>Add New Admin</h3>

<form method="post">
<input type="text" name="name" placeholder="Name">
<input type="text" name="email" placeholder="Admin ID">
<input type="password" name="password" placeholder="Password">
<button name="add_admin">Add Admin</button>
</form>
</div>

<?php
if(isset($_POST['add_admin'])){
mysqli_query($conn,"INSERT INTO users(name,email,password,role)
VALUES('{$_POST['name']}','{$_POST['email']}','{$_POST['password']}','admin')");
}
?>

<!-- STUDENTS -->
<div class="card" id="students">
<h3>Student List</h3>

<table>
<tr><th>Name</th><th>Email</th><th>Action</th></tr>

<?php
$res=mysqli_query($conn,"SELECT * FROM users WHERE role='student'");
while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['name']}</td>
<td>{$row['email']}</td>
<td>
<form method='post'>
<input type='hidden' name='id' value='{$row['id']}'>
<button name='delete_student'>Delete</button>
</form>
</td>
</tr>";
}
?>
</table>
</div>

<?php
if(isset($_POST['delete_student'])){
mysqli_query($conn,"DELETE FROM users WHERE id=".$_POST['id']);
}
?>

<!-- REPORTS -->
<div class="card" id="reports">
<h3>Reports</h3>

<table>
<tr>
<th>Student</th>
<th>Title</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$res=mysqli_query($conn,"SELECT reports.*, users.name FROM reports JOIN users ON users.id=reports.student_id");

while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['name']}</td>
<td>{$row['title']}</td>
<td>{$row['status']}</td>
<td>

<form method='post' style='display:inline'>
<input type='hidden' name='id' value='{$row['id']}'>
<select name='status'>
<option>Pending</option>
<option>Resolved</option>
</select>
<button name='update'>Update</button>
</form>

<form method='post' style='display:inline'>
<input type='hidden' name='id' value='{$row['id']}'>
<button name='delete_report'>Delete</button>
</form>

</td>
</tr>";
}
?>
</table>
</div>

<?php
if(isset($_POST['update'])){
mysqli_query($conn,"UPDATE reports SET status='{$_POST['status']}' WHERE id=".$_POST['id']);
}

if(isset($_POST['delete_report'])){
mysqli_query($conn,"DELETE FROM reports WHERE id=".$_POST['id']);
}
?>

</div>

</body>
</html>