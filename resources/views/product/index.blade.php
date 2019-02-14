@extends("layouts.master")

@section('title') BikeShop | รายการสินค้า@stop

@section('content')
<div class="container">
        <h1>รายการสินค้า</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>
                        รายการ
                    </strong>
                </div>
            </div>
                <div class="panel-body">
                <form action="{{ URL :: to('product/search')}}" method="post" class="form-inline">
                    {{ csrf_field()}}
                <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา" value="{{ Input::get('q')}}">
                         <button type="submit" class="btn btn-primary">ค้นหา</button>
                         <a href="{{ URL::to('product/edit')}}" class="btn btn-success pull-right">เพื่มสินค้า</a>
                </form>
               
                </div>
           
    <table class="table table-bordered bs-table">
        <thead>
            <tr>
                <th>รุปสินค้า</th>
                <th>รหัส</th>
                <th>ชื่อสินค้า</th>
                <th>ประเภท</th>
                <th>คงเหลือ</th>
                <th>ราคาต่อหน่วย</th>
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
            <td class="text-center"><img src="{{ asset($p->image_url)  }}" width="100px"></td>
            <td>{{ $p->code}}</td>
            <td>{{ $p->name}}</td>
            <td>{{ $p->category->name}}</td>
            <td class="bs-price">{{ number_format($p->stock_qty,0)}}</td>
            <td class="bs-price">{{ number_format($p->price,2)}}</td>
            <td class="bs-center">
            <a href="{{ URL::to('product/edit/'.$p->id)}}" class="btn btn-info"><i class="fa fa-edit"> แก้ไข</i></a>
                <a href="#" class="btn btn-danger btn-delete" id-delete="{{$p->id}}"><i class="fa fa-trash"> ลบ</i></a>
            </td>
            </tr>
            @endforeach
            <script>
                $('.btn-delete').on('click',function(){
                   
                    if(confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")){
                        var url = "{{ URL::to('product/remove')}}"
                        +'/'+$(this).attr('id-delete');
                        window.location.href = url;
                    }
                });
            </script>
        </tbody>
        <tfoot>
                <tr>
                    <th colspan="4"><center>รวม</center>
                    </th>
                <th class="bs-price">{{ number_format($products->sum('stock_qty'),0)}}</th>
                <th class="bs-price">{{ number_format($products->sum('price'),2)}}</th>
                <th></th>
                </tr>
            </tfoot>
    </table>
    <div class="panel panel-default">
        <div class="panel-footer">
        <span>แสดงข้อมูลจำนวน {{ count($products)}} รายการ</span>
        </div>

    </div>
    <div class="container">
       <center> {{ $products->links() }}</center>

    </div>

</div>
</div>
@endsection