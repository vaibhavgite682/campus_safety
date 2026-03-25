<!DOCTYPE html>
<html>
<head>
<title>Campus Safety Reporting</title>

<style>
body {
    margin:0;
    font-family:'Segoe UI';
    background:#f5f7fb;
}

/* HEADER */
header {
    background:#0a2a66;
    color:white;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

nav a {
    color:white;
    margin:0 15px;
    text-decoration:none;
}

/* HERO */
.hero {
    height: 400px;
    width: 85%;
    margin: 20px auto;
    background: url('i1.jpeg') center/cover no-repeat;
    border-radius: 12px;
    position: relative;
}

.hero::after {
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    border-radius:12px;
}

.hero-text {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    color:white;
    text-align:center;
    z-index:2;
}

/* SECTION */
.section {
    padding:60px 20px;
    text-align:center;
}

.section h2 {
    color:#0a2a66;
}

/* CARDS */
.cards {
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:20px;
    margin-top:30px;
}

.card {
    background:white;
    padding:25px;
    width:260px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* FAQ */
.faq {
    max-width:700px;
    margin:auto;
    text-align:left;
}

.faq p {
    background:white;
    padding:15px;
    border-radius:8px;
    margin:10px 0;
}

/* CONTACT */
.contact-box {
    background:white;
    width:300px;
    margin:20px auto;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
}

/* FOOTER */
footer {
    background:#0a2a66;
    color:white;
    text-align:center;
    padding:15px;
}
</style>
</head>

<body>

<!-- HEADER -->
<header>
<h2>🚨 Campus Safety</h2>
<nav>
<a href="index.php">Home</a>
<a href="student_login.php">Student</a>
<a href="admin_login.php">Admin</a>
<a href="register.php">Register</a>
</nav>
</header>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h1>Campus Safety Reporting System</h1>
        <p>Report issues quickly & make your campus safe</p>
    </div>
</div>

<!-- ABOUT -->
<div class="section">
<h2>About System</h2>
<p>
Campus Safety Reporting System helps students report issues easily and allows administrators 
to take quick action for a safer campus.
</p>
</div>

<!-- FEATURES -->
<div class="section">
<h2>Key Features</h2>

<div class="cards">
<div class="card"><h3>⚡ Easy Reporting</h3><p>Quick and simple complaint system</p></div>
<div class="card"><h3>🔒 Secure</h3><p>Data is protected</p></div>
<div class="card"><h3>📊 Tracking</h3><p>Track your complaint status</p></div>
<div class="card"><h3>🚀 Fast Action</h3><p>Admin responds quickly</p></div>
</div>
</div>

<!-- WHY CHOOSE US -->
<div class="section">
<h2>Why Choose Us?</h2>

<div class="cards">
<div class="card"><h3>✔ Reliable System</h3></div>
<div class="card"><h3>✔ User Friendly</h3></div>
<div class="card"><h3>✔ Real-time Updates</h3></div>
<div class="card"><h3>✔ Safe Environment</h3></div>
</div>
</div>

<!-- HOW IT WORKS -->
<div class="section">
<h2>How It Works</h2>

<div class="cards">
<div class="card"><h3>1️⃣ Register</h3></div>
<div class="card"><h3>2️⃣ Login</h3></div>
<div class="card"><h3>3️⃣ Report Issue</h3></div>
<div class="card"><h3>4️⃣ Admin Action</h3></div>
</div>
</div>

<!-- FAQ -->
<div class="section">
<h2>Frequently Asked Questions</h2>

<div class="faq">
<p><b>Q: Who can report issues?</b><br>Students of the campus.</p>
<p><b>Q: Is my data safe?</b><br>Yes, all data is secure.</p>
<p><b>Q: How long does resolution take?</b><br>Depends on issue priority.</p>
<p><b>Q: Can I track my report?</b><br>Yes, from your dashboard.</p>
</div>
</div>

<!-- CONTACT -->
<div class="section">
<h2>Contact Us</h2>

<div class="contact-box">
<p><b>Email:</b> vaibhavgite682@gmail.com</p>
<p><b>Phone:</b> 7030395085</p>
<p>We are here to help you 24/7.</p>
</div>
</div>

<!-- FOOTER -->
<footer>
<p>© 2026 Campus Safety Reporting System</p>
</footer>

</body>
</html>