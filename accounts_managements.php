<?php
    include('header.php');
    checkuser();
    if (isset($_POST['submit'])) {
        $Name = get_safe_value($_POST['name']);
        $Type = get_safe_value($_POST['type']);
        $Balance = get_safe_value($_POST['balance']);
        $User = get_safe_value($_POST['user']);

        mysqli_query($con, "INSERT INTO ACCOUNTS (Account_Name,Account_Type,Balance,USER_ID) values('$Name','$Type','$Balance','$User') ");
        redirect('accounts.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>
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
        <h1>Add Account</h1>
    </header>

    <nav class="left-menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Add Accounts Management link -->
        <p><a href="accounts.php">Back</a></p>

        <form method="post">
            <table>
                <tr>
                    <td>Account Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td><input type="text" name="type" required></td>
                </tr>
                <tr>
                    <td>Balance</td>
                    <td><input type="number" name="balance" required></td>
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
