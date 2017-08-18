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
          <li><a href="/admin/article">文章</a></li>
          <li class="active"><a href="/admin/category">分类</a></li>
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
      <div class="col-sm-8 col-md-offset-1 col-md-6 col-lg-offset-1 col-lg-6">
        <h4>目录分类</h4>
        <table class="table table-bordered">
      		<thead>
      			<tr>
      				<th>名称</th>
      				<th>总数</th>
              <th>操作</th>
      			</tr>
      		</thead>
      		<tbody>
      			<tr>
      				<td>程序</td>
              <td>8</td>
              <td>编辑 删除</td>
      			</tr>
      			<tr>
              <td>游戏</td>
              <td>5</td>
              <td>编辑 删除</td>
      			</tr>
      			<tr>
              <td>读书</td>
              <td>18</td>
              <td>编辑 删除</td>
      			</tr>
      			<tr>
              <td>漫画</td>
              <td>1</td>
              <td>编辑 删除</td>
      			</tr>
      		</tbody>
        </table>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-3">
        <h4>添加新目录分类</h4>
        <form role="form">
          <div class="form-group">
            <label for="firstname" class="control-label">名称</label>
            <div class="">
              <input type="text" class="form-control" id="firstname" placeholder="请输入名字">
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="control-label">父级分类目录</label>
            <div class="">
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="">
              <button type="submit" class="btn btn-default">添加新分类目录</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
