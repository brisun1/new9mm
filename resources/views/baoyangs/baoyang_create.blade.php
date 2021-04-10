@extends('layouts.app')

@section('content')

<div class="container">
  <h4 class="text-center" >baoyang登记表</h4>
  <div class="jumbotron">
  <h5>主要资料</h5>
  <label>国家:{{$ucountry}}</label>
  <label>  &nbsp&nbsp &nbsp 用户名:{{$uname}}</label>
  {!!Form::open(['action' => 'BaoyangsController@store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
  
  <div class="form-group form-inline">
    {{Form::label('tel', '电话 :  ')}}
    {{Form::text('tel', '', ['class' => 'form-control', 'placeholder' => '电话'])}}
  </div>
  
  <div class="form-group form-inline ">
    {{Form::label('email', 'Email :  ')}}
    {{Form::text('email', '', ['class' => 'form-control ', 'placeholder' => 'Email'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('city', '城市 :  ')}}
    {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => '城市'])}}
  </div>
  
  <div class="form-group ">
      {{Form::label('topic', '包养标题 :')}}
      {{Form::text('topic', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => '包养标题'])}}
  </div>
  <div class="form-group ">
    {{Form::label('info', '内容信息 :')}}
    {{Form::textarea('info', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => '内容信息'])}}
  </div>

  <h5>个人详情</h5>
  <div class="form-group form-inline">
    {{Form::label('age', '年龄 :')}}
    {{Form::text('age', '', ['class' => 'form-control', 'placeholder' => '年龄'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('national', '来自国家或地区 :')}}
    {{Form::text('national', '', ['class' => 'form-control', 'placeholder' => '来自国家'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('look', '相貌 :')}}
    {{Form::text('look', '', ['class' => 'form-control', 'placeholder' => '相貌'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('shape', '身材 :')}}
    {{Form::text('shape', '', ['class' => 'form-control', 'placeholder' => '身材'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('height', '身高 :')}}
    {{Form::text('height', '', ['class' => 'form-control', 'placeholder' => '身高'])}}
  </div>
  <div class="form-group form-inline">
    {{Form::label('hobby', '喜好 :')}}
    {{Form::text('hobby', '', ['class' => 'form-control', 'placeholder' => '喜好'])}}
  </div>
  
  <div class="form-group form-inline">
    {{Form::label('price', '价格范围 ：')}}
    {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => '价格范围'])}}
  </div>
  
  <div class="form-group form-inline">
    {{Form::label('period', '计划包养时间：')}}
    {{Form::text('period', '', ['class' => 'form-control', 'placeholder' => '计划包养时间'])}}
  </div>
  
  
  

  

  <h5>上传图片</h5>
      <div class="input-group control-group increment" >
        <input type="file" name="filename[]" class="form-control">

        <div class="input-group-btn">
          <button id="add_file" class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>加载更多图片</button>
        </div>

      </div>
      <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="file" name="filename[]" class="form-control" multiple>
          <div class="input-group-btn">
            <button id="remove_file" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> 取消本图片</button>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" style="margin-top:10px">登记</button>

      {!! Form::close() !!}
  </div>

</div>

<script type="text/javascript">

  $(document).ready(function() {

    $("#add_file").click(function(){
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click","#remove_file",function(){

        $(this).parents(".control-group").remove();
    });

  });

</script>






<!--

<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
-->
@endsection

