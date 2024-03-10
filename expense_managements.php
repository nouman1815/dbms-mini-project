<?php
	include('header.php');
	checkuser();
    if (isset($_POST['submit']))
        {
             $Amount=get_safe_value($_POST['amount']);
             $Category=get_safe_value($_POST['category']);
             $Date=get_safe_value($_POST['date']);
            $User=get_safe_value($_POST['user']);

            mysqli_query($con,"INSERT INTO USER_EXPENSE (AMOUNT,CATEGORY,DATE,USER_ID) values('$Amount','$Category','$Date','$User') ");
            redirect('Expense.php');
        }
    
    
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
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

        h2 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            margin-top: 20px;
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

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: black;
            color: white;
        }

        .left-menu li:hover {
            color: red;
        }

        .left-menu a {
            color: black;
        }

        a:hover {
            color: red;
        }

        .container p a {
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container p a:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>Add Expense</h1>
    </header>

    <nav class="left-menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Add Income Management link -->
        <p><a href="Expense.php">Back</a></p>

        <form method="post">
            <table>
                <tr>
                    <td>Amount</td>
                    <td><input type="number" name="amount" required></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><input type="text" name="category" required></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" required></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><input type="number" name="user" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>
<?php
	
?>
