<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; margin: 0; padding: 0; }
        .container { max-width: 500px; margin: 40px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { background-color: #0A1628; padding: 30px; text-align: center; }
        .header h1 { color: #FACC15; margin: 0; font-size: 24px; text-align: center; letter-spacing: 2px;}
        .content { padding: 40px 30px; text-align: center; }
        .content h2 { color: #10B981; margin-top: 0; } /* Warna hijau untuk sukses */
        .content p { color: #5E6D82; font-size: 15px; line-height: 1.6; }
        .footer { background-color: #f1f5f9; padding: 20px; text-align: center; color: #94a3b8; font-size: 12px; }
        .warning-box { background-color: #FEF2F2; border-left: 4px solid #EF4444; padding: 15px; text-align: left; margin-top: 30px; border-radius: 4px;}
        .warning-box p { color: #991B1B; font-size: 13px; margin: 0;}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FLEX YOGA</h1>
        </div>
        <div class="content">
            <h2>Password Changed Successfully</h2>
            <p>Hello,</p>
            <p>This is a confirmation that the password for your Flex Yoga account has just been changed successfully.</p>
            
            <div class="warning-box">
                <p><strong>Didn't change your password?</strong><br>If you did not make this change, please contact our support team immediately to secure your account.</p>
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Flex Yoga Indonesia. All rights reserved.<br>
            Tangerang, Banten
        </div>
    </div>
</body>
</html>