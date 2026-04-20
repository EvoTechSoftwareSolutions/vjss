<?php

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

header('Content-Type: application/json');

// Get POST data
$fname    = isset($_POST['fname'])      ? htmlspecialchars(trim($_POST['fname']))      : '';
$lname    = isset($_POST['lname'])      ? htmlspecialchars(trim($_POST['lname']))      : '';
$phone    = isset($_POST['phone'])      ? htmlspecialchars(trim($_POST['phone']))      : '';
$email    = isset($_POST['email'])      ? htmlspecialchars(trim($_POST['email']))      : '';
$service  = isset($_POST['service'])    ? htmlspecialchars(trim($_POST['service']))    : '';
$location = isset($_POST['location'])   ? htmlspecialchars(trim($_POST['location']))   : '';
$dateType   = isset($_POST['dateType'])   ? htmlspecialchars(trim($_POST['dateType']))   : '';
$singleDate = isset($_POST['singleDate']) ? htmlspecialchars(trim($_POST['singleDate'])) : '';
$dateFrom   = isset($_POST['dateFrom'])   ? htmlspecialchars(trim($_POST['dateFrom']))   : '';
$dateTo     = isset($_POST['dateTo'])     ? htmlspecialchars(trim($_POST['dateTo']))     : '';
$message    = isset($_POST['message'])    ? htmlspecialchars(trim($_POST['message']))    : '';

// Validation
if (empty($fname) || empty($phone) || empty($service) || empty($location)) {
  echo json_encode([
    "status"  => "error",
    "message" => "Vul alstublieft alle verplichte velden in (Naam, Telefoon, Dienst, Locatie)."
  ]);
  exit;
}

if (!preg_match('/^[\d\s\+\-]{4,16}$/', $phone)) {
  echo json_encode([
    "status"  => "error",
    "message" => "Het telefoonnummer moet uit 4 tot 16 cijfers bestaan."
  ]);
  exit;
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode([
    "status"  => "error",
    "message" => "Ongeldig e-mailadres."
  ]);
  exit;
}

// Build date string
if ($dateType === "single" && !empty($singleDate)) {
  $dateInfo = $singleDate;
} elseif ($dateType === "range" && !empty($dateFrom) && !empty($dateTo)) {
  $dateInfo = $dateFrom . " tot " . $dateTo;
} else {
  $dateInfo = "Niet opgegeven";
}

// Prepare template variables
$full_name    = $fname . " " . $lname;
$company      = !empty($lname) ? $lname : "Niet opgegeven";
$to_name      = $fname;
$service_type = $service;
$location_val = $location;
$date_period  = $dateInfo;
$remarks      = !empty($message) ? nl2br($message) : "Geen aanvullende opmerkingen";
$submitted_at = date('d-m-Y H:i:s');
$reply_to     = !empty($email) ? $email : 'kawarjanagunasekara@gmail.com';

// ── Admin email body ────────────────────────────────────────────────────────
$adminSubject = "Nieuwe Offerteaanvraag — VJ Security Services";
$adminBody = '<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nieuwe Offerteaanvraag — VJ Security Services</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { background: #f0f2f5; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; }
  .wrapper { max-width: 620px; margin: 32px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
  .header { background: #050E17; padding: 32px 40px; }
  .header-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
  .brand { color: #C8A24A; font-size: 18px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
  .license-badge { background: rgba(200,162,74,0.12); border: 1px solid rgba(200,162,74,0.35); border-radius: 4px; padding: 4px 10px; font-size: 11px; color: #C8A24A; letter-spacing: 1px; }
  .header-rule { height: 1px; background: rgba(200,162,74,0.25); margin-bottom: 24px; }
  .alert-label { display: inline-block; background: #C8A24A; color: #050E17; font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; padding: 4px 12px; border-radius: 3px; margin-bottom: 12px; }
  .header h1 { color: #ffffff; font-size: 22px; font-weight: 600; line-height: 1.3; }
  .header-meta { margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.45); letter-spacing: 0.5px; }
  .body { padding: 36px 40px; }
  .section-title { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: #C8A24A; margin-bottom: 14px; padding-bottom: 6px; border-bottom: 1px solid #e8ebf0; }
  .info-table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
  .info-table tr td { padding: 9px 0; vertical-align: top; font-size: 14px; line-height: 1.5; }
  .info-table tr td:first-child { color: #8a95a3; font-weight: 500; width: 42%; }
  .info-table tr td:last-child { color: #1a2535; font-weight: 500; }
  .info-table tr { border-bottom: 1px solid #f0f2f5; }
  .info-table tr:last-child { border-bottom: none; }
  .highlight-row td { background: #fdf9f0 !important; padding: 10px 12px !important; border-radius: 4px; }
  .highlight-row td:first-child { color: #8a6820 !important; border-radius: 4px 0 0 4px; }
  .highlight-row td:last-child { color: #5a4510 !important; font-weight: 700 !important; border-radius: 0 4px 4px 0; }
  .remarks-box { background: #f7f9fc; border-left: 3px solid #C8A24A; border-radius: 0 6px 6px 0; padding: 14px 16px; margin-bottom: 28px; font-size: 14px; color: #2a3545; line-height: 1.7; }
  .remarks-box .remarks-label { font-size: 11px; font-weight: 700; letter-spacing: 1.5px; color: #C8A24A; text-transform: uppercase; margin-bottom: 6px; }
  .action-row { display: flex; gap: 12px; margin-bottom: 32px; flex-wrap: wrap; }
  .btn-primary { display: inline-block; background: #C8A24A; color: #050E17; font-size: 13px; font-weight: 700; padding: 11px 22px; border-radius: 5px; text-decoration: none; letter-spacing: 0.3px; }
  .btn-secondary { display: inline-block; background: transparent; color: #1a2535; font-size: 13px; font-weight: 600; padding: 11px 22px; border-radius: 5px; text-decoration: none; border: 1px solid #d0d7e0; }
  .divider { height: 1px; background: #e8ebf0; margin: 28px 0; }
  .footer { background: #f7f9fc; border-top: 1px solid #e8ebf0; padding: 20px 40px; }
  .footer-inner { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; }
  .footer-brand { font-size: 12px; font-weight: 700; color: #050E17; letter-spacing: 0.5px; }
  .footer-meta { font-size: 11px; color: #9aa3ae; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <div class="header-top">
      <span class="brand">VJ Security Services</span>
      <span class="license-badge">ND7924</span>
    </div>
    <div class="header-rule"></div>
    <div class="alert-label">Nieuwe aanvraag</div>
    <h1>Offerteaanvraag ontvangen</h1>
    <div class="header-meta">Ontvangen op: ' . $submitted_at . '</div>
  </div>
  <div class="body">
    <div class="section-title">Contactgegevens</div>
    <table class="info-table">
      <tr><td>Volledige naam</td><td>' . $full_name . '</td></tr>
      <tr><td>Bedrijfsnaam</td><td>' . $company . '</td></tr>
      <tr><td>Telefoonnummer</td><td>' . $phone . '</td></tr>
      <tr><td>E-mailadres</td><td>' . (!empty($email) ? $email : "Niet opgegeven") . '</td></tr>
    </table>
    <div class="section-title">Aanvraagdetails</div>
    <table class="info-table">
      <tr class="highlight-row"><td>Type dienst</td><td>' . $service_type . '</td></tr>
      <tr><td>Locatie</td><td>' . $location_val . '</td></tr>
      <tr><td>Datum / periode</td><td>' . $date_period . '</td></tr>
    </table>
    <div class="remarks-box">
      <div class="remarks-label">Aanvullende opmerkingen</div>
      ' . $remarks . '
    </div>
    <div class="action-row">
      <a href="mailto:' . $reply_to . '?subject=Re: Offerteaanvraag VJ Security Services" class="btn-primary">Direct reageren</a>
      <a href="tel:' . $phone . '" class="btn-secondary">Bellen: ' . $phone . '</a>
    </div>
    <div class="divider"></div>
    <p style="font-size:13px; color:#6b7a8d; line-height:1.6;">
      Stuur binnen <strong style="color:#1a2535;">24 uur</strong> een reactie naar de aanvrager conform onze servicenorm.
      Alle aanvragen zijn vrijblijvend en worden behandeld conform de Wpbr.
    </p>
  </div>
  <div class="footer">
    <div class="footer-inner">
      <span class="footer-brand">
      Ontworpen en ontwikkeld door <a href="https://evotechsoftwaresolutions.com" target="_blank">Evon Technologies Software Solutions (PVT) Ltd.</a>
      </span>
    </div>
  </div>
</div>
</body>
</html>';

// ── Customer confirmation email body ────────────────────────────────────────
$customerSubject = "Uw aanvraag is ontvangen — VJ Security Services";
$customerBody = '<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Uw aanvraag is ontvangen — VJ Security Services</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { background: #f0f2f5; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; }
  .wrapper { max-width: 620px; margin: 32px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
  .hero { background: #050E17; padding: 48px 40px 40px; text-align: center; position: relative; }
  .hero-rule-top { height: 3px; background: linear-gradient(90deg, transparent, #C8A24A, transparent); margin-bottom: 32px; }
  .logo-mark { width: 56px; height: 56px; background: rgba(200,162,74,0.12); border: 1.5px solid rgba(200,162,74,0.4); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; }
  .check-icon { display: inline-block; width: 22px; height: 22px; position: relative; }
  .check-icon::after { content: "✓"; color: #C8A24A; font-size: 20px; font-weight: 700; line-height: 1; }
  .brand-name { color: #C8A24A; font-size: 12px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 14px; }
  .hero h1 { color: #ffffff; font-size: 24px; font-weight: 600; line-height: 1.3; margin-bottom: 10px; }
  .hero-sub { color: rgba(255,255,255,0.5); font-size: 14px; line-height: 1.6; }
  .hero-rule-bot { height: 1px; background: rgba(200,162,74,0.2); margin-top: 32px; }
  .body { padding: 36px 40px; }
  .greeting { font-size: 16px; color: #1a2535; font-weight: 600; margin-bottom: 12px; }
  .intro-text { font-size: 14px; color: #4a5568; line-height: 1.75; margin-bottom: 28px; }
  .summary-card { background: #f7f9fc; border: 1px solid #e4e9f0; border-radius: 6px; overflow: hidden; margin-bottom: 28px; }
  .summary-header { background: #050E17; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 2px; color: #C8A24A; text-transform: uppercase; }
  .summary-row { display: flex; padding: 10px 16px; border-bottom: 1px solid #e4e9f0; font-size: 13px; }
  .summary-row:last-child { border-bottom: none; }
  .summary-label { color: #8a95a3; font-weight: 500; width: 42%; flex-shrink: 0; }
  .summary-value { color: #1a2535; font-weight: 600; }
  .promise-strip { background: #fdf9f0; border: 1px solid rgba(200,162,74,0.25); border-radius: 6px; padding: 16px 20px; margin-bottom: 28px; }
  .promise-row { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 10px; }
  .promise-row:last-child { margin-bottom: 0; }
  .promise-dot { width: 8px; height: 8px; background: #C8A24A; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
  .promise-text { font-size: 13px; color: #4a3a10; line-height: 1.5; }
  .promise-text strong { color: #1a2535; }
  .divider { height: 1px; background: #e8ebf0; margin: 24px 0; }
  .contact-block { display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 24px; }
  .contact-item { display: flex; flex-direction: column; gap: 3px; }
  .contact-label { font-size: 11px; font-weight: 700; letter-spacing: 1.5px; color: #8a95a3; text-transform: uppercase; }
  .contact-value { font-size: 14px; font-weight: 600; color: #050E17; }
  .contact-value a { color: #C8A24A; text-decoration: none; }
  .cta-row { text-align: center; margin: 28px 0; }
  .cta-btn { display: inline-block; background: #C8A24A; color: #050E17; font-size: 14px; font-weight: 700; padding: 14px 32px; border-radius: 5px; text-decoration: none; letter-spacing: 0.3px; }
  .closing { font-size: 14px; color: #4a5568; line-height: 1.75; margin-bottom: 20px; }
  .sign-off { font-size: 14px; color: #1a2535; font-weight: 600; }
  .sign-off-team { font-size: 13px; color: #8a95a3; }
  .footer { background: #050E17; padding: 20px 40px; width: 100%; }
  .footer-inner { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
  .footer-brand { font-size: 12px; font-weight: 700; color: #C8A24A; letter-spacing: 0.5px; }
  .footer-meta { font-size: 11px; color: rgba(255,255,255,0.35); text-align: right; line-height: 1.5; }
  .footer-license { font-size: 11px; color: rgba(200,162,74,0.6); margin-top: 4px; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="hero">
    <div class="hero-rule-top"></div>
    <div class="logo-mark"><span class="check-icon"></span></div>
    <div class="brand-name">VJ Security Services</div>
    <h1>Uw aanvraag is ontvangen</h1>
    <p class="hero-sub">Wij nemen binnen 24 uur contact met u op.</p>
    <div class="hero-rule-bot"></div>
  </div>
  <div class="body">
    <p class="greeting">Geachte ' . $to_name . ',</p>
    <p class="intro-text">
      Hartelijk dank voor uw offerteaanvraag bij VJ Security Services. Wij hebben uw aanvraag in goede orde ontvangen
      en zullen deze met zorg behandelen. Hieronder vindt u een samenvatting van uw aanvraag.
    </p>
    <div class="summary-card">
      <div class="summary-header">Samenvatting van uw aanvraag</div>
      <div class="summary-row">
        <span class="summary-label">Type dienst</span>
        <span class="summary-value">' . $service_type . '</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Locatie</span>
        <span class="summary-value">' . $location_val . '</span>
      </div>
      <div class="summary-row">
        <span class="summary-label">Datum / periode</span>
        <span class="summary-value">' . $date_period . '</span>
      </div>
    </div>
    <div class="promise-strip">
      <div class="promise-row">
        <div class="promise-dot"></div>
        <span class="promise-text"><strong>Reactie binnen 24 uur</strong> — Een van onze medewerkers neemt spoedig contact met u op.</span>
      </div>
      <div class="promise-row">
        <div class="promise-dot"></div>
        <span class="promise-text"><strong>Vrijblijvende offerte</strong> — U bent nergens aan verbonden totdat u akkoord gaat.</span>
      </div>
      <div class="promise-row">
        <div class="promise-dot"></div>
        <span class="promise-text"><strong>Erkend &amp; verzekerd</strong> — Wij opereren volledig conform de Wpbr (licentie ND7924).</span>
      </div>
    </div>
    <div class="divider"></div>
    <div class="contact-block">
      <div class="contact-item">
        <span class="contact-label">Telefoon</span>
        <span class="contact-value"><a href="tel:+310618879077">+061 887 907 7</a></span>
      </div>
      <div class="contact-item">
        <span class="contact-label">E-mail</span>
        <span class="contact-value"><a href="mailto:info@vjsecurity.nl">info@vjsecurity.nl</a></span>
      </div>
      <div class="contact-item">
        <span class="contact-label">Beschikbaar</span>
        <span class="contact-value" style="color:#4a5568;">7 dagen · 24/7</span>
      </div>
    </div>
    <div class="cta-row">
      <a href="mailto:info@vjsecurity.nl" class="cta-btn">Direct contact opnemen</a>
    </div>
    <div class="divider"></div>
    <p class="closing">
      Heeft u in de tussentijd vragen of aanvullende informatie? Neem gerust contact met ons op via
      bovenstaand telefoonnummer of e-mailadres. Wij helpen u graag.
    </p>
    <p class="sign-off">Met vriendelijke groet,</p>
    <p class="sign-off">VJ Security Services</p>
    <p class="sign-off-team" style="margin-top:4px;">Leonard Springerlaan 35, 9727 KB Groningen</p>
  </div>
  <div class="footer">
    <div class="footer-inner">
      <div>
        <div class="footer-brand">Dit is een geautomatiseerd E-mailbericht.</div>
        <div class="footer-license">Ontworpen en ontwikkeld door <a href="https://evotechsoftwaresolutions.com" target="_blank">Evon Technologies Software Solutions (PVT) Ltd.</a></div>
      </div>
      // <div class="footer-meta">
      //   info@vjsecurity.nl<br>
      //   Leonard Springerlaan 35, 9727 KB Groningen
      // </div>
    </div>
  </div>
</div>
</body>
</html>';

// ── Send emails via PHPMailer ────────────────────────────────────────────────
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'sandilalometh2005@gmail.com';
$mail->Password   = 'mxownkxsjoqjtuiu';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;
$mail->setFrom('sandilalometh2005@gmail.com', 'VJ Security Services');
$mail->addReplyTo($reply_to, $full_name);
$mail->isHTML(true);

// ── 1. Admin notification ────────────────────────────────────────────────────
$mail->addAddress('kawarjanagunasekara@gmail.com');
$mail->Subject = $adminSubject;
$mail->Body    = $adminBody;

if (!$mail->send()) {
  echo json_encode([
    "status"  => "error",
    "message" => "Er is een fout opgetreden bij het verzenden. Probeer het later opnieuw."
  ]);
  exit;
}

// ── 2. Customer confirmation (only if email provided) ────────────────────────
if (!empty($email)) {
  $mail->clearAddresses();
  $mail->clearReplyTos();
  $mail->addAddress($email, $full_name);
  $mail->addReplyTo('info@vjsecurity.nl', 'VJ Security Services');
  $mail->Subject = $customerSubject;
  $mail->Body    = $customerBody;
  $mail->send(); // best-effort — don't fail the whole request if this bounces
}

echo json_encode([
  "status"  => "success",
  "message" => "Message Sent successfully"
]);
