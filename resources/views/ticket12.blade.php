

<html>
<head>Ticket - TEST
</head>
<body>
  <img src="{{ url('/assets/img/logo-minsante.png') }}" width="80px">

<div style="text-align:right;">
        <b>Delivre par :</b> 3MS-PAY
    </div>
    <div style="text-align: left;border-top:1px solid #000;">
        <div style="font-size: 24px;color: #1E792C;">TICKET DE PAYEMENT</div>
    </div>
<table style="line-height: 1.5;">
    <tr><td><b>Reference:</b> {{ $ticket->reference }}
        </td>
        <td style="text-align:right;"><b>Patient:</b></td>
    </tr>
    <tr>
        <td><b>Date:</b> 12/03/2022</td>
        <td style="text-align:right;">{{$user->firstname}}</td>
    </tr>
    <tr>
        <td><b>Date Payement :</b>12/03/2022
        </td>
        <td style="text-align:right;">HELLO</td>
    </tr>
<tr>
<td></td>
<td style="text-align:right;">Camerounais</td>
</tr>
</table>

<div></div>
    <div style="border-bottom:1px solid #000;">
        <table style="line-height: 2;">
            <tr style="font-weight: bold;border:1px solid #000000;background-color:#1E792C;">
                <td style="border:1px solid #000000;width:150px;">Description</td>
                <td style = "text-align:right;border:1px solid #000000;">Montant (XAF)</td>
            </tr>

    <tr> <td style="border:1px solid #000000;">Paiement des dorits de test</td>
                    <td style = "text-align:right; border:1px solid #000000;"> 30000 </td>
               </tr>

<tr style = "font-weight: bold;">
    
    <td style = "text-align:right;">Total (XAF)</td>
    <td style = "text-align:right;"> 30.000 </td>
</tr>
</table></div>
<table style="line-height: 1.2;">
    <tr>
        <td>
        <p><u>Information sur le payement</u>:<br/>
        Moyen: Orange-Money<br/>
        N° trans: 6346543634563423<br/>
        N° tel: 23141434<br/>
        </p>
        </td>
            <td style="text-align:right;">
            <p> <img src="qrcode/ ?>" width="90px" >
            </p>
            </td>
    </tr>
</table>
<p> <i style="color: #D0312D;">NB : Toute reproduction de ce document est considere comme fraude.</i></p>
</body>
</html>