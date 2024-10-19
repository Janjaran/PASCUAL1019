<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 

if (isset($_POST['insertMemberBtn'])) {
    $memberName = $_POST['member_name']; 
    $email = $_POST['email']; 
    $phoneNumber = $_POST['phone_number']; 

    if (insertMember($pdo, $memberName, $email, $phoneNumber)) {
        header("Location: index.php");
    } 
}

$members = getAllMembers($pdo); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to Gaming Esports Registration Form!</h1>

    <form action="" method="POST">
        <p>
            <label for="member_name">Member Name:</label>
            <input type="text" name="member_name" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" required>
        </p>
        <input type="submit" name="insertMemberBtn" value="Add Member">
    </form>

    <h2>All Members</h2>
    <table>
        <tr>
            <th>Member ID</th>
            <th>Member Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($members as $member) { ?>
            <tr>
                <td><?php echo $member['member_id']; ?></td>
                <td><?php echo $member['member_name']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td><?php echo $member['phone_number']; ?></td>
                <td>
                    <a href="viewgames.php?member_id=<?php echo $member['member_id']; ?>">View Games</a>
                    <a href="editmember.php?member_id=<?php echo $member['member_id']; ?>">Edit</a>
                    <a href="deletemember.php?member_id=<?php echo $member['member_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
