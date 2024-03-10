<?php
	include('header.php');
	checkuser();
	
	// Check if an edit action is requested
	if (isset($_GET['edit_id'])) {
	    $editId = $_GET['edit_id'];

	    // Fetch the existing data for the selected row
	    $editQuery = "SELECT * FROM FINANCIAL_GOALS WHERE GOAL_ID = $editId";
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
	    $Name = get_safe_value($_POST['name']);
	    $Target = get_safe_value($_POST['target']);
	    $Current = get_safe_value($_POST['current']);
	    $User = get_safe_value($_POST['user']);

	    // Update the data in the database
	    $updateQuery = "UPDATE FINANCIAL_GOALS SET GOAL_NAME = '$Name', TARGET_AMOUNT = '$Target', CURRENT_AMOUNT = '$Current', USER_ID = '$User' WHERE GOAL_ID = $editId";
	    mysqli_query($con, $updateQuery);

	    // Redirect to the goal.php page after updating
	    redirect('goal.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Goal</title>
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
        <h2>Edit Goal</h2>
    </header>

    <nav class="left-menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Add Income Management link -->
        <p><a href="goal.php">Back</a></p>

        <form method="post">
            <table>
                <tr>
                    <td>Goal Name</td>
                    <td><input type="text" name="name" value="<?php echo $editData['GOAL_NAME']; ?>" required></td>
                </tr>
                <tr>
                    <td>Target Amount</td>
                    <td><input type="number" name="target" value="<?php echo $editData['TARGET_AMOUNT']; ?>" required></td>
                </tr>
                <tr>
                    <td>Current Amount</td>
                    <td><input type="number" name="current" value="<?php echo $editData['CURRENT_AMOUNT']; ?>" required></td>
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
<?php
	
?>
