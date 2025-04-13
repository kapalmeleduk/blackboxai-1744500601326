<?php
// Database configuration
$db_host = 'localhost';
$db_name = 'wedding_invitation';
$db_user = 'root';
$db_pass = '';

try {
    // Create PDO instance
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // Log error (in production, log to file instead of showing)
    error_log("Connection failed: " . $e->getMessage());
    
    // Show user-friendly error
    die("Sorry, there was a problem connecting to the database. Please try again later.");
}

// Helper functions for database operations
function createUser($pdo, $name, $email, $password) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        ]);
    } catch (PDOException $e) {
        error_log("Error creating user: " . $e->getMessage());
        return false;
    }
}

function getUserByEmail($pdo, $email) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting user: " . $e->getMessage());
        return false;
    }
}

function getUserById($pdo, $id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting user: " . $e->getMessage());
        return false;
    }
}

function updateUser($pdo, $id, $data) {
    try {
        $fields = [];
        $values = [];
        
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
        }
        
        $values[] = $id;
        
        $stmt = $pdo->prepare("
            UPDATE users 
            SET " . implode(', ', $fields) . "
            WHERE id = ?
        ");
        
        return $stmt->execute($values);
    } catch (PDOException $e) {
        error_log("Error updating user: " . $e->getMessage());
        return false;
    }
}

function createInvitation($pdo, $userId, $data) {
    try {
        $fields = ['user_id'];
        $placeholders = ['?'];
        $values = [$userId];
        
        foreach ($data as $key => $value) {
            $fields[] = $key;
            $placeholders[] = '?';
            $values[] = $value;
        }
        
        $stmt = $pdo->prepare("
            INSERT INTO invitations (" . implode(', ', $fields) . ")
            VALUES (" . implode(', ', $placeholders) . ")
        ");
        
        $stmt->execute($values);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        error_log("Error creating invitation: " . $e->getMessage());
        return false;
    }
}

function getInvitationsByUser($pdo, $userId, $limit = null) {
    try {
        $sql = "
            SELECT * FROM invitations 
            WHERE user_id = ? 
            ORDER BY created_at DESC
        ";
        
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Error getting invitations: " . $e->getMessage());
        return false;
    }
}

function getInvitationById($pdo, $id) {
    try {
        $stmt = $pdo->prepare("
            SELECT i.*, u.name as creator_name 
            FROM invitations i
            JOIN users u ON i.user_id = u.id
            WHERE i.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting invitation: " . $e->getMessage());
        return false;
    }
}

function updateInvitation($pdo, $id, $data) {
    try {
        $fields = [];
        $values = [];
        
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
        }
        
        $values[] = $id;
        
        $stmt = $pdo->prepare("
            UPDATE invitations 
            SET " . implode(', ', $fields) . "
            WHERE id = ?
        ");
        
        return $stmt->execute($values);
    } catch (PDOException $e) {
        error_log("Error updating invitation: " . $e->getMessage());
        return false;
    }
}

function deleteInvitation($pdo, $id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM invitations WHERE id = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        error_log("Error deleting invitation: " . $e->getMessage());
        return false;
    }
}

function incrementViews($pdo, $invitationId) {
    try {
        $stmt = $pdo->prepare("
            UPDATE invitations 
            SET views = views + 1 
            WHERE id = ?
        ");
        return $stmt->execute([$invitationId]);
    } catch (PDOException $e) {
        error_log("Error incrementing views: " . $e->getMessage());
        return false;
    }
}

function addRSVP($pdo, $data) {
    try {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $stmt = $pdo->prepare("
            INSERT INTO rsvp (" . implode(', ', $fields) . ")
            VALUES (" . implode(', ', $placeholders) . ")
        ");
        
        return $stmt->execute(array_values($data));
    } catch (PDOException $e) {
        error_log("Error adding RSVP: " . $e->getMessage());
        return false;
    }
}

function getRSVPCount($pdo, $invitationId) {
    try {
        $stmt = $pdo->prepare("
            SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN attendance = 'yes' THEN 1 ELSE 0 END) as attending,
                SUM(CASE WHEN attendance = 'no' THEN 1 ELSE 0 END) as not_attending,
                SUM(CASE WHEN attendance = 'maybe' THEN 1 ELSE 0 END) as maybe
            FROM rsvp
            WHERE invitation_id = ?
        ");
        $stmt->execute([$invitationId]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting RSVP count: " . $e->getMessage());
        return false;
    }
}

function addDigitalGift($pdo, $data) {
    try {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $stmt = $pdo->prepare("
            INSERT INTO digital_gifts (" . implode(', ', $fields) . ")
            VALUES (" . implode(', ', $placeholders) . ")
        ");
        
        return $stmt->execute(array_values($data));
    } catch (PDOException $e) {
        error_log("Error adding digital gift: " . $e->getMessage());
        return false;
    }
}

function getDigitalGiftsTotal($pdo, $invitationId) {
    try {
        $stmt = $pdo->prepare("
            SELECT SUM(amount) as total
            FROM digital_gifts
            WHERE invitation_id = ? AND status = 'completed'
        ");
        $stmt->execute([$invitationId]);
        return $stmt->fetch()['total'] ?? 0;
    } catch (PDOException $e) {
        error_log("Error getting digital gifts total: " . $e->getMessage());
        return false;
    }
}
?>
