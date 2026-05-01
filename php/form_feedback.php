<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scaleable=no, width=device-width">

    <title>Fellner Workshops - Kontakt</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../styles.css">
    <link rel="stylesheet" type="text/css" media="print" href="print.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 480px)" href="mobil.css">
</head>

<body>
    <?php
    function clear_user_input($value)
    {
        $value = str_replace("\n", '', trim($value));
        $value = str_replace("\r", '', trim($value));
        return $value;
    }

    $email = $_POST['email'];

    $mailto = "fellner.workshops@gmail.com";
    $mailsubj = "Fellner Workshops ANFRAGE";
    $mailhead = "From: $email\n";
    reset($_POST);

    $body = "Übermittlung der Website: \n";

    foreach ($_POST as $key => $value) {
        $key = clear_user_input($key);
        $value = clear_user_input($value);
        if ($key == 'extras') {
            if (is_array($_POST['extras'])) {
                $body .= "$key: ";
                $counter = 1;
                foreach ($_POST['extras'] as $value) {
                    if (sizeof($_POST['extras']) == $counter) {
                        $body .= "$value\n";
                        break;
                    } else {
                        $body .= "$value, ";
                        $counter++;
                    }
                }
            } else {
                $body .= "$key: $value\n";
            }
        } else {
            $body .= "$key: $value\n";
        }
    }
    mail($mailto, $mailsubj, $body, $mailhead);
    ?>
</body>

</html>