<?php 
  require $_SERVER["DOCUMENT_ROOT"] . '/mailjet/vendor/autoload.php';

  use \Mailjet\Resources;

  function send_email($target, $subject, $text_body, $html_body) {
    $public_key = file_get_contents('/run/secrets/email-public-key');
    $private_key = file_get_contents('/run/secrets/email-private-key');
    $mj = new \Mailjet\Client($public_key,$private_key,true,['version' => 'v3.1']);

    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "rschwyzer@knights.ucf.edu",
            'Name' => "Rob"
          ],
          'To' => [
            [
              'Email' => $target,
              'Name' => "User"
            ]
          ],
          'Subject' => $subject,
          'TextPart' => $text_body,
          'HTMLPart' => $html_body
        ]
      ]
    ];
    
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    return $response->success();
  }
?>