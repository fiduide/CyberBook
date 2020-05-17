
    <?php

    $from = "CyberBook@biblio.fr";
    $to = ''.$email['email'].'';
    $subject = "Vous avez obtenu une pénalitée";
    echo $message =
    "<html>
    <head>
    <title>Hey</title>
    </head>
    <a href='https://cyberbook-ipssi.000webhostapp.com/index.php'>
    <header style='margin-bottom: 10px;'>
    <div style='height: 350px;width: 100%;position: relative;'>
        <img style='width: 100%;height:99.5%; position: relative;' src='https://firebasestorage.googleapis.com/v0/b/test-df0b6.appspot.com/o/logo.png?alt=media&token=419c8afd-c593-48b4-8621-4231b7bb8b9a'>
        <div class='position: absolute;bottom: 0;background: 0 0;height: 60px;width: 100%;-webkit-filter: blur(7px);'>
            <svg width='100%' height='100%' viewBox='0 0 100 100' preserveAspectRatio='none'>
                <path d='M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100' fill='black'></path>
            </svg>
        </div>
    </header>
    </a>
    <body style='padding: 0%; margin: 0; font-family: Helvetica, Arial , sans-serif'>
        <div style='background: #f7f7f7; padding: 5% 5% 5% 5%'>
            <div style='background: white; padding: 2%'>
                <p style='text-align: center; font-size: 18px'><b>Bonjour ,</b></p><br/>
                <span style='text-align: center; display: block; margin: auto'>
                </span>
            </div>
            <div style='background: white; color: #666; padding: 1%; border-radius: 0 0 10px 10px; padding-top: 20px'>
                <b>
                    <span>© 2020 <a href='https://cyberbook-ipssi.000webhostapp.com/index.php' style='color:#666;outline:none;text-decoration: none;margin-bottom:5px'>CyberBook</a></span>
                </b>
            </div>
        </div>
    </body>
</html>";


$headers = "MIME-Version : 1.0" . "\r\n";
$headers .="Content-type:text/html; charset=utf-8)";

?>