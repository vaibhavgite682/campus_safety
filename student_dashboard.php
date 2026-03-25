<?php include "db.php";

if(!isset($_SESSION['user'])){
header("Location:student_login.php");
}

$user=$_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>

<style>
body {
    margin:0;
    font-family:'Segoe UI';
    background:#f1f5f9;
}

/* SIDEBAR */
.sidebar {
    width:230px;
    height:100vh;
    background:#0a2a66;
    color:white;
    position:fixed;
    padding:20px;
}

.sidebar h2 {
    margin-bottom:30px;
}

.sidebar a {
    display:block;
    color:white;
    text-decoration:none;
    margin:15px 0;
}

/* MAIN */
.main {
    margin-left:250px;
    padding:20px;
}

/* HEADER */
.header {
    background:white;
    padding:15px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

/* CARDS */
.cards {
    display:flex;
    gap:20px;
    margin-top:20px;
}

.card {
    flex:1;
    background:white;
    padding:20px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

/* FORM */
.form-box {
    background:white;
    padding:20px;
    margin-top:20px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

input, textarea, select {
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:6px;
    border:1px solid #ccc;
}

/* BUTTON */
button {
    padding:10px;
    background:#0a2a66;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

button:hover {
    background:#1e4db7;
}

/* TABLE */
.table-box {
    background:white;
    padding:20px;
    margin-top:20px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

table {
    width:100%;
    border-collapse:collapse;
}

th, td {
    padding:12px;
    border-bottom:1px solid #eee;
}

/* STATUS */
.badge {
    padding:5px 10px;
    border-radius:20px;
    color:white;
    font-size:12px;
}

.pending { background:orange; }
.resolved { background:green; }
.inprogress { background:#007bff; }

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
<h2>🎓 Student</h2>
<a href="#">🏠 Dashboard</a>
<a href="#">📄 My Reports</a>
<a href="logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<!-- HEADER -->
<div class="header">
<h3>Welcome, <?php echo $user['name']; ?></h3>
</div>

<!-- STATS -->
<?php
$total=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM reports WHERE student_id=".$user['id']))['t'];
$pending=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM reports WHERE student_id=".$user['id']." AND status='Pending'"))['t'];
$resolved=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM reports WHERE student_id=".$user['id']." AND status='Resolved'"))['t'];
?>

<div class="cards">
<div class="card"><h3>Total Reports</h3><p><?php echo $total; ?></p></div>
<div class="card"><h3>Pending</h3><p><?php echo $pending; ?></p></div>
<div class="card"><h3>Resolved</h3><p><?php echo $resolved; ?></p></div>
</div>

<!-- SUBMIT REPORT -->
<div class="form-box">
<h3>Submit New Report</h3>

<form method="post">
<input type="text" name="title" placeholder="Issue Title" required>

<select name="category">
<option>Harassment</option>
<option>Theft</option>
<option>Accident</option>
<option>Other</option>
</select>

<input type="text" name="location" placeholder="Location">

<select name="priority">
<option>Low</option>
<option>Medium</option>
<option>High</option>
</select>

<textarea name="desc" placeholder="Describe the issue"></textarea>

<button name="report">Submit Report</button>
</form>
</div>

<?php
if(isset($_POST['report'])){
mysqli_query($conn,"INSERT INTO reports(student_id,title,description,category,location,priority,status)
VALUES('{$user['id']}','{$_POST['title']}','{$_POST['desc']}','{$_POST['category']}','{$_POST['location']}','{$_POST['priority']}','Pending')");
header("Location:student_dashboard.php");
}
?>

<!-- MY REPORTS -->
<div class="table-box">
<h3>My Reports</h3>

<table>
<tr>
<th>Title</th>
<th>Category</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$res=mysqli_query($conn,"SELECT * FROM reports WHERE student_id=".$user['id']);

while($row=mysqli_fetch_assoc($res)){
$statusClass=strtolower(str_replace(' ','',$row['status']));

echo "<tr>
<td>{$row['title']}</td>
<td>{$row['category']}</td>
<td><span class='badge $statusClass'>{$row['status']}</span></td>
<td>
<form method='post'>
<input type='hidden' name='id' value='{$row['id']}'>
<button name='delete'>Delete</button>
</form>
</td>
</tr>";
}
?>
</table>
</div>

<?php
if(isset($_POST['delete'])){
mysqli_query($conn,"DELETE FROM reports WHERE id=".$_POST['id']);
header("Location:student_dashboard.php");
}
?>

</div>

</body>
</html>