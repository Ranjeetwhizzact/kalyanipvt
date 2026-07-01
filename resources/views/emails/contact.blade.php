<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" 
           style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);">
        
        <!-- Logo Header -->
        <tr>
            <td style="padding: 20px; text-align: center; border-bottom: 1px solid #eaeaea;">
                <img src="https://kalyanidashboard.skilladders.com/public/assests/footer.png" alt="Kalyani Logo" style="max-height: 60px;">
            </td>
        </tr>

        <!-- Content -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="margin-top: 0; color: #333333;">📩 New Contact Form Submission</h2>
                <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 20px 0;">

                <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
                <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
                <p><strong>Email:</strong> 
                    <a href="mailto:{{ $data['email'] }}" style="color: #1a73e8;">{{ $data['email'] }}</a>
                </p>
                <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
                <p><strong>Country:</strong> {{ $data['country'] }}</p>

                <p style="margin-top: 20px;"><strong>Message:</strong></p>
                <div style="background-color: #f1f1f1; padding: 15px; border-left: 4px solid #1a73e8; border-radius: 4px; white-space: pre-wrap; color: #444;">
                    {{ $data['message'] }}
                </div>

                <p style="margin-top: 30px; color: #777777; font-size: 12px;">
                    This message was sent via your website's contact form.
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="padding: 15px; text-align: center; font-size: 12px; color: #999999; border-top: 1px solid #eaeaea;">
                © {{ date('Y') }} Kalyani. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
