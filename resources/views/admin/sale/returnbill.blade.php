@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			إرجاع الفواتير: <!--<button type="button" class="btn btn-success">إنشاء فاتورة</button>-->
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>اجمالي عدد الفواتير</b> <span style="color:green;font-size:16px;">3</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي مبلغ الفواتير</b> <span style="color:green;font-size:16px;">500</span>
			</div>
			<div class="col-md-3">
			<b> اجمالي المرتجع</b> <span style="color:green;font-size:16px;">300</span>
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
        <th>تاريخ الفاتورة</th>
		<th>رقم فاتورة المبيعات</th>
		<th>أنشئ بواسطة</th>
		<th>اجمالي المبلغ</th>
		<th>مبلغ الارجاع</th>
		<th>ارجاع بعد</th>
		<th>الحالة</th>
		<th>الاجراءات</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>24124124</td>
        <td>12/11/2020</td>
		<td>9765745454</td>
		<td>اشرف شبل</td>
		 <td>1000</td>
        <td>600</td>
        <td>نفس اليوم</td>
		 <td>مكتمل</td>
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

    