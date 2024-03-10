<?php include('header.php'); ?>
<?php checkuser(); ?>

<?php
// Check if an edit action is requested
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];

    // Redirect to the edit page with the selected ID
    header("Location: goal_management.php?edit_id=$editId");
    exit();
}

// Check if a delete action is requested
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // Perform the delete operation (replace 'GOAL_ID' with the actual primary key of your table)
    $deleteQuery = "DELETE FROM FINANCIAL_GOALS WHERE GOAL_ID = $deleteId";
    $result = mysqli_query($con, $deleteQuery);

    if ($result) {
        $deleteMessage = "Row with goal ID $deleteId deleted successfully.";
    } else {
        $deleteMessage = "Error deleting row: " . mysqli_error($con);
    }
}

// Fetch data from the FINANCIAL_GOALS table
$res = mysqli_query($con, "SELECT * FROM FINANCIAL_GOALS");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Goals Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .container {
            max-width: 800px;
            margin: 287px auto; /* Adjusted margin for better alignment */
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .actions a {
            text-decoration: none;
            color: #333;
            margin-right: 10px;
            padding: 5px 10px;
            border: 1px solid #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #333;
            color: #fff;
        }

        .add-expense-link {
            display: block;
            margin-top: 20px;
            text-align: right;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        .left-menu {
            width: 300px;
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            position: fixed;
            height: 100%;
            box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .left-menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .left-menu li {
            padding: 10px;
        }

        .left-menu a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .left-menu a:hover {
            background-color: #555;
        }

        .left-menu h2 {
            color: white;
        }
    </style>
</head>

<body>

    <header>
        <h1>Financial Goals Management System</h1>
    </header>
    <nav class="left-menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="expense.php">Expense</a></li>
            <li><a href="income.php">Income</a></li>
            <li><a href="goal.php">Financial Goal</a></li>
            <li><a href="accounts.php">Accounts</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php if (isset($deleteMessage)) : ?>
            <p style="color: #27ae60;"><?php echo $deleteMessage; ?></p>
        <?php endif; ?>

        <h2>Financial Goals List</h2>

        <?php if (mysqli_num_rows($res) > 0) : ?>
            <table>
                <tr>
                    <th>Goal ID</th>
                    <th>Goal Name</th>
                    <th>Target Amount</th>
                    <th>Current Amount</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                    <tr>
                        <td><?php echo $row['GOAL_ID']; ?></td>
                        <td><?php echo $row['GOAL_NAME']; ?></td>
                        <td><?php echo $row['TARGET_AMOUNT']; ?></td>
                        <td><?php echo $row['CURRENT_AMOUNT']; ?></td>
                        <td class="actions">
                            <a href="?edit_id=<?php echo $row['GOAL_ID']; ?>">Edit</a>
                            <a href="?delete_id=<?php echo $row['GOAL_ID']; ?>" onclick="return confirm('Are you sure you want to delete this row?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>No data found in the Financial Goals table.</p>
        <?php endif; ?>

        <p class="add-expense-link"><a href="goal_managements.php" style="color: #3498db;">Add Goal</a></p>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Financial Goals Management System</p>
    </footer>

</body>

</html>

<?php include('footer.php'); ?>
