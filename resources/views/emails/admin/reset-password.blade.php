<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="color-scheme" content="dark">
    <meta name="supported-color-schemes" content="dark">
    <title>Reset your password — KORU Center</title>
    <style type="text/css">
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        
        @media (prefers-color-scheme: dark) {
            .bg-main { background-color: #030712 !important; }
            .text-primary { color: #f9fafb !important; }
            .text-secondary { color: #9ca3af !important; }
            .text-muted { color: #6b7280 !important; }
            .border-line { border-top: 1px solid #1f2937 !important; }
            .info-block { background-color: #0f172a !important; border: 1px solid #1e293b !important; }
        }
    </style>
</head>
<body class="bg-main" style="margin: 0; padding: 0; width: 100% !important; background-color: #030712; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="bg-main" style="background-color: #030712;">
        <tr>
            <td align="center" style="padding: 48px 24px;">
                
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="560">
                <tr>
                <td align="left" valign="top" width="560">
                <![endif]-->

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 560px; width: 100%;">
                    
                    <!-- Branding -->
                    <tr>
                        <td align="left" style="padding-bottom: 32px;">
                            <img src="{{ url('img/logo.png') }}" alt="KORU Center" width="120" height="120" style="display: block; border: 0; border-radius: 12px;" />
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td align="left" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
                            
                            <h1 class="text-primary" style="color: #f9fafb; font-size: 24px; font-weight: 600; margin: 0 0 20px 0;">
                                Reset your password
                            </h1>
                            
                            <p class="text-secondary" style="color: #9ca3af; font-size: 15px; line-height: 24px; margin: 0 0 24px 0;">
                                A request has been generated to change the access credentials linked to the platform's administration panel.
                            </p>

                            <!-- Account Block -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="info-block" style="background-color: #0b0f19; border: 1px solid #1f2937; border-radius: 8px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 16px 20px;">
                                        <div class="text-muted" style="color: #6b7280; font-size: 11px; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;">
                                            Account identifier
                                        </div>
                                        <div style="color: #02B8BC; font-size: 15px; font-weight: 600; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;">
                                            {{ $username }}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <p class="text-secondary" style="color: #9ca3af; font-size: 15px; line-height: 24px; margin: 0 0 24px 0;">
                                To proceed with the change and securely configure your new access credentials, click the verification link below:
                            </p>

                            <!-- CTA Button -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 24px;">
                                <tr>
                                    <td align="left">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center" bgcolor="#02B8BC" style="border-radius: 6px;">
                                                    <a href="{{ $resetUrl }}" target="_blank" rel="noopener" style="display: inline-block; padding: 12px 24px; font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px; font-weight: 500; color: #ffffff; text-decoration: none;">
                                                        Set new password
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p class="text-muted" style="color: #6b7280; font-size: 13px; margin: 0 0 32px 0;">
                                * This security link was issued with a strict expiration time and will automatically expire in <span style="color: #9ca3af;" class="text-secondary">{{ $expireMinutes }} minutes</span>.
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 24px;">
                                <tr>
                                    <td class="border-line" style="border-top: 1px solid #1f2937; height: 1px;"></td>
                                </tr>
                            </table>

                            <p class="text-muted" style="color: #6b7280; font-size: 12px; line-height: 18px; margin: 0 0 24px 0; word-break: break-all;">
                                If you experience issues with the button, copy and paste this direct link into your browser's address bar:<br />
                                <a href="{{ $resetUrl }}" style="color: #02B8BC; text-decoration: none;">{{ $resetUrl }}</a>
                            </p>

                            <p class="text-muted" style="color: #6b7280; font-size: 12px; line-height: 18px; margin: 0;">
                                If you did not initiate this request, no further action is required. Your profile and information remain fully protected under the system's authentication layers.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="left" style="padding-top: 48px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td class="border-line" style="border-top: 1px solid #1f2937; padding-top: 16px;">
                                        <p class="text-muted" style="color: #4b5563; font-size: 11px; margin: 0; font-family: ui-monospace, SFMono-Regular, monospace; text-transform: uppercase; letter-spacing: 0.05em;">
                                            Automated message sent by KORU Core Security Dev.
                                        </p>
                                        <p style="margin: 8px 0 0 0; padding: 0;">
                                            <a href="{{ config('app.url') }}" style="color: #6b7280; font-size: 12px; text-decoration: none; margin-right: 16px;">Platform</a>
                                            <a href="{{ config('app.url') }}/admin/login" style="color: #6b7280; font-size: 12px; text-decoration: none;">Admin Console</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>

                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
                
            </td>
        </tr>
    </table>
    
</body>
</html>