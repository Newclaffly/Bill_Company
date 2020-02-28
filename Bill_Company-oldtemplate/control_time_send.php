<html>

<head>
    <title> PHP Sending Email</title>
</head>

<body>
    <?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    include_once('connect.php');
    $sql = "SELECT * FROM bill_invoice WHERE status_mail = 'N' LIMIT 0,20 ";
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    //    echo '<pre>';
    //     print_r(mysqli_fetch_array($objQuery));
    //    echo '</pre>';

    ///echo $objQuery;
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '59160182@go.buu.ac.th';                     // SMTP username
    $mail->Password   = '@Newayw123';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;

    //     foreach ($objQuery as $value) {
    //           echo '<pre>';
    //     print_r($value);
    //    echo '</pre>';
    //     }
    //   die;                       // TCP port to connect to
    //while ($objResult = mysqli_fetch_array($objQuery)) {
    foreach ($objQuery as $value) {
        //Recipients
        $mail->setFrom("59160182@go.buu.ac.th");
        //$mail->addAddress("newclaffly40685@gmail.com");
        $mail->addAddress($value["email_cus"]);     // Add a recipient
        // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo($objResult["email_cus"]);
        //$mail->addCC('cc@example.com');
        //  $mail->addBCC($objResult["email_cus"]);

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //print_r($objResult["email_cus"]);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Test Sending mail From Email-Server By 1-1';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        $sql_update = "UPDATE bill_invoice  SET status_mail = 'Y' WHERE email_cus = '" . $value["email_cus"] . "' ";
        mysqli_query($conn, $sql_update) or die("Error Query [" . $sql . "]");

    }
    $mail->send();
    //    mysqli_close($conn);
    ?>
</body>

</html>