<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertMemberBtn'])) {
    $query = insertMember($pdo, $_POST['member_name'], $_POST['favorite_game'], $_POST['game_type']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editMemberBtn'])) {
    $member_id = $_GET['member_id']; 
    $member_name = $_POST['memberName']; 
    $email = $_POST['email'];
    $phone_number = $_POST['phoneNumber']; 

    $query = updateMember($pdo, $member_name, $email, $phone_number, $member_id);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Update failed";
    }
}


if (isset($_POST['deleteMemberBtn'])) {
    $query = deleteMember($pdo, $_GET['member_id']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['insertGameBtn'])) {
    $query = insertGame($pdo, $_POST['game_name'], $_GET['member_id']);

    if ($query) {
        header("Location: ../viewgames.php?member_id=" . $_GET['member_id']);
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editGameBtn'])) {
    $game_id = $_GET['game_id'];
    $member_id = $_GET['member_id']; 

    $query = updateGame($pdo, $_POST['gameName'], $game_id);

    if ($query) {
        header("Location: ../viewgames.php?member_id=" . $member_id);
    } else {
        echo "Update failed";
    }
}


if (isset($_POST['deleteGameBtn'])) {
    $game_id = $_POST['game_id'];
    $member_id = $_GET['member_id']; 

    if (deleteGame($pdo, $game_id)) {
        header("Location: ../viewgames.php?member_id=" . $member_id); 
    } else {
        echo "Deletion failed";
    }
}

?>



