<?php
    include('header.php');
    checkuser();
    include('user_header.php');

    // Update Balance in ACCOUNTS table
    $updateBalanceQuery = "UPDATE ACCOUNTS 
                            SET Balance = (SELECT COALESCE(SUM(INCOME_AMOUNT), 0) - COALESCE(SUM(AMOUNT), 0) 
                                          FROM INCOME LEFT JOIN EXPENSE ON INCOME.USER_ID = EXPENSE.USER_ID)
                            WHERE USER_ID = '$user_id'";
    mysqli_query($con, $updateBalanceQuery);

    // Update Target Amount and Current Amount in FINANCIAL_GOALS table
    $updateGoalsQuery = "UPDATE FINANCIAL_GOALS 
                         SET TARGET_AMOUNT = (SELECT COALESCE(SUM(AMOUNT), 0) FROM INCOME WHERE USER_ID = '$user_id'),
                             CURRENT_AMMOUNT = (SELECT COALESCE(SUM(AMOUNT), 0) FROM EXPENSE WHERE USER_ID = '$user_id')
                         WHERE USER_ID = '$user_id'";
    mysqli_query($con, $updateGoalsQuery);

    // Redirect to the accounts.php page after updating
    redirect('accounts.php');

    include('footer.php');
?>
