<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
            <li class="active"><a href="/admin/article">文章</a></li>
            <li><a href="/admin/category">分类</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Java <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/logout">登出</a></li>
                    <!-- <li><a href="#">jmeter</a></li>
                    <li><a href="#">EJB</a></li>
                    <li><a href="#">Jasper Report</a></li>
                    <li class="divider"></li>
                    <li><a href="#">分离的链接</a></li>
                    <li class="divider"></li>
                    <li><a href="#">另一个分离的链接</a></li> -->
                </ul>
            </li>
        </ul>
    </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="hidden-xs col-sm-2 col-md-offset-1 col-md-1 col-lg-offset-1 col-lg-1">
        <h4>文章</h4>
      </div>
      <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
        <a href="/admin/article/new" type="button" class="btn btn-default">写文章</a>
      </div>
      <div class="col-xs-9 col-sm-6 col-md-5 col-lg-4">
        <form class="form-inline pull-right" role="search">
          <div class="form-group">
              <input type="text" class="form-control" style="width:120px;display:inline;" placeholder="Search">
              <button type="submit" class="btn btn-default">提交</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-offset-1 col-md-10 col-offset-1 col-lg-9">
      	<table class="table table-bordered">
      	  <thead>
            <tr>
      		    <th>标题</th>
              <th>分类</th>
              <th>日期</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($articles as $article)
            <tr>
              <td><a href="/article/{{$article->id}}">{{$article->title}}</a></td>
              <td>{{$article->category["name"]}}</td>
              <td>{{$article->created_at}}</td>
              <td>
                <form action="/admin/article/update" method="post" style="display:inline;">
                  {{csrf_field()}}
                  <input type="hidden" value="{{$article->id}}">
                  <input class="btn btn-default btn-sm" type="submit" value="编辑">
                </form>
                <form action="/admin/article/del" method="post" style="display:inline;">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$article->id}}">
                  <input class="btn btn-default btn-sm" type="submit" value="删除">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$articles->links()}}
      </div>
    </div>
  </div>
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
