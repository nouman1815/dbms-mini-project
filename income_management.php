<?php
    include('header.php');
    checkuser();

    // Check if an edit action is requested
    if (isset($_GET['edit_id'])) {
        $editId = $_GET['edit_id'];

        // Fetch the existing data for the selected row
        $editQuery = "SELECT * FROM INCOME WHERE INCOME_ID = $editId";
        $editResult = mysqli_query($con, $editQuery);
        $editData = mysqli_fetch_assoc($editResult);

        if (!$editData) {
            // Redirect or handle if the row does not exist
            echo "Row not found.";
            exit();
        }
    } else {
        // Redirect or handle if no edit_id is provided
        echo "Edit ID not provided.";
        exit();
    }

    // Handle form submission for updating data
    if (isset($_POST['submit'])) {
        $Amount = get_safe_value($_POST['amount']);
        $Source = get_safe_value($_POST['source']);
        $Date = get_safe_value($_POST['date']);
        $User = get_safe_value($_POST['user']);

        // Update the data in the database
        $updateQuery = "UPDATE INCOME SET INCOME_AMOUNT = '$Amount', SOURCE = '$Source', DATE = '$Date', USER_ID = '$User' WHERE INCOME_ID = $editId";
        mysqli_query($con, $updateQuery);

        // Redirect to the income.php page after updating
        redirect('income.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Income</title>
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
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            text-align: center;
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

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        input[type="number"],
        input[type="text"],
        input[type="date"] {
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
.left-menu li:hover{
    color:red ;
}
        .left-menu a{
            color:black ;
        }

         a:hover{
            color:red ;
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

        
        /* Add your custom styles here */
    </style>
</head>

<body>
    <header>
        <h1>Edit Income</h1>
    </header>

    <nav class="left-menu">
        <h2>Menu</h2>
        <ul>
        
            <li style="font-size: larger; "><a href="logout.php" style="background-color: #lime; padding: 10px; ">Logout</a></li>
            
        </ul>
    </nav>

    <div class="container">
        <!-- Add Income Management link -->
        <p><a href="income.php">Back</a></p>

        <form method="post">
            <table>
                <tr>
                    <td>Amount</td>
                    <td><input type="number" name="amount" value="<?php echo $editData['INCOME_AMOUNT']; ?>" required></td>
                </tr>
                <tr>
                    <td>Source</td>
                    <td><input type="text" name="source" value="<?php echo $editData['SOURCE']; ?>" required></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" value="<?php echo $editData['DATE']; ?>" required></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><input type="number" name="user" value="<?php echo $editData['USER_ID']; ?>" required></td>
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
