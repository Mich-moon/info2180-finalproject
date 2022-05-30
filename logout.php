<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // remove all the session variables
    session_unset();

    // Destroy the session.
    session_destroy();
    exit;
?>