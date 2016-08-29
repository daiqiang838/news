<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>新闻管理 - 登录</title>

    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <p>创建一个新用户</p>
        <form class="m-t" role="form" action="{{ url('/addAdmin') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入用户名" required="" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="请输入密码" required="" name="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="请再次输入密码" required="" name="repassword">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>

        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js?v=3.4.0"></script>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script><!--统计代码，可删除-->

</body>

</html>
