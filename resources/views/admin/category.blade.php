<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <title>Document</title>
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#f8f8f8;">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin">吴弓不箭</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/admin/article">日志</a></li>
          <li class="active"><a href="/admin/category">分类</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Java <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/logout">登出</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-md-offset-1 col-md-6 col-lg-offset-1 col-lg-6">
        <h4>目录分类</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="vertical-align:middle;">名称</th>
              <th style="vertical-align:middle;">类型</th>
              <th style="vertical-align:middle;">总数</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td style="vertical-align:middle;">
              @if ($category->depth == 1)
              &nbsp;&nbsp;&nbsp;
              @elseif ($category->depth == 2)
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              @else
              @endif
              {{$category->name}}
              </td>
              <td style="vertical-align:middle;">{{$category->type}}</td>
              <td style="vertical-align:middle;"></td>
              <td>
                @if ($category->name == "日志")
                @elseif  ($category->name == "分类")
                @else
                <button id="{{$category->slug}}" class="btn btn-default btn-sm" type="submit">编辑</button>
                <script>
                  $(document).ready(function(){
                    $("#{{$category->slug}}").click(function(){
                      // 发送ajax请求
                      // alert("{{$category->name}}");
                      $.get("/admin/category/get?id={{$category->id}}",
                       function(data){
                        // 回调函数
                        // alert(data["name"]+" "+
                        //       data["slug"]+" "+
                        //       data["path"]+" "+
                        //       data["parent_id"]+" "+
                        //       data["type"]);
                        $("#id").attr("value", data["id"]);
                        $("#name").attr("value", data["name"]);
                        $("#slug").attr("value", data["slug"]);
                        $("#father").val(data["id"]).attr("selected", true);
                        $("#type").val(data["type"]).attr("selected", true);
                      });
                      // headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    });
                  });
                </script>
                <form action="/admin/category/del" method="post" style="display:inline;">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$category->id}}">
                  <input class="btn btn-default btn-sm" type="submit" value="删除">
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-3">
        <h4>添加新目录分类</h4>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form role="form" action="/admin/category/new" method="post">
          {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
          {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="control-label">ID</label>
            <div class="">
              <input type="text" class="form-control" id="id" name="id" placeholder="请输入名字">
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="control-label">名称</label>
            <div class="">
              <input type="text" class="form-control" id="name" name="name" placeholder="请输入名字">
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="control-label">别名</label>
            <div class="">
              <input type="text" class="form-control" id="slug" name="slug" placeholder="请输入别名（需为字母或数字 ）">
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="control-label">父级分类目录</label>
            <div class="">
              <select class="form-control" id="father" name="father">
                <option value="0">未分类</option>
                @foreach($categories as $category)
                  @if ($category->type == "arch")
                    @if ($category->depth < 3)
                      <option value="{{$category->id}}">
                      @if ($category->depth == 1)
                      &nbsp;&nbsp;&nbsp;
                      @elseif ($category->depth == 2)
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      @else
                      @endif
                      {{$category->name}}</option>
                    @endif
                  @else
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="control-label">目录类型</label>
            <div class="">
              <select class="form-control" id="type" name="type">
                <option value="time">归档</option>
                <option value="arch">栏目</option>
                <option value="page">单页</option>
               </select>
            </div>
          </div>
          <div class="form-group">
            <div class="">
              <button type="submit" class="btn btn-default">提交</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
