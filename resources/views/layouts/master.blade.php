<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "BikeShop | จำหน่ายอะไหล่จักรย่นออนไลน์")</title>
<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
</head>
<body>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<nav class="navbar navbar-default">
    <div class="container ">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">BikeShop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="">หน้าแรก</a></li>
                <li><a href="{{ URL::to('product')}}">ข้อมูลสินค้า</a></li>
                <li><a href="">รายงาน</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield("content")

@if(session('msg'))
    @if(session('OK'))
    <script>toastr.success("{{ session('msg')}}")</script>
    @else
    <script>toastr.error("{{ session('msg')}}")</script>
    @endif
@endif
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
{{-- <div class="container">
    <div class="panel panel-default panel-info">
         <div class="panel-heading">
             <strong>หัวข้อ</strong>
         </div>
         <div class="panel-body">
            เนื้อหา
         </div>
    </div>
    
    <table class="table table-striped table-bordered">
        <thead >
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาขาย</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>p001</th>
                <th>เสือหมอบ JAVA</th>
                <th>11900.00</th>
            </tr>
            <tr>
                    <th>p002</th>
                    <th>เสือหมอบวินเทจ Cannello Silvia</th>
                    <th>5000.00</th>
            </tr>
            <tr>
                        <th>p003</th>
                        <th>เสือหมอบ Panther March</th>
                        <th>6500.00</th>
            </tr>
        </tbody>
    </table>

    <div class="row">
            <a href=""><button class="btn btn-default btn-lg">default</button></a>
      
        <a href=""><button class="btn btn-success btn-lg">success</button></a>
       
                <a href=""><button class="btn btn-info btn-lg">info</button></a>
       
                <a href=""><button class="btn btn-danger btn-lg">danger</button></a>
      
                <a href=""><button class="btn btn-primary btn-lg">primary</button></a>
        
                <a href=""><button class="btn btn-warning btn-lg">warning</button></a>
  
    </div>

   <p>
        <div class="form-group">
                <label for="">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control">
           </div>
           <div class="form-group">
                <label for="">ที่อยู่</label>
              <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
           </div>
           <div class="form-group">
               <button class="btn btn-success">เพิ่มข้อมูล</button>
           </div>
   </p>
   <p>
        <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> Better check yourself, you're not looking too good.
              </div>
   </p>
   <p>
        <i class="fa fa-home" style="font-size: 48px;"></i>
   </p>
</div> --}}
{{-- <div class="container">
   <div class="row">
    <div class="col-cm-10 col-md-offset-1 ">
        <h1>
        <center>
                เนื้อหาเว็บไซต์
        </center>    
        </h1> 
    </div>
   </div>
</div> --}}
</body>
</html>
