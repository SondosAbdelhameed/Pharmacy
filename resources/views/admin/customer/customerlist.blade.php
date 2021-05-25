@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			{{ __('customer.cus_list') }}: <a href="{{url('addcustomer')}}" class="btn btn-success">{{ __('customer.add_cus') }}</a>
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>{{ __('customer.cus_count') }}</b> <span style="color:green;font-size:16px;">{{count($customers)}}</span>
			</div>
			<div class="col-md-3">
			<b>{{ __('customer.total_sale') }}</b> <span style="color:green;font-size:16px;">500</span>
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
        <th>{{ __('customer.cus_account_num') }}</th>
        <th>{{ __('customer.cus_name') }}</th>
		<th>{{ __('customer.created_by') }}</th>
		<th>{{ __('customer.created_at') }}</th>
		<th>{{ __('customer.cus_type') }}</th>
		<th>{{ __('customer.bill_count') }}</th>
		<th>{{ __('customer.total_amount') }}</th>
		<th>{{ __('customer.total_cus_pay') }}</th>
		<th>{{ __('customer.total_cus_remaind') }}</th>
		<th>{{ __('customer.status') }}</th>
		<th>{{ __('customer.settings') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($customers as $index=>$customer)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$customer->tree->id_code}}</td>
        <td>{{$customer->name}}</td>
		<td>{{$customer->user->name}}</td>
        <td>{{$customer->created_at}}</td>
        @if($customer->type == 0)
		<td>{{ __('customer.individual') }}</td>
        @else
        <td>{{ __('customer.company') }}</td>
        @endif
		<td>20</td>
		<td>100</td>
        <td>100</td>
        <td>0</td>
		<td>{{$customer->activation->activation}}</td>
        <td>
            <a href="{{url('customerdetail')}}/{{$customer->id}}" class="btn btn-info">
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

    @endsection

    