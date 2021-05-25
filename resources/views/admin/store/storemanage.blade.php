@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			ادارة المستودعات:<a href="{{url('addstore')}}" class="btn btn-success">اضافة مستودع</a>
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>اجمالي عدد المخازن</b> <span style="color:green;font-size:16px;">{{count($stores)}}</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي عدد الاصناف </b> <span style="color:green;font-size:16px;">500</span>
			</div>
			<div class="col-md-3">
			<b>اجمالي تكلفة المنتجات  </b> <span style="color:green;font-size:16px;">500</span>
			</div>
			</div>
<br>
<div class="panel panel-default">
  <div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>#</th>
        <th>رقم المخزن </th>
		<th>اسم المخزن</th>
		<th>العنوان </th>
		<th>تاريخ الاضافة</th>
		<th>عدد الاصناف</th>
		<th>التكلفة </th>
		<th>المستخدم </th>
		<th>الاجراءات</th>
      </tr>
    </thead>
    <tbody>
        @foreach($stores as $index=>$store)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$store->store_code}}</td>
		<td>{{$store->store_name}}</td>
        <td>{{$store->address}}</td>
		<td>{{$store->created_at}}</td>
		<td>اجل</td>
		<td>500</td>
		<td>500</td>
        <td>
            <a href="{{url('storedetail')}}/{{$store->id}}" class="btn btn-info">
            <i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
            </div>
        </div>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

    @endsection

    