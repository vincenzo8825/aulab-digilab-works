<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificato di Partecipazione</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        
        .certificate-container {
            width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 20px solid #0056b3;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            background-image: url("{{ asset('images/certificate-bg.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        
        .certificate-title {
            font-size: 36px;
            color: #0056b3;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        
        .certificate-subtitle {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
        }
        
        .recipient-name {
            font-size: 30px;
            color: #0056b3;
            margin: 30px 0;
            font-weight: bold;
            border-bottom: 2px solid #0056b3;
            display: inline-block;
            padding-bottom: 5px;
        }
        
        .certificate-text {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .certificate-date {
            font-size: 18px;
            color: #555;
            margin-bottom: 40px;
        }
        
        .signature-container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }
        
        .signature {
            text-align: center;
        }
        
        .signature-line {
            width: 200px;
            border-top: 1px solid #333;
            margin: 10px auto;
        }
        
        .signature-name {
            font-size: 16px;
            font-weight: bold;
        }
        
        .signature-title {
            font-size: 14px;
            color: #555;
        }
        
        .certificate-footer {
            margin-top: 50px;
            font-size: 14px;
            color: #777;
        }
        
        .certificate-id {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 12px;
            color: #999;
        }
        
        .seal {
            position: absolute;
            bottom: 70px;
            right: 50px;
            width: 120px;
            height: 120px;
            opacity: 0.2;
        }
        
        .border-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #0056b3;
            margin: 10px;
            pointer-events: none;
        }
        
        .corner {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 2px solid #0056b3;
        }
        
        .corner-top-left {
            top: 20px;
            left: 20px;
            border-right: none;
            border-bottom: none;
        }
        
        .corner-top-right {
            top: 20px;
            right: 20px;
            border-left: none;
            border-bottom: none;
        }
        
        .corner-bottom-left {
            bottom: 20px;
            left: 20px;
            border-right: none;
            border-top: none;
        }
        
        .corner-bottom-right {
            bottom: 20px;
            right: 20px;
            border-left: none;
            border-top: none;
        }
        
        .qr-code {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 80px;
            height: 80px;
        }
        
        @media print {
            body {
                background-color: #fff;
            }
            
            .certificate-container {
                margin: 0;
                box-shadow: none;
                border: 10px solid #0056b3;
                width: 100%;
                box-sizing: border-box;
            }
            
            .print-button {
                display: none;
            }
        }
        
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            z-index: 1000;
        }
        
        .print-button:hover {
            background-color: #003d7a;
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">Stampa Certificato</button>
    
    <div class="certificate-container">
        <div class="border-pattern"></div>
        <div class="corner corner-top-left"></div>
        <div class="corner corner-top-right"></div>
        <div class="corner corner-bottom-left"></div>
        <div class="corner corner-bottom-right"></div>
        
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        
        <div class="certificate-title">Certificato di Partecipazione</div>
        <div class="certificate-subtitle">Questo certifica che</div>
        
        <div class="recipient-name">{{ $user->name }}</div>
        
        <div class="certificate-text">
            ha partecipato con successo all'evento<br>
            <strong>"{{ $event->title }}"</strong><br>
            della durata di {{ $event->getDurationInHours() }} ore
        </div>
        
        <div class="certificate-date">
            {{ $event->start_date->format('d/m/Y') }}
        </div>
        
        <div class="signature-container">
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-name">{{ $event->creator->name }}</div>
                <div class="signature-title">Organizzatore</div>
            </div>
            
            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-name">{{ config('app.company_name') }}</div>
                <div class="signature-title">Azienda</div>
            </div>
        </div>
        
        <div class="certificate-footer">
            Questo certificato è rilasciato come riconoscimento della partecipazione all'evento.<br>
            Per verificare l'autenticità di questo certificato, scansiona il codice QR o visita il nostro sito web.
        </div>
        
        <div class="certificate-id">ID: {{ $certificateId }}</div>
        
        <img src="{{ asset('images/seal.png') }}" alt="Sigillo" class="seal">
        <img src="data:image/png;base64,{{ $qrCode }}" alt="Codice QR" class="qr-code">
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Aggiungi animazione al caricamento
            const certificate = document.querySelector('.certificate-container');
            certificate.style.opacity = '0';
            certificate.style.transition = 'opacity 1s ease-in-out';
            
            setTimeout(function() {
                certificate.style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>