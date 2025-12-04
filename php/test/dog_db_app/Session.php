<?php
// Session.php

class Session {
  public static function getAndClearSession(): array {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $notices = $_SESSION['notices'] ?? [];
    unset($_SESSION['notices']);

    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);

    $old_input = $_SESSION['old_input'] ?? [];
    unset($_SESSION['old_input']);

    return [
      'notices' => $notices,
      'errors' => $errors,
      'old_input' => $old_input
    ];
  }
}
