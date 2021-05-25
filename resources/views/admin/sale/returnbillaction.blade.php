@extends('admin.layouts.header')

@section('content')

<style type="text/css">
  input[type=date]{
    width:130px;
    font-size:10px;
  }
</style>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
     
<div class="analytics-sparkle-area">
  <div class="container-fluid">
  <br> <br>
<br><br>
  <div class="panel panel-default">
    <div class="panel-heading">تفاصيل الفاتورة رقم : {{$bill->bill_number}}</div>
    <div class="panel-body">

  <div class="row">

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">أنشيء بواسطة</label><br>
          <input type="text" class="form-control" value="{{$bill->user->name}}" disabled>
        </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">العميل</label><br>
          <input type="text" class="form-control" value="{{$bill->customer->name}}" disabled>
        </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="pwd">رقم حساب العميل</label>
          <input type="text" class="form-control" value="{{$bill->customer->tree->id_code}}" disabled>
        </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        <label for="email">نوع الفاتورة</label>
        @if($bill->customer->type == 0)
          <input type="text"  class="form-control" value="نقدي" disabled>
        @else
          <input type="text"  class="form-control" value="آجل" disabled>
          @endif
      </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="pwd">تاريخ الفاتورة</label>
          <input type="text" class="form-control" name="bill_date" value="{{$bill->bill_date}}" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">إجمالي الاصناف</label>
          <input type="number" class="form-control" value="{{count($bill->bill_items)}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email"> الإجمالي النهائي</label>
          <input type="number" step="0.001" class="form-control" value="{{$bill->total_final}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="pwd">تاريخ الاستحقاق</label>
          <input type="text" class="form-control" value="{{$bill->due_date}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="pwd">حالة الدفع</label>
          @if($bill->is_paid == 1)
            <input type="text" class="form-control" value="مكتمل الدفع" readonly>
          @else
            <input type="text" class="form-control" value="غير مكتمل الدفع" readonly>
          @endif
        </div>
    </div>

  </div>

 <form action="{{route('return_bill')}}" method="post">
  @csrf
<div class="row">

 <div class="col-sm-12">
<br><br>

  <input type="hidden" name="bill_id" value="{{$bill->id}}"/>
  <input type="hidden" name="cus_id" value="{{$bill->customer_id}}"/>
<div class="table-responsive">
    <table class="table table-bordered table-striped main" id="dynamicTable">  
      <tr>
        <th>اســـم المنتـــج</th>
        <th>تاريخ الإنتاج</th>
        <th>تاريخ الإنتهاء</th>
        <th>السعر</th>
          <!--<th>الوحدة</th>-->
        <th>الكمية</th>
        <th>الخصم</th>
        <th>قيمة الضريبة</th>
        <th>الاجمالي</th>
        <th>الإجراءات</th>
      </tr>
      @foreach($bill->bill_items as $index=>$item)
        @if($item->quantity > 0)
          <tr>  
            <td><input type="hidden" name="multi_product[]" value="{{$item->id}}"/>
              {{$item->item->name}}</td> 
            <td><input type="date" class="form-control" name="multi_production_date[]" required></td> 
            <td><input type="date" class="form-control" name="multi_expire_date[]" required></td>
            <td><input type="text" class="form-control" value="{{$item->price}}" id="price{{$index}}" disabled/></td> 
            <td><input type="number" class="form-control" name="multi_quantity[]" value="{{$item->quantity}}" id="quantity{{$index}}" onChange="check_quantity({{$index}})" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();"/></td>  
            <td><input type="number" class="form-control" value="{{$item->product_discount}}" disabled/></td> 
            <td><input type="text" id="tax{{$index}}" name="multi_tax[]" class="form-control" value="{{$item->tax_value}}"  readonly></td> 
            <td><input type="text" class="form-control" id="total{{$index}}" name="multi_total[]" value="{{$item->total_price}}" readonly /></td> 
            <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td>
          </tr> 
        @endif
      @endforeach 
    </table> 
  </div>
   
</div>

<div class="col-sm-4">
<span>الإجمالي قبل الضريبة</span><input type="text" class="form-control" id="total_before_tax" name="total_before_tax" value="{{$bill->total_before_tax}}" readonly>
</div>
<div class="col-sm-4">
<span>إجمالي الضريبة</span><input type="text" class="form-control" id="total_tax" name="total_tax" value="{{$bill->total_tax}}" readonly>
</div>
<div class="col-sm-4">
<span>إجمالي المبلغ المرتجع</span><input type="text" class="form-control" id="total_final" name="total_final" value="{{$bill->total_final}}" readonly>
</div>


</div>

<br><br>
<div class="row">

<div class="col-md-6">
<label for="email">النوع</label>
<div class="radio">
  <label><input type="radio" name="payment_status" id="pay_all" value="0" onclick="paid_amount_status(0)" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;الدفع كاملا</label>

  <label><input type="radio" name="payment_status" value="1" id="default_val_check" onclick="paid_amount_status(1)"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;الدفع لاحقاً</label>
  
  <label><input type="radio" name="payment_status" value="2" onclick="paid_amount_status(2)" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دفع جزء من المستحق</label>

</div>
</div>

<div class="col-md-3" style="display:none;" id="paid_amount_status">
  <label for="email">المبلغ المدفوع</label>
  <input type="number" step="0.001" value="0" name="paid_amount" id="paid_amount"  class="form-control" > 
</div>

<div class="col-md-3" id="pay_way">
    <div class="form-group">
      <label for="pwd">طريقة الدفع</label>
      <select class="form-control" name="pay_way">
        <option value="0">كاش</option>
        <option value="1">شبكة</option>
    </select>
    </div>
</div>

</div>

<br><br>
  
<button type="submit" class="btn btn-primary" id="save">حفظ</button>
<a href="{{url()->previous()}}" type="button" class="btn btn-danger" style="margin-top: 0px;">إلغاء</a>
 </form>
</div>
</div>

</div>

</div>

<script type="text/javascript">
  function paid_amount_status(k){
    if(k == 0){
      document.getElementById("paid_amount_status").style.display = "none";
      document.getElementById("pay_way").style.display = "block";
      document.getElementById("paid_amount").value = document.getElementById("total_final").value;
    }
    else if(k == 1){
      document.getElementById("paid_amount_status").style.display = "none";
      document.getElementById("pay_way").style.display = "none";
      document.getElementById("paid_amount").value = 0;
    }
    else if(k == 2){
      document.getElementById("paid_amount_status").style.display = "block";
      document.getElementById("pay_way").style.display = "block";
      document.getElementById("paid_amount").value = 0;
    }
  }
</script>

<script type="text/javascript">

  var pro = <?php echo  $bill->bill_items; ?>;
  $( document ).ready(function() {
    for (var i = 0; i < pro.length; i++) {
      if(pro[i].product_date.quantity > 0)
        check_quantity(i);
    }
  });

  $(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
    check_product();
    set_final_total();
         
  });

</script>

<script type="text/javascript">

  function check_product(){
    var x = document.getElementsByName("multi_product[]");
    if(x.length <= 0)
      document.getElementById("save").disabled = true;
  }

  function check_quantity(k){
    //console.log(document.getElementById("quantity"+k).value);
    //console.log(pro[k].quantity);
    if(document.getElementById("quantity"+k).value <= 0)
      document.getElementById("quantity"+k).value = 1;
    else if (document.getElementById("quantity"+k).value > pro[k].quantity)
      document.getElementById("quantity"+k).value = pro[k].quantity;

    set_total_amount(k);
    set_final_total();
   
  }

  function set_total_amount(k){
    var pq = parseFloat(document.getElementById("price"+k).value)*parseInt(document.getElementById("quantity"+k).value);
    var one_tax = pro[k].tax_value / pro[k].quantity;
    var tot_tax = parseInt(document.getElementById("quantity"+k).value)*one_tax;
    document.getElementById("tax"+k).value = tot_tax.toFixed(2);
    document.getElementById("total"+k).value = (tot_tax+pq).toFixed(2);

  }

  function set_final_total(){
    var x = document.getElementsByName("multi_total[]");
    var y = document.getElementsByName("multi_tax[]");
    var totx = 0 , toty = 0;
    for(var i = 0 ; i < x.length ; i++){
      totx +=  parseFloat(x[i].value);
      toty += parseFloat(y[i].value);
    }
    document.getElementById("total_final").value = totx.toFixed(2);
    if(document.getElementById("pay_all").checked)
      document.getElementById("paid_amount").value = totx.toFixed(2);
    document.getElementById("total_tax").value = toty.toFixed(2);
    document.getElementById("total_before_tax").value = (totx-toty).toFixed(2);

  }

</script>

    @endsection

    