@extends('admin.layouts.header')

@section('content')

     
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
			<br>
			ادارة الجرد:<a href="#" class="btn btn-success">تحميل ملف</a>
			<br><br>

<br>
<div class="panel panel-default">
  <div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>#</th>
        <th>الباركود </th>
		<th>اسم الصنف ar</th>
    <th>اسم الصنف en</th>
		<th>الكمية</th>
		<th>كمية فعلية</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $index=>$product)
      <tr>
        <td>{{$index+1}}</td>
        <td>{{$product->product->barcode}}</td>
    		<td>{{$product->name_ar}}</td>
        <td>{{$product->name_en}}</td>
    		<td>
        @if(isset($product->product))
        {{$product->product->total_quantity}}
        @else
          0
        @endif
        </td>
    		<td></td>

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

    