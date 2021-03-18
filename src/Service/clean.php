<?php


namespace App\Service;


use App\Controller\UserController;

class clean extends UserController {
    public function cleanString($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function returnHtmlFile($code) {

        $text = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=07uPB9ryDbb3CdpszhlmszErgHMxdbsrDrUfLet81AUuelwMzT8VBVCYV8qgu5pWGx-V9o9snuu2kyWORMG8Olg1X_0NabuR1zZx5HVPFSUIJ2_CoAWPhMYolO3uzGF4tJkav8hfRLai3aQ8y0YuvQ" charset="UTF-8"></script><style>
        /* CONFIG STYLES Please do not delete and edit CSS styles below */
        /* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
        #outlook a {
            padding: 0;
        }

        .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }

        /*
        END OF IMPORTANT
        */
        body {
            width: 100%;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse;
            border-spacing: 0px;
        }

        table td,
        body,
        .es-wrapper {
            padding: 0;
            Margin: 0;
        }

        .es-content,
        .es-header,
        .es-footer {
            table-layout: fixed !important;
            width: 100%;
        }

        img {
            display: block;
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p,
        hr {
            Margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            Margin: 0;
            line-height: 120%;
            mso-line-height-rule: exactly;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
        }

        p,
        ul li,
        ol li,
        a {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            mso-line-height-rule: exactly;
        }

        .es-left {
            float: left;
        }

        .es-right {
            float: right;
        }

        .es-p5 {
            padding: 5px;
        }

        .es-p5t {
            padding-top: 5px;
        }

        .es-p5b {
            padding-bottom: 5px;
        }

        .es-p5l {
            padding-left: 5px;
        }

        .es-p5r {
            padding-right: 5px;
        }

        .es-p10 {
            padding: 10px;
        }

        .es-p10t {
            padding-top: 10px;
        }

        .es-p10b {
            padding-bottom: 10px;
        }

        .es-p10l {
            padding-left: 10px;
        }

        .es-p10r {
            padding-right: 10px;
        }

        .es-p15 {
            padding: 15px;
        }

        .es-p15t {
            padding-top: 15px;
        }

        .es-p15b {
            padding-bottom: 15px;
        }

        .es-p15l {
            padding-left: 15px;
        }

        .es-p15r {
            padding-right: 15px;
        }

        .es-p20 {
            padding: 20px;
        }

        .es-p20t {
            padding-top: 20px;
        }

        .es-p20b {
            padding-bottom: 20px;
        }

        .es-p20l {
            padding-left: 20px;
        }

        .es-p20r {
            padding-right: 20px;
        }

        .es-p25 {
            padding: 25px;
        }

        .es-p25t {
            padding-top: 25px;
        }

        .es-p25b {
            padding-bottom: 25px;
        }

        .es-p25l {
            padding-left: 25px;
        }

        .es-p25r {
            padding-right: 25px;
        }

        .es-p30 {
            padding: 30px;
        }

        .es-p30t {
            padding-top: 30px;
        }

        .es-p30b {
            padding-bottom: 30px;
        }

        .es-p30l {
            padding-left: 30px;
        }

        .es-p30r {
            padding-right: 30px;
        }

        .es-p35 {
            padding: 35px;
        }

        .es-p35t {
            padding-top: 35px;
        }

        .es-p35b {
            padding-bottom: 35px;
        }

        .es-p35l {
            padding-left: 35px;
        }

        .es-p35r {
            padding-right: 35px;
        }

        .es-p40 {
            padding: 40px;
        }

        .es-p40t {
            padding-top: 40px;
        }

        .es-p40b {
            padding-bottom: 40px;
        }

        .es-p40l {
            padding-left: 40px;
        }

        .es-p40r {
            padding-right: 40px;
        }

        .es-menu td {
            border: 0;
        }

        .es-menu td a img {
            display: inline-block !important;
            vertical-align: middle;
        }

        /*
        END CONFIG STYLES
        */
        s {
            text-decoration: line-through;
        }

        a {
            text-decoration: underline;
        }

        p,
        ul li,
        ol li {
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            line-height: 150%;
        }

        ul li,
        ol li {
            Margin-bottom: 15px;
        }

        .es-menu td a {
            text-decoration: none;
            display: block;
        }

        .es-wrapper {
            width: 100%;
            height: 100%;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-wrapper-color {
            background-color: #f6f6f6;
        }

        .es-header {
            background-color: transparent;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-header-body {
            background-color: #ffffff;
        }

        .es-header-body p,
        .es-header-body ul li,
        .es-header-body ol li {
            color: #333333;
            font-size: 14px;
        }

        .es-header-body a {
            color: #1376c8;
            font-size: 14px;
        }

        .es-content-body {
            background-color: #ffffff;
        }

        .es-content-body p,
        .es-content-body ul li,
        .es-content-body ol li {
            color: #333333;
            font-size: 14px;
        }

        .es-content-body a {
            color: #2cb543;
            font-size: 14px;
        }

        .es-footer {
            background-color: transparent;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-footer-body {
            background-color: #ffffff;
        }

        .es-footer-body p,
        .es-footer-body ul li,
        .es-footer-body ol li {
            color: #333333;
            font-size: 14px;
        }

        .es-footer-body a {
            color: #ffffff;
            font-size: 14px;
        }

        .es-infoblock,
        .es-infoblock p,
        .es-infoblock ul li,
        .es-infoblock ol li {
            line-height: 120%;
            font-size: 12px;
            color: #cccccc;
        }

        .es-infoblock a {
            font-size: 12px;
            color: #cccccc;
        }

        h1 {
            font-size: 30px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        h2 {
            font-size: 24px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        h3 {
            font-size: 20px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
        }

        .es-header-body h1 a,
        .es-content-body h1 a,
        .es-footer-body h1 a {
            font-size: 30px;
        }

        .es-header-body h2 a,
        .es-content-body h2 a,
        .es-footer-body h2 a {
            font-size: 24px;
        }

        .es-header-body h3 a,
        .es-content-body h3 a,
        .es-footer-body h3 a {
            font-size: 20px;
        }

        a.es-button,
        button.es-button {
            border-style: solid;
            border-color: #31cb4b;
            border-width: 10px 20px 10px 20px;
            display: inline-block;
            background: #31cb4b;
            border-radius: 30px;
            font-size: 18px;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            font-weight: normal;
            font-style: normal;
            line-height: 120%;
            color: #ffffff;
            text-decoration: none;
            width: auto;
            text-align: center;
        }

        .es-button-border {
            border-style: solid solid solid solid;
            border-color: #2cb543 #2cb543 #2cb543 #2cb543;
            background: #2cb543;
            border-width: 0px 0px 2px 0px;
            display: inline-block;
            border-radius: 30px;
            width: auto;
        }

        /* RESPONSIVE STYLES Please do not delete and edit CSS styles below. If you do not need responsive layout, please delete this section. */
        @media only screen and (max-width: 600px) {

            p,
            ul li,
            ol li,
            a {
                line-height: 150% !important;
            }

            h1 {
                font-size: 30px !important;
                text-align: center;
                line-height: 120% !important;
            }

            h2 {
                font-size: 26px !important;
                text-align: center;
                line-height: 120% !important;
            }

            h3 {
                font-size: 20px !important;
                text-align: center;
                line-height: 120% !important;
            }

            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
                font-size: 30px !important;
            }

            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
                font-size: 26px !important;
            }

            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
                font-size: 20px !important;
            }

            .es-menu td a {
                font-size: 16px !important;
            }

            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
                font-size: 16px !important;
            }

            .es-content-body p,
            .es-content-body ul li,
            .es-content-body ol li,
            .es-content-body a {
                font-size: 16px !important;
            }

            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
                font-size: 16px !important;
            }

            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
                font-size: 12px !important;
            }

            *[class="gmail-fix"] {
                display: none !important;
            }

            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
                text-align: center !important;
            }

            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
                text-align: right !important;
            }

            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
                text-align: left !important;
            }

            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
                display: inline !important;
            }

            .es-button-border {
                display: block !important;
            }

            a.es-button,
            button.es-button {
                font-size: 20px !important;
                display: block !important;
                border-left-width: 0px !important;
                border-right-width: 0px !important;
            }

            .es-adaptive table,
            .es-left,
            .es-right {
                width: 100% !important;
            }

            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
                width: 100% !important;
                max-width: 600px !important;
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important;
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important;
            }

            .es-m-p0 {
                padding: 0px !important;
            }

            .es-m-p0r {
                padding-right: 0px !important;
            }

            .es-m-p0l {
                padding-left: 0px !important;
            }

            .es-m-p0t {
                padding-top: 0px !important;
            }

            .es-m-p0b {
                padding-bottom: 0 !important;
            }

            .es-m-p20b {
                padding-bottom: 20px !important;
            }

            .es-mobile-hidden,
            .es-hidden {
                display: none !important;
            }

            tr.es-desk-hidden,
            td.es-desk-hidden,
            table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important;
            }

            tr.es-desk-hidden {
                display: table-row !important;
            }

            table.es-desk-hidden {
                display: table !important;
            }

            td.es-desk-menu-hidden {
                display: table-cell !important;
            }

            .es-menu td {
                width: 1% !important;
            }

            table.es-table-not-adapt,
            .esd-block-html table {
                width: auto !important;
            }

            table.es-social {
                display: inline-block !important;
            }

            table.es-social td {
                display: inline-block !important;
            }
        }

        /* END RESPONSIVE STYLES */
    </style>
</head>
<body>
<td class="esd-stripe" align="center">
    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
        <tbody>
        <tr>
            <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="es-m-p0r esd-container-frame" width="560" valign="top" align="center">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" class="esd-block-image" style="font-size: 0px;">
                                        <a target="_blank">
                                            <img class="adapt-img"
                                                 src="https://nsdiqf.stripocdn.email/content/guids/CABINET_4b7240390ba510b96f96e89aef687ede/images/86921615826227495.png"
                                                 alt style="display: block;" width="560">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="esd-block-spacer es-p20" style="font-size:0">
                                        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cccccc; background:none; height:1px; width:100%; margin:0px 0px 0px 0px;"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td width="560" class="esd-container-frame" align="center" valign="top">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td align="left" class="esd-block-text">
                                        <p>Hallo,</p>
                                        <p>Bitte verifizieren Sie Ihre E-Mail-Adresse mit dem beigefügten Link, um die
                                            Kontoeinrichtung abzuschließen.</p>
                                        <p><br></p>
                                        <p>Ihr Verifizierungslink wird in 24 Stunden ablaufen, also stellen Sie sicher,
                                            dass Sie ihn so schnell wie möglich verwenden.</p>
                                        <p><br></p>
                                        <p>Vielen Dank!<br>Das FreePoint-Team</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="esd-block-spacer es-p20" style="font-size:0">
                                        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td style="border-bottom: 0px solid #cccccc; background: none; height: 1px; width: 100%; margin: 0px;"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="esd-block-button">
                                                    <span class="es-button-border" style="background: #00a982;">
                                                        <a href="https://www.freepoint.htl3r.com/verify/' . $code . '" class="es-button"
                                                           target="_blank"
                                                           style="font-family: Helvetica; font-weight: bold; background: #00a982; border-color: #00a982;">Verifizieren</a>
                                                    </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="esd-block-spacer es-p20" style="font-size:0">
                                        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td style="border-bottom: 0px solid #cccccc; background: none; height: 1px; width: 100%; margin: 0px;"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" class="esd-block-social" style="font-size:0">
                                        <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social">
                                            <tbody>
                                            <tr>
                                                <td align="center" valign="top" class="es-p10r">
                                                    <a target="_blank" href="https://www.instagram.com/freepoint_app/">
                                                        <img title="Instagram"
                                                             src="https://nsdiqf.stripocdn.email/content/assets/img/social-icons/circle-colored/instagram-circle-colored.png"
                                                             alt="Inst" width="32">
                                                    </a>
                                                </td>
                                                <td align="center" valign="top">
                                                    <a target="_blank"
                                                       href="https://www.youtube.com/channel/UCq0F-y8VjfWXpwMW9ETpi2Q">
                                                        <img title="Youtube"
                                                             src="https://nsdiqf.stripocdn.email/content/assets/img/social-icons/circle-colored/youtube-circle-colored.png"
                                                             alt="Yt" width="32">
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" class="esd-block-text">
                                        <p><a target="_blank" href="https://www.freepoint.at/imprint/">Impressum</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</td>
</body>
</html>';

        return $text;
    }
}