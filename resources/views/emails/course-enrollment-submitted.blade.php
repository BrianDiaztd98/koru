<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <title>New CE enrollment | KORU Center</title>
    <style>
        body { margin: 0; padding: 0; background: #eef3f5; color: #20313a; font-family: Arial, Helvetica, sans-serif; }
        table { border-collapse: collapse; }
        @media only screen and (max-width: 700px) {
            .shell { width: 100% !important; }
            .outer { padding: 20px 12px !important; }
            .content { padding: 28px 22px !important; }
            .two-col { display: block !important; width: 100% !important; }
            .two-col td { display: block !important; width: 100% !important; padding: 0 0 18px 0 !important; }
        }
    </style>
</head>
<body>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="outer" align="center" style="padding: 42px 20px;">
                <table class="shell" role="presentation" width="760" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 760px;">
                    <tr>
                        <td style="padding: 0 0 18px 4px;">
                            <img src="{{ asset('img/logo.png') }}" alt="KORU Center" width="112" style="display: block; width: 112px; height: auto;">
                            <p style="margin: 8px 0 0; color: #037E93; font-size: 11px; font-weight: bold; letter-spacing: 1.5px; text-transform: uppercase;">PAIN FREE, BETTER LIFE.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="overflow: hidden; border-radius: 14px; background: #ffffff; box-shadow: 0 10px 30px rgba(32, 49, 58, 0.08);">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 38px 46px; background: #037E93;">
                                        <p style="margin: 0 0 10px; color: #02B8BC; font-size: 11px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">Professional CE</p>
                                        <h1 style="margin: 0; color: #ffffff; font-size: 28px; line-height: 1.2;">New enrollment received</h1>
                                        <p style="margin: 12px 0 0; color: #b9cbd0; font-size: 14px; line-height: 1.6;">A visitor submitted a registration request through the KORU website.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content" style="padding: 42px 46px;">
                                        <p style="margin: 0 0 8px; color: #71828a; font-size: 11px; font-weight: bold; letter-spacing: 1.5px; text-transform: uppercase;">Course selected</p>
                                        <h2 style="margin: 0 0 28px; color: #037E93; font-size: 22px; line-height: 1.3;">{{ $enrollment->course?->title_en ?? 'Course unavailable' }}</h2>
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 28px; background: #f2f8f8; border-left: 4px solid #02B8BC;">
                                            <tr>
                                                <td style="padding: 16px 18px;">
                                                    <p style="margin: 0 0 5px; color: #71828a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Action needed</p>
                                                    <p style="margin: 0; color: #31505a; font-size: 14px; line-height: 1.5;">Contact this participant to confirm availability and explain the next enrollment steps.</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0 0 14px; color: #037E93; font-size: 15px; font-weight: bold;">Participant details</p>
                                        <table class="two-col" role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 8px;">
                                            <tr>
                                                <td width="50%" style="padding: 0 18px 18px 0; vertical-align: top;">
                                                    <p style="margin: 0 0 5px; color: #84949a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Full name</p>
                                                    <p style="margin: 0; color: #20313a; font-size: 15px; line-height: 1.4;">{{ $enrollment->full_name }}</p>
                                                </td>
                                                <td width="50%" style="padding: 0 0 18px; vertical-align: top;">
                                                    <p style="margin: 0 0 5px; color: #84949a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Phone</p>
                                                    <p style="margin: 0; color: #20313a; font-size: 15px; line-height: 1.4;">{{ $enrollment->phone ?: 'Not provided' }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding: 0 18px 18px 0; vertical-align: top;">
                                                    <p style="margin: 0 0 5px; color: #84949a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Email</p>
                                                    <a href="mailto:{{ $enrollment->email }}" style="color: #037E93; font-size: 15px; line-height: 1.4; text-decoration: none;">{{ $enrollment->email }}</a>
                                                </td>
                                                <td width="50%" style="padding: 0 0 18px; vertical-align: top;">
                                                    <p style="margin: 0 0 5px; color: #84949a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">Received</p>
                                                    <p style="margin: 0; color: #20313a; font-size: 15px; line-height: 1.4;">{{ $enrollment->created_at?->format('M j, Y, g:i A') ?? now()->format('M j, Y, g:i A') }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding: 0 0 18px; vertical-align: top;">
                                                    <p style="margin: 0 0 5px; color: #84949a; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">License number</p>
                                                    <p style="margin: 0; color: #20313a; font-size: 15px; line-height: 1.4;">{{ $enrollment->license_number ?: 'Not provided' }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                        @if ($enrollment->message)
                                            <div style="margin-top: 8px; padding-top: 22px; border-top: 1px solid #e2eaec;">
                                                <p style="margin: 0 0 8px; color: #037E93; font-size: 15px; font-weight: bold;">Participant message</p>
                                                <p style="margin: 0; color: #53666e; font-size: 14px; line-height: 1.7;">{{ $enrollment->message }}</p>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px 4px 0;">
                            <p style="margin: 0; color: #819197; font-size: 11px; line-height: 1.6;">This automated notification was sent by the KORU Center website. The request is also available in the CE Courses section of the admin panel.</p>
                            <p style="margin: 10px 0 0; color: #9aa8ad; font-size: 11px;">KORU Center · Professional education and recovery care</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
