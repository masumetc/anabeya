<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>anabeya</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="800" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 40px 30px 40px 30px; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <h1>anabeya.com</h1>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 0 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>Dear {{$seller_name}}, </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Thank you for applying for a seller account.<br>
                                        While We're reviewing your application, please verify your email address.
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#FF6C00" style="padding: 20px 10px 10px 20px;font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                        <a href="{{URL('seller-verify')}}/{{\Crypt::encrypt($seller_email)}}" style="text-decoration: none; color: #fff;"><p align="center">VERIFY MY EMAIL</p></a>
                                    </td>
                                </tr><br><br><br>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Thank you,The Anabeya Team 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>