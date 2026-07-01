<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You - Kalyani</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 20px; text-align: center; border-bottom: 1px solid #eee;">
                <!-- Logo Placeholder -->
                <img src="https://kalyanidashboard.skilladders.com/public/assests/footer.png" alt="Kalyani Logo" style="max-height: 60px;">
            </td>
        </tr>
       
        <tr>
            <td style="padding: 30px;">
                <h2 style="margin-top: 0; color: #2a2a2a;">Hi {{ $data['first_name'] }},</h2>

                <p style="font-size: 16px; color: #4a4a4a; line-height: 1.6;">
                    Thank you for getting in touch with <strong>Kalyani</strong>! We’ve received your message and a member of our team will respond to you soon.
                </p>

                <p style="font-weight: bold; color: #333; margin-top: 30px;">Your Message:</p>
                <div style="background-color: #f0f4ff; padding: 15px; border-left: 5px solid #007bff; border-radius: 6px; white-space: pre-wrap; color: #333;">
                    {{ $data['message'] }}
                </div>

                <p style="margin-top: 40px; font-size: 14px; color: #777;">
                    Warm regards,<br>
                    <strong>The Kalyani Team</strong><br>
                    <em>Empowering Wellness</em>
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding: 15px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #eee;">
                © {{ date('Y') }} Kalyani. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
