<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Input,Config,Validator;
use App\Category;
class ProductController extends Controller
{
     var $rp = 2;
     public function __construct(){
         $this->rp = Config::get('app.result_per_page');
     }
    public function search(){
        $query = Input::get('q');
        if($query){
            $products = Product::where('code','like','%'.$query.'%')
            ->orwhere('name','like','%'.$query.'%')
            ->paginate($this->rp);
        } else {
            $products = Product::paginate($this->rp);
        }
        return view('product/index', compact('products'));
    }
    public function index(){
        $products = Product::paginate($this->rp);
        return view('product/index',compact('products'));
    } 
    public function edit($id = null){
        //
        $categories = Category::pluck('name','id')->prepend('เลือกรายการ','');
        if($id){
            $product = Product::where('id',$id)->first();
            return view('product/edit')
            ->with('product', $product)
            ->with('categories' , $categories);
        }
        else{
            return view('product/add')->with('categories',$categories);
        }
    }
    public function update(){
        $rules = array(
            'code' => 'required',
            'name' => 'required',
            'category_id' => 'required|numeric',
            'price' => 'numeric',
            'stock_qty' => 'numeric',
        );
        $messages = array(
            'required' =>'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            'numeric'  =>'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
        );
        $id = Input::get('id');
        $validator = Validator::make(Input::all(),$rules,$messages);

        $product = Product::find($id);
        $product->code = Input::get('code');
        $product->name = Input::get('name');
        $product->category_id = Input::get('category_id');
        $product->price = Input::get('price');
        $product->stock_qty = Input::get('stock_qty');
        $product->save();
        if(Input::hasFile('image')){
            $f = Input::file('image');
            $upload_to = 'upload/image';
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;        
            
            $f->move($absolute_path, $f->getClientOriginalName());

            $product->image_url=$relative_path;
            $product->save();
        }

        if($validator->fails()){
            return redirect('product/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        return redirect('product')
        ->with('OK',true)
        ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert(){

        $product = new Product();
        $product->code = Input::get('code');
        $product->name = Input::get('name');
        $product->category_id = Input::get('category_id');
        $product->price = Input::get('price');
        $product->stock_qty = Input::get('stock_qty');
        $product->save();

        if(Input::hasFile('image')){
            $f = Input::file('image');
            $upload_to = 'upload/image';
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;        
            
            $f->move($absolute_path, $f->getClientOriginalName());

            $product->image_url=$relative_path;
            $product->save();
        }
        return redirect('product')
        ->with('OK',true)
        ->with('msg','เพิ่มข้อมูลเรียบร้อยแล้ว');
    }
    public function remove($id){

            Product::find($id)->delete();

            return redirect('product')
            ->with('OK',true)
            ->with('msg','ลบข้อมูลสำเร็จ');
    }
}
