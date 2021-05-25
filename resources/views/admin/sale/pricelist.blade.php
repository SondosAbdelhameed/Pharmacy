@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			عروض الاسعار: <button type="button" class="btn btn-success">إنشاء عرض جديد</button>
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>اجمالي عدد العروض</b> <span style="color:green;font-size:16px;">3</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي مبلغ العروض</b> <span style="color:green;font-size:16px;">500</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي العروض الفعالة</b> <span style="color:green;font-size:16px;">2</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي العروض المنتهية</b> <span style="color:green;font-size:16px;">1</span>
			</div>
			</div>
<br>
<div class="panel panel-default">
  <div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>رقم الفاتورة</th>
        <th>تاريخ الانشاء</th>
		<th>تاريخ الانتهاء</th>
		<th>أنشئ بواسطة</th>
		<th>اجمالي المبلغ</th>
		<th>موجه الي</th>
		<th>الحالة</th>
		<th>الاجراءات</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>24124124</td>
        <td>12/11/2020</td>
		<td>12/11/2020</td>
		<td>اشرف شبل</td>
		 <td>1000</td>
        <td>العميل 1</td>
		 <td>تمت الموافقة</td>
        <td>-</td>
      </tr>
    </tbody>
  </table>
   </div>
  </div>
  </div>
            </div>
        </div>


    @endsection

    