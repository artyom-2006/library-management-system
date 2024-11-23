<?php
$otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
$subject = "Գաղտնաբառի վերականգնում";
$body = '
<!DOCTYPE html>
<html lang="hy">
<head>
    <style>
        .content {
            background-color: #FEFEFE;
            color: #333333;
        }

        .number-block {
            width: 50px;
            height: 60px;
            background-color: #EBEBEB;
            display: inline-block;
            text-align: center;
            border-radius: 15px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .number-block span {
            font-weight: bold;
            font-size: 26px;
            display: inline-block;
            line-height: 60px;
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 34px !important;
            }

            p {
                font-size: 20px !important;
            }

            .number-block {
                width: 60px !important;
                height: 70px !important;
            }

            .number-block span {
                font-size: 32px !important;
                line-height: 70px !important;
            }
        }

        @media (prefers-color-scheme: dark) {
            .content {
                background-color: #0D1012;
                color: #F0F0F0;
            }

            .number-block {
                background-color: #525252;
            }

            .number-block span {
                color: #F0F0F0;
            }
        }
    </style>
</head>
<body>
    <div style="width: 600px; background-color: #FA420A; padding: 40px;">
        <div class="content" style="width: calc(100% - 40px); padding: 30px 20px 50px 20px; text-align: center; display: inline-block; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
            <h1 style="font-size: 24px; margin-bottom: 50px;">Գրադարան</h1>
            <p style="font-size: 16px;">Գաղտնաբառի վերականգնման համար նախատեսված ձեր կոդը հետևյալն է․</p>
            <div style="display: inline-block; margin-top: 30px; margin-bottom: 30px;">
                <div class="number-block"><span>' . $otp[0] . '</span></div>
                <div class="number-block"><span>' . $otp[1] . '</span></div>
                <div class="number-block"><span>' . $otp[2] . '</span></div>
                <div class="number-block"><span>' . $otp[3] . '</span></div>
                <div class="number-block"><span>' . $otp[4] . '</span></div>
                <div class="number-block"><span>' . $otp[5] . '</span></div>
            </div>
            <p style="font-size: 14px;">Կիրառեք ձեզ տրամադրված կոդը ծրագրում՝ որպեսզի փոփոխեք ձեր գաղտնաբառը</p>
        </div>
    </div>
</body>
</html>
';