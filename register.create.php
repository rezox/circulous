<?php
include_once('register.helpers.php');
include_once('include/config.php');
?>

<?php function show_registration($email) { ?>
<iframe src="https://www.facebook.com/plugins/registration.php?
             client_id=<?= FACEBOOK_APP_ID ?>&
             redirect_uri=<?= urlencode('http://circulo.us/register.create.php?email=' . $email) ?>&
             fields=name&fb_only=true"
        scrolling="auto"
        frameborder="no"
        style="border:none"
        allowTransparency="true"
        width="600"
        height="330">
</iframe>
<?php } ?>

<?php
function parse_signed_request($signed_request, $secret) {
   list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

   // decode the data
   $sig = base64_url_decode($encoded_sig);
   $data = json_decode(base64_url_decode($payload), true);

   if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
      error_log('Unknown algorithm. Expected HMAC-SHA256');
      return null;
   }

   // check sig
   $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
   if ($sig !== $expected_sig) {
      error_log('Bad Signed JSON signature!');
      return null;
   }

   return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}
?>

<link rel="stylesheet" href="resources/css/frontpage.css" type="text/css" />

<?php
if (basename(__FILE__) == basename( $_SERVER['PHP_SELF']))
{
   if ($_REQUEST) $response = parse_signed_request($_REQUEST['signed_request'], FACEBOOK_SECRET);
   else die();   

   if (!isset($_GET['email'])) die();

   db_query('INSERT INTO users (uid, name, email) VALUES ("%s", "%s", "%s")', $response['user_id'], $response['registration']['name'], $_GET['email']);
}
else show_registration($_GET['email']);
?>
