<!-- logout.php -->

<?php
    // Initialize the session.
    // If you are using session_name("something"), don't forget it now!
    session_start();

    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie('username', '', time() - (86400 * 30));
        setcookie('password', '', time() - (86400 * 30));
        setcookie(session_name(), '', time() - 86400*30,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
    header("Location: index.php");
    exit;
?>
