<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>新闻管理</title>
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugins/simditor/styles/font-awesome.css" />

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">

                <li class="active">
                    <a href="{{ URL('/newsList') }}"><i class="fa fa-th-large"></i> <span class="nav-label">新闻管理</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ URL('/newsList') }}">新闻列表</a>
                        </li>
                        <li class="active"><a href="{{ URL('/refuseNews') }}">垃圾箱</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="minimalize-styl-2 btn btn-danger " href="{{URl('/addNews')}}">添加一条新闻</a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        欢迎您！admin
                    </li>
                    <li>
                        <a href="{{ URL('/logout') }}" style="color:red;">
                            退出
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="ibox-title">
                <h5>新闻列表</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>发布者</th>
                            <th>删除时间</th>
                            <th>发布时间</th>
                            <th>阅读次数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($newsList as $news)
                        <tr>
                            <td>{{ $news['newsTitle'] }}</td>
                            <td>{{ $news['author'] }}
                            </td>
                            <td>{{ date('Y-m-d',$news['time']) }}</td>
                            <td>{{ date('Y-m-d',$news['delTime']) }}</td>
                            <td>0</td>
                            <td>
                                <a href="{{ URl('/reList?newsId='.$news['id']) }}" class="btn btn-outline btn-primary btn-xs">恢复</a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div style="float:right;">
                    {!! $newsList->render() !!}
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    By：<a href="http://www.zi-han.net" target="_blank">戴强</a>
                </div>
                <div>
                    <strong>Copyright</strong> H+ &copy; 2014
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js?v=3.4.0"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/hplus.js?v=2.2.0"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
<!--统计代码，可删除-->
</body>

</html>