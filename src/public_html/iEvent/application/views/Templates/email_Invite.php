<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  </head>
  <body>
    <table style="width:300; margin-left:auto; margin-right:auto; background-color:#7B7B7B; padding:15px">
      <tr width="100%">
        <td style="padding-right:25px"></td>
        <td>
          <img src="http://ievent.lemonhut.net/images/logo.png" style="width:250px; height:250px;"/>
        </td>
        <td style="padding-right:25px"></td>
      </tr>
      <tr width="100%">
        <td style="padding-right:25px"></td>
        <td>
          <h1 style="text-align:center; color:#FFF">You've received an iInvite to <?php echo $eventName; ?>
            </h1>
          </td>
          <td style="padding-left:25px"></td>
        </tr>
        <tr style="padding:35px;"></tr>
        <tr>
          <td style="padding-left:25px"></td>
          <td>
            <p style="color:#FFF;">Hi <?php echo $inviteName."! ".$inviterName; ?> has sent you an invite to join them at <?php echo $eventName."."; ?> Please RSVP Below to let them know whether or not you will be attending.</p>
              </td>
              <td style="padding-left:25px"></td>
            </tr>
            <tr>
              <td style="padding-left:25px"></td>
              <td>
                <table width="100%" height="50px">
                  <tr>
                    <td align="center">
                      <a href="<?php echo $acceptLink; ?>" class="acceptButton" style="margin:auto;  background-color:#44c767; -moz-border-radius:28px; -webkit-border-radius:28px; border-radius:28px; border:1px solid #18ab29; display:inline-block; cursor:pointer; color:#ffffff; font-family:Arial; font-size:17px; padding:16px 31px; text-decoration:none; text-shadow:0px 1px 0px #2f6627;">Accept</a>
                    </td>
                    <td align="center">
                      <a href="<?php echo $maybeLink; ?>" class="declineButton" style="margin:auto; background-color:#ffc528; -moz-border-radius:28px; -webkit-border-radius:28px; border-radius:28px; border:1px solid #18ab29; display:inline-block; cursor:pointer; color:#ffffff; font-family:Arial; font-size:17px; padding:16px 31px; text-decoration:none; text-shadow:0px 1px 0px #2f6627;">Maybe</a>
                    </td>
                    <td align="center">
                      <a href="<?php echo $declineLink; ?>" class="declineButton" style="margin:auto; background-color:#d0451b; -moz-border-radius:28px; -webkit-border-radius:28px; border-radius:28px; border:1px solid #18ab29; display:inline-block; cursor:pointer; color:#ffffff; font-family:Arial; font-size:17px; padding:16px 31px; text-decoration:none; text-shadow:0px 1px 0px #2f6627;">Decline</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
      </html>