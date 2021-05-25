@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			{{ __('supplier.supp_list') }}: <a href="{{url('addsupplier')}}" class="btn btn-success">{{ __('supplier.add_supp') }}</a>
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>{{ __('supplier.supp_count') }}</b> <span style="color:green;font-size:16px;">{{count($suppliers)}}</span>
			</div>
			<div class="col-md-3">
			<b>{{ __('supplier.total_buy') }}</b> <span style="color:green;font-size:16px;">500</span>
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
        <th>{{ __('supplier.supp_account_num') }}</th>
        <th>{{ __('supplier.supp_name') }}</th>
    		<th>{{ __('supplier.created_by') }}</th>
    		<th>{{ __('supplier.created_at') }}</th>
    		<th>{{ __('supplier.supp_type') }}</th>
    		<th>{{ __('supplier.bill_count') }}</th>
    		<th>{{ __('supplier.total_amount') }}</th>
    		<th>{{ __('supplier.total_supp_pay') }}</th>
    		<th>{{ __('supplier.total_supp_remaind') }}</th>
    		<th>{{ __('supplier.status') }}</th>
    		<th>{{ __('supplier.settings') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $index=>$supplier)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$supplier->tree->id_code}}</td>
		<td>{{$supplier->name}}</td>
        <td>{{$supplier->user->name}}</td>
        <td>{{$supplier->created_at}}</td>
        @if($supplier->type == 0)
		  <td>{{ __('supplier.cash') }}</td>
        @else
            <td>{{ __('supplier.postponed') }}</td>
        @endif
		<td>20</td>
		<td>100</td>
        <td>100</td>
        <td>0</td>
		<td>{{$supplier->activation->activation}}</td>
        <td><a href="{{url('supplierdetail')}}/{{$supplier->id}}" class="btn btn-info">
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

    