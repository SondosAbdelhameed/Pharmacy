@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			{{ __('insurance.insur_comp') }}: <a href="{{url('addinsurancecompany')}}" type="button" class="btn btn-info">{{ __('insurance.add_comp') }}</a>
			<br><br>
			<div class="row">
			<div class="col-md-3">
			<b>{{ __('insurance.comp_count') }}</b> <span style="color:green;font-size:16px;">{{count($companies)}}</span>
			</div>
			<div class="col-md-3">
			<b>{{ __('insurance.total_bill_count') }}</b> <span style="color:green;font-size:16px;">5</span>
			</div>
            <div class="col-md-3">
            <b>{{ __('insurance.total_bill_cost') }}</b> <span style="color:green;font-size:16px;">500</span>
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
        <th>{{ __('insurance.comp_account_num') }}</th>
    		<th>{{ __('insurance.comp_name') }}</th>
    		<th>{{ __('insurance.created_at') }}</th>
    		<th>{{ __('insurance.bill_count') }}</th>
    		<th>{{ __('insurance.cost') }}</th>
    		<th>{{ __('insurance.settings') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($companies as $index=>$company)
      <tr>
        <td>{{$index+1}}</td>
        <td>24124124</td>
		<td>{{$company->company_name}}</td>
        <td>{{$company->created_at}}</td>
		<td>10</td>
		<td>500</td>
        <td>
        <a href="{{url('insurancecompanydetail')}}/{{$company->id}}" class="btn btn-info">
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

    