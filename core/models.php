<?php  

function insertMember($pdo, $member_name, $email, $phone_number) {
    $sql = "INSERT INTO Members (member_name, email, phone_number) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$member_name, $email, $phone_number]);

    if ($executeQuery) {
        return true;
    } 
}

function updateMember($pdo, $member_name, $email, $phone_number, $member_id) {
    $sql = "UPDATE members
            SET member_name = ?, email = ?, phone_number = ?
            WHERE member_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$member_name, $email, $phone_number, $member_id]);

    return $executeQuery; 
}

function deleteMember($pdo, $member_id) {
    $deleteGames = "DELETE FROM Games WHERE member_id = ?";
    $deleteStmt = $pdo->prepare($deleteGames);
    $executeDeleteQuery = $deleteStmt->execute([$member_id]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM Members WHERE member_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$member_id]);

        if ($executeQuery) {
            return true;
        }
    }
}

function getAllMembers($pdo) {
    $sql = "SELECT * FROM Members";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getMemberByID($pdo, $member_id) {
    $sql = "SELECT * FROM Members WHERE member_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$member_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function getGamesByMember($pdo, $member_id) {
    $sql = "SELECT * FROM Games WHERE member_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$member_id]);

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function insertGame($pdo, $game_name, $member_id) {
    $sql = "INSERT INTO Games (game_name, member_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$game_name, $member_id]);

    if ($executeQuery) {
        return true;
    }
}

function getGameByID($pdo, $game_id) {
    $sql = "SELECT * FROM Games WHERE game_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$game_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateGame($pdo, $game_name, $game_id) {
    try {
        $stmt = $pdo->prepare("UPDATE games SET game_name = ? WHERE game_id = ?");
        return $stmt->execute([$game_name, $game_id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


function deleteGame($pdo, $game_id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM games WHERE game_id = ?");
        return $stmt->execute([$game_id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
