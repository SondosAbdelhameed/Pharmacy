
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
th,td{
  font-size:11px;
  text-align:center;
}

.detail td{
  border:1px solid gray;
}
body {
    margin: 0;
    padding: 0;
}

@page {
    size: A4;
    margin: 0;
}

@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}

</style>
</head>

    <body onload="window.print()">
      <div class="page">
      <center>
        <div id="elem" style="text-align:center;width:250px;height:auto;font-size:12px;">
        <img class="main-logo" src="{{url('img/Logo.png')}}" alt="" width="200px"><br>
        <span style="font-size:12px;">صيدليات الزئبق للادوية</span>
        <br>
          <table class="detail" width="100%">
          <tr>
            <td>رقم</td>
            <td>{{$bill->bill_number}}</td>
            <td>وقت</td>
            <td>{{$bill->created_at}}</td>
          </tr>
          <tr>
            <td>موظف</td>
            <td>{{$bill->user_id}}</td>
            <td>عميل</td>
            <td>{{$bill->customer->name}}</td>
          </tr>
          </table>
    
          <hr>
          <table>
            <tr>
            <th style="width:200px;">الصنف</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>اجمالي</th>
            </tr>
            @foreach($bill->bill_items as $item)
            <tr>
              <td>{{$item->item->name}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->total_price}}</td>
            </tr>
            @endforeach
           {{--<tr>
              <td>كولجيت فرشاة اسنان سوفت ناعمة زيجزاج  </td>
              <td>{{$item->price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->total_price}}</td>
            </tr>
            <tr>
              <td>بارودونتكس معجون اسنان نظافه فائقة 75 مل</td>
              <td>{{$item->price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->total_price}}</td>
            </tr>
            <tr>
              <td>ناو زيت عطري 30مل زيت الليمون الاخضر</td>
              <td>{{$item->price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->total_price}}</td>
            </tr>--}}
          </table>
          <hr>
          <span style="float:left;">{{$bill->total_discount}} ر.س</span><span style="float:right;">الخصم</span>
          <br>
          <span style="float:left;">{{$bill->total_before_tax}} ر.س</span><span style="float:right;">اجمالي فرعي</span>
          <br>
          <span style="float:left;">{{$bill->total_tax}} ر.س</span><span style="float:right;">الضريبة</span>
          <br>
          <span style="float:left;">{{$bill->total_final}} ر.س</span><span style="float:right;">الاجمالي</span>
          <br>
           <span style="float:left;">{{$bill->paid_amount}} ر.س</span><span style="float:right;">المدفوع</span>
          <br>
           <span style="float:left;">{{$bill->remaining_amount}} ر.س</span><span style="float:right;">المتبقي</span>
          <br>
          <br>
          <span>رقم الضريبي: 75757687678</span>
          <br>
          <span>055889798789 - 05513289787</span>
          <br>
          <span>المملكة العربية السعودية</span>
          <br>
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($bill->bill_number, 'C39','2','30')}}" alt="barcode" />
      </div>
        </center>
        </div>
</body>


  

    
