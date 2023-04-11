<?php
	session_start();
    $to = "rockybd1995@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message from your Bitmap Photography.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
	// Define the language options and their corresponding translations
$languages = array(
    'en' => array(
        'name' => 'English',
        'file' => 'lang_en.php' // Path to the English translation file
    ),
    'bn' => array(
        'name' => 'Bangla',
        'file' => 'lang_bn.php' // Path to the Bangla translation file
    ),
    'ar' => array(
        'name' => 'Arabic',
        'file' => 'lang_ar.php' // Path to the Arabic translation file
    ),
    'hi' => array(
        'name' => 'Hindi',
        'file' => 'lang_hi.php' // Path to the Hindi translation file
    )
);

// Set the default language to English
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'en';
}

// Check if the language selection has been changed
if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $languages)) {
    // Update the session variable with the selected language
    $_SESSION['language'] = $_GET['lang'];
}

// Include the translation file for the current language
include $languages[$_SESSION['language']]['file'];
?>

?>