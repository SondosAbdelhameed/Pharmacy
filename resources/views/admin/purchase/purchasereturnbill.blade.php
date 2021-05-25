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
        <th>رقم الإرجاع</th>
        <th>تاريخ الإرجاع</th>
    		<th>رقم فاتورة المشتريات</th>
    		<th>المورد</th>
    		<th>أنشئ بواسطة</th>
    		<th>اجمالي المبلغ</th>
    		<th>مبلغ الارجاع</th>
        <th>الحالة</th>
    		<th>الاجراءات</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($return_bill as $index=>$value)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$value->return_number}}</td>
        <td>{{$value->created_at}}</td>
    		<td>{{$value->bill->bill_number}}</td>
    		<td>{{$value->bill->supplier->name}}</td>
    		<td>{{$value->user->name}}</td>
    		<td>{{$value->bill->total_final}}</td>
        <td>{{$value->total_amount}}</td>
        @if($value->isClosed == 0)
          <td>غير مغلق</td>
        @else
          <td>مغلق</td>
        @endif

        <td><a href="{{url('purchasereturnbilldetail')}}/{{$value->id}}" class="btn btn-info">
            <i class="fa fa-eye" aria-hidden="true"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
  </div>
  </div>
            </div>
        </div>


    @endsection

    