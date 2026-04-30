<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; margin: 0; padding: 0; }
        .container { max-width: 500px; margin: 40px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { background-color: #0A1628; padding: 30px; text-center; }
        .header h1 { color: #FACC15; margin: 0; font-size: 24px; text-align: center; letter-spacing: 2px;}
        .content { padding: 40px 30px; text-align: center; }
        .content h2 { color: #0A1628; margin-top: 0; }
        .content p { color: #5E6D82; font-size: 15px; line-height: 1.6; }
        .otp-box { background-color: #f8fafc; border: 2px dashed #cbd5e1; padding: 20px; font-size: 32px; font-weight: bold; color: #0A1628; letter-spacing: 8px; border-radius: 8px; margin: 30px 0; display: inline-block; }
        .footer { background-color: #f1f5f9; padding: 20px; text-align: center; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FLEX YOGA</h1>
        </div>
        <div class="content">
            <h2>Password Reset Verification</h2>
            <p>Hello,</p>
            <p>We received a request to reset your password. Please use the following 4-digit verification code to proceed. This code is valid for 5 minutes.</p>
            
            <div class="otp-box">{{ $otp }}</div>
            
            <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Flex Yoga Indonesia. All rights reserved.<br>
            Tangerang, Banten
        </div>
    </div>
</body>
</html>