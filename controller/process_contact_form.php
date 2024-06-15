<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Honeypot check
    if (!empty($_POST['honeypot'])) {
        $_SESSION['errors'] = ['honeypot' => 'Spam detected!'];
        header('Location: index.php');
        exit;
    }

    // Sanitize and validate input
    $name = htmlspecialchars(trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $lastname = htmlspecialchars(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $gender = htmlspecialchars(trim(filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $country = htmlspecialchars(trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $subject = htmlspecialchars(trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $message = htmlspecialchars(trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));

    $errors = [];

    if (!$name) {
        $errors['name'] = "Firstname required";
    }

    if (!$lastname) {
        $errors['lastname'] = "Lastname required";
    }

    if (!$gender || !in_array($gender, ['male', 'female', 'other'])) {
        $errors['gender'] = "Invalid gender";
    }

    if (!$email) {
        $errors['email'] = "Invalid email";
    }

    if (!$country) {
        $errors['country'] = "Invalid country";
    }

    if (!$message) {
        $errors['message'] = "Message required";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header('Location: ?c=home');
        exit;
    }

    exit;
}
