<?php
    include('header.php');
    checkuser();
?>

<!-- Add this in your HTML head to include FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="dash.css">

<div class="sidebar">
    <div class="sidebar-header">
        <h3> DBMS mini project</h3>
    </div>
    <ul class="sidebar-list">
        <li>
            <a href="dashboard.php">
                <i class="bx bx-home"></i>
                <span class="links">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="bx bx-log-out"></i>
                <span class="links">Logout</span>
            </a>
        </li>
        <li>
            <a href="Expense.php">
                <i class="bx bx-dollar"></i>
                <span class="links">Expense</span>
            </a>
        </li>
        <li>
            <a href="income.php">
                <i class="bx bx-money"></i>
                <span class="links">Income</span>
            </a>
        </li>
        <li>
            <a href="goal.php">
                <i class="bx bx-target-lock"></i>
                <span class="links">Financial Goal</span>
            </a>
        </li>
        <li>
            <a href="accounts.php">
                <i class="bx bx-wallet"></i>
                <span class="links">Accounts</span>
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
    <h2>DASHBOARD</h2>

    <div class="widget">
        <h3>Recent Expenses</h3>
        <!-- Add content for recent expenses here -->
        <p>This is where you can display information about recent expenses.</p>
    </div>
    <div class="widget">
        <h3>Income Overview</h3>
        <!-- Add content for income overview here -->
        <p>This is where you can display information about income overview.</p>
    </div>
    <!-- Add more widgets and content as needed -->
</div>

<?php
    include('footer.php');
?>
