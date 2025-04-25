<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biglietto Evento - {{ $event->title }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .ticket-container {
            width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .ticket-header {
            background-color: #0056b3;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        
        .ticket-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .ticket-subtitle {
            font-size: 16px;
            opacity: 0.8;
        }
        
        .ticket-logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 60px;
            height: auto;
        }
        
        .ticket-body {
            padding: 30px;
            position: relative;
        }
        
        .ticket-event-title {
            font-size: 28px;
            color: #0056b3;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
        
        .ticket-info {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        .ticket-info-item {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }
        
        .ticket-info-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .ticket-info-value {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
        
        .ticket-attendee {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        
        .ticket-attendee-title {
            font-size: 18px;
            color: #0056b3;
            margin-bottom: 15px;
            font-weight: bold;
        }
        
        .ticket-qr {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .ticket-qr img {
            width: 150px;
            height: 150px;
        }
        
        .ticket-qr-text {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }
        
        .ticket-footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
            border-top: 1px dashed #ddd;
        }
        
        .ticket-note {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        .ticket-id {
            font-size: 12px;
            color: #999;
            text-align: right;
            margin-top: 20px;
        }
        
        .ticket-barcode {
            text-align: center;
            margin: 20px 0;
        }
        
        .ticket-barcode img {
            max-width: 80%;
            height: 50px;
        }
        
        .ticket-divider {
            border-top: 2px dashed #ddd;
            margin: 30px 0;
            position: relative;
        }
        
        .ticket-divider::before,
        .ticket-divider::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #f5f5f5;
            border-radius: 50%;
            top: -10px;
        }
        
        .ticket-divider::before {
            left: -10px;
        }
        
        .ticket-divider::after {
            right: -10px;
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
        
        @media print {
            body {
                background-color: #fff;
            }
            
            .ticket-container {
                margin: 0;
                width: 100%;
                box-shadow: none;
            }
            
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">Stampa Biglietto</button>
    
    <div class="ticket-container">
        <div class="ticket-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="ticket-logo">
            <div class="ticket-title">BIGLIETTO DI INGRESSO</div>
            <div class="ticket-subtitle">{{ config('app.company_name') }}</div>
        </div>
        
        <div class="ticket-body">
            <div class="ticket-event-title">{{ $event->title }}</div>
            
            <div class="ticket-info">
                <div class="ticket-info-item">
                    <div class="ticket-info-label">Data</div>
                    <div class="ticket-info-value">{{ $event->start_date->format('d/m/Y') }}</div>
                </div>
                
                <div class="ticket-info-item">
                    <div class="ticket-info-label">Orario</div>
                    <div class="ticket-info-value">{{ $event->start_date->format('H:i') }} - {{ $event->end_date->format('H:i') }}</div>
                </div>
                
                <div class="ticket-info-item">
                    <div class="ticket-info-label">Luogo</div>
                    <div class="ticket-info-value">{{ $event->location }}</div>
                </div>
                
                <div class="ticket-info-item">
                    <div class="ticket-info-label">Tipo</div>
                    <div class="ticket-info-value">{{ ucfirst($event->type) }}</div>
                </div>
            </div>
            
            <div class="ticket-attendee">
                <div class="ticket-attendee-title">Partecipante</div>
                <div class="ticket-info">
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Nome</div>
                        <div class="ticket-info-value">{{ $user->name }}</div>
                    </div>
                    
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Email</div>
                        <div class="ticket-info-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Stato</div>
                        <div class="ticket-info-value">Confermato</div>
                    </div>
                </div>
            </div>
            
            <div class="ticket-qr">
                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
                <div class="ticket-qr-text">Scansiona questo codice QR all'ingresso dell'evento</div>
            </div>
            
            <div class="ticket-divider"></div>
            
            <div class="ticket-barcode">
                <img src="data:image/png;base64,{{ $barcode }}" alt="Barcode">
            </div>
            
            <div class="ticket-note">
                <strong>Note importanti:</strong>
                <ul>
                    <li>Si prega di arrivare almeno 15 minuti prima dell'inizio dell'evento.</li>
                    <li>Questo biglietto è personale e non trasferibile.</li>
                    <li>Porta con te un documento d'identità per la verifica.</li>
                </ul>
            </div>
            
            <div class="ticket-id">ID Biglietto: {{ $ticketId }}</div>
        </div>
        
        <div class="ticket-footer">
            Per qualsiasi informazione o assistenza, contatta {{ config('app.support_email') }} o chiama {{ config('app.support_phone') }}
        </div>
    </div>
</body>
</html>