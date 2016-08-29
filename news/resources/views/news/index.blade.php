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
    <style type="text/css">
        .dropdown-menu{
            z-index: 999;
        }
    </style>

</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">

                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">新闻管理</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="{{URl('/newsList')}}">新闻列表</a>
                        </li>
                        <li><a href="{{ URL('/refuseNews') }}">垃圾箱</a>
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
                <div class="row">
                    <div class="col-sm-4 m-b-xs">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-white" href="{{ URL('/newsList?newsType=9') }}">
                                所有</a>
                            <a class="btn btn-sm btn-white" href="{{ URL('/newsList?newsType=1') }}">
                                热点</a>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>标题</th>
                            <th>发布者</th>
                            <th>是否热点</th>
                            <th>时间</th>
                            <th>阅读次数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($newsList as $news)
                        <tr>
                            <td><a href="{{ URL('/newsContent?id='.$news['id']) }}">{{ $news->newsTitle }}</a></td>
                            <td>{{ $news['author'] }}
                            </td>
                            <td>
                                @if ( $news->isHot == 1)
                                    是
                                @else
                                    否
                                @endif
                            </td>
                            <td>{{ date('Y-m-d',$news['time']) }}</td>
                            <td>0</td>
                            <td>
                                @if ( $news['isHot'] == 1)
                                    <a href="{{ URl('/outHot?newsId='.$news['id']) }}" class="btn btn-outline btn-primary btn-xs">取消热点</a>
                                @else
                                    <a href="{{ URl('/setHot?newsId='.$news['id']) }}" class="btn btn-outline btn-primary btn-xs">设置热点</a>
                                @endif
                                <a href="{{ URL('/addNews?newsId='.$news['id']) }}" class="btn btn-outline btn-primary btn-xs">编辑</a>
                                <a href="{{ URL('/toRefuse?newsId='.$news['id']) }}" class="btn btn-outline btn-danger btn-xs">删除</a>
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