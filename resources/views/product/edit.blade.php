@extends("layouts.master")

@section('title') Bikeshop | แก้ไขข้อมูลสินค้า@stop

@section('content')
<div class="container">
    <h1>แก้ไขข้อมูลสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('product')}}">หน้าแรก</a></li>
        <li class="active">แก้ไขข้อมูลสินค้า</li>
    </ul>
{!! Form::model($product, array('action' =>'ProductController@update','method' =>'post','enctype' =>'multipart/form-data')) !!}
<input type="hidden" name="id" value="{{ $product->id}}">

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)<div>{{ $error}}</div>@endforeach
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #1ef218;">
            <div class="panel-title">
                <strong>ข้อมูลสินค้า</strong>
            </div>
        </div>
        <div class="panel-body">
                <table>
                        @if($product->image_url)
                        <tr>
                                <td>รูปสินค้า</td>
                                <td><img src="{{ URL::to($product->image_url)}}" alt="" width="100px"></td>
                        </tr>
                        @endif
                        <tr>
                            <td>{{ Form:: label('code','รหัสสินค้า')}}</td>
                            <td>{{ Form::text('code', Input::old('code'), ['class' =>'form-control'])}}</td>
                        </tr>
                        <tr>
                                <td>{{ Form:: label('name','ชื่อสินค้า')}}</td>
                                <td>{{ Form::text('name', Input::old('name'), ['class' =>'form-control'])}}</td>
                        </tr>
                        <tr>
                                <td>{{ Form:: label('category_id','ประเภทสินค้า')}}</td>
                                <td>{{ Form::select('category_id',$categories,Input::old('category_id'),['class' =>'form-control'])}}</td>
                        </tr>
                        <tr>
                                <td>{{ Form:: label('stock_qty','คงเหลือ')}}</td>
                                <td>{{ Form::text('stock_qty', Input::old('stock_qty'), ['class' =>'form-control'])}}</td>
                        </tr>
                        <tr>
                                <td>{{ Form:: label('price','ราคาขายต่อหน่วย')}}</td>
                                <td>{{ Form::text('price', Input::old('price'), ['class' =>'form-control'])}}</td>
                        </tr>
                        <tr>
                                <td>{{ Form:: label('img','เลือกรูปภาพสินค้า')}}</td>
                                <td>{{ Form::file('image')}}</td>
                        </tr>
                    </table>
        </div>
        <div class="panel-footer">
                <p  >
                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                </p>
        </div>
    </div>
{!! Form::close() !!}

</div>
@endsection
