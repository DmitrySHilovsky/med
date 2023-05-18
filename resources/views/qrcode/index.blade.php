
<!DOCTYPE html>
<html>
<head>
    <title>QRcode</title>
    <!-- Add Material Design Library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <style>
        .qrcode {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .qrcode__title {
            margin-top: 2px;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase; 
        }
        .qrcode__title:first-child {
            margin-top: 16px;
        }
        
    </style>
    <style type="text/css" media="print">
        /* стили для печати */
         @page {
         size: auto;   /* автоматический размер страницы */
         margin: 0;  /* без полей */
         }

         /* Скрыть элементы, которые не нужны при печати */
        .no-print {
         display: none;
        }
                .qrcode {
            border: none;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .qrcode__title {
            margin-top: 2px;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase; 
        }
        .qrcode__title:first-child {
            margin-top: 16px;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <main class="mdl-layout__content">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col no-print">
                <a href="/users" class="mdl-button mdl-js-button mdl-button--raised">вернуться</a>
                <button class="mdl-button mdl-js-button mdl-button--raised" onclick="window.print()">Печать</button>
            </div>              
            <div class="mdl-cell mdl-cell--2-col">
                <div class="qrcode" id="qr-container">
                    <div>
                        {{ $qrCode }}
                    </div>
                    <div>
                         <div class="qrcode__title">{{ $userName["Lastname"] }}</div>
                        <div class="qrcode__title">{{ $userName["Name"] }}</div>
                        <div class="qrcode__title">{{ $userName["Surename"] }}</div>
                    </div>
                </div>
            </div>
        </div>  
    </main>
</div>

</body>

</html>
