<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>By Poly Isolation Systems</title>

    <style>
        h5 {
            font-size: 12px;
        }
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid rgba(231, 70, 30, 0.22);
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        table#t01 tr:nth-child(even) {
            background-color: #eee;
        }
        table#t01 tr:nth-child(odd) {
            background-color: #fff;
        }
        table#t01 th {
            background-color: #e7461e;
            color: white;
        }
        * {
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float:left;
            width: 33.33%;
            padding: 8px;
            height: 100px; /* Should be removed. Only for demonstration */
        }
        .column2 {
            float:left ;
            width: 50%;
            padding: 5px;
            height: 150px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        #header{
            top: 0;
            left: 0;
            height: auto;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        #footer{
            bottom:150px;
            position:fixed;
        }
    </style>
</head>
<body>
<div id="header">
    @if($data['para_birimi']=='€')
    @php($data['para_birimi']="&euro;")
    @endif
      <img src="{{$_SERVER["DOCUMENT_ROOT"].'/uploads/teklifbaslik.png'}}" width="100%" style="border-bottom:1px solid black;"/>
</div>
<div class="row">
    <div class="column" >
        <h5>Firma:&nbsp;{{ $data['yetkili_firma'] }}</h5>
        <h5>Yetkili:&nbsp;{{ $data['yetkili_ad'] }}</h5>
    </div>
    <div class="column" style="padding-left: 45px;">
        <h5>İletişim:&nbsp;{{ $data['yetkili_tel'] }}</h5>
        <h5>Ödeme Tipi:&nbsp;{{ $data['odeme_tipi'] }}</h5>
    </div>
    <div class="column">
        <h5>Tarih:&nbsp;{{ $data['created_at'] }}</h5>
        <h5>Teklif No:&nbsp;2019/00{{ $data['id'] }}</h5>
    </div>
</div>
<table style="width:100%" id="t01">
    <tr>
        <th>&nbsp;</th>
        <th>Ürün / Hizmet</th>
        <th>Miktar</th>
        <th>Birim Fiyatı</th>
        <th>Toplam</th>
    </tr>
    @foreach($data['urunler'] as $key=>$item)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{  $item['urun_ad']  }}</td>
        <td>{{  $item['miktar']  }}&nbsp;&nbsp;{{  $item['tip']  }}</td>
        <td>{{  $item['birim_fiyat']  }}&nbsp;{!!  $data['para_birimi']  !!}</td>
        <td>{{  $item['toplam']  }}&nbsp;{!!  $data['para_birimi']  !!}</td>
    </tr>
    @endforeach
</table>
<div class="row">
    <div class="column2">
        <h5>Sipariş Alan / Teklif Veren</h5>
        <h5>Barış DOĞRUER</h5>
    </div>

    <div class="column2" style="text-align: center">
        @php($toplamfiyat=0.00)
        @foreach($data['urunler'] as $item)
            @php($toplamfiyat+=(float)$item['toplam'])
        @endforeach
        <h5>TOPLAM:&nbsp;{{ $toplamfiyat }}&nbsp;{!!  $data['para_birimi']  !!}</h5>
        <h5>KDV(%18):&nbsp;{{ $toplamfiyat*(18/100) }}&nbsp;{!!  $data['para_birimi']  !!}</h5>
        <h4 style="color:white;background-color: #e7461e;padding:10px;">GENEL TOPLAM:&nbsp;{{ ($toplamfiyat)+($toplamfiyat*(18/100)) }}&nbsp;{!!  $data['para_birimi']  !!}</h4>
    </div>
</div>
<div class="row" id="footer">
    <ul>
        <li>Teklif formundaki m2/kg ölçüleri degişkenlik gösterebilir. İş tesliminde tekrar ölçümlendirilecektir.</li>
        <li>Döviz kurunda verilen tekliflerde, fatura kesim tarihi geçerlidir.</li>
        <li>Son ödeme tarihinde ödenmeyen faturalara kur farkı uygulanır.</li>
        <li>Bu teklif 30 gün geçerlidir</li>
    </ul>
</div>

</body>
</html>
