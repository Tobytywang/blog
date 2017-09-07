<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/editormd.min.css" />
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
            <li class="active"><a href="/admin/article">日志</a></li>
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
    <form role="form" action="/admin/article/new" method="post">
    {{csrf_field()}}
      <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-7 col-lg-offset-1 col-lg-7">
          <h4>撰写新文章</h4>
          <div class="form-group">
            <input type="text" name="title" value="" class="form-control" placeholder="在此输入标题">
          </div>
          <div class="form-group">
            <input type="text" name="slug" value="" class="form-control" placeholder="在此输入文章链接">
          </div>
          <div class="form-group" id="editormd">
            <textarea style="display:none;" class="form-control" name="markdown">### Hello Editor.md !</textarea>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <h4>分类</h4>
          <div class="form-group">
            <select name="category_id" class="form-control">
              <option value="0">无分类</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <h4>发布</h4>
          <div class="form-group clearfix">
            <a type="submit" name="" class="btn btn-default pull-left">预览</a>
            <input type="submit" name="" class="btn btn-primary pull-right" value="发布">
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/editormd.min.js"></script>
  <script type="text/javascript">
      $(function() {
          var editor = editormd("editormd", {
            width: "100%",
            height: 436,
            path : "/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
            saveHTMLToTextarea : true,
            toolbarIcons : function(){
              return ["undo", "redo", "|", "bold", "hr", "|", "preview", "watch", "|", "info", "testIcon", "testIcon2", "file", "faicon", "||", "watch", "fullscreen", "preview", "testIcon"]
            },
            saveHTMLToTextarea:true,
          });
          // editor.getHTML();
      });
  </script>
</body>
</html>
