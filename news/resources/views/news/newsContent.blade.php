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
        .newsHeader{
            width: 100%;
            height: 80px;
        }
        .newTitle{
            font-size: 20px;
            font-family: "微软雅黑";
            text-align: center;
            padding: 10px;
        }
        .newsHeader > ul{
            width: 600px;
            height: 30px;
            line-height: 30px;
            list-style: none;
            margin: 0 auto;
        }
        .newsHeader > ul > li{
            float: left;
            margin-left: 30px;
        }
        .newsHeader > ul > li:nth-child(1){
            margin-left: 0;
        }

        .newsContent{
            margin: 10px;
            font-size: 14px;
            line-height: 25px;
        }
        .comment{
            margin: 10px;
            list-style: none;
        }
        .comment > li:nth-child(1){
            margin-top:20px;
            border-left: 5px solid #c0c0c0;
            margin-left: -40px;
        }
        .comment > li{
            background-color: #F3F3F4;
            height: 40px;
            line-height: 40px;
            font-size: 14px;
            margin-top: 5px;
            margin-left:-20px;
            padding-left:10px;
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
                <h5>新闻详情</h5>
            </div>
            <div class="ibox-content">
                <div class="newsHeader">
                    <div class="newTitle">
                        {{ $newsInfo->newsTitle }}
                    </div>
                    <ul class="outer">
                        <li>作者：{{ $newsInfo['author'] }}</li>
                        <li>发布时间：{{ date('Y-m-d' ,$newsInfo->time) }}</li>
                        <li>标签：{{ $newsInfo->type }}</li>
                        <li>
                            @if($newsInfo->type == '1')
                                热点新闻
                            @else
                            @endif
                        </li>
                        <li class="outer"></li>
                    </ul>
                </div>
                <div class="newsContent">
                     {!! $newsInfo->content !!}
                </div>

                <ul class="comment">
                    <li>评论：</li>
                    @if($has != 0)
                    @foreach($comInfo as $com)
                    <li>
                        <span>{{ date('Y-m-d', $com->time) }}|</span>
                        <span>{!! $com->comment !!}</span>
                    </li>
                    @endforeach
                    @else
                    <li>暂时没有评论</li>
                    @endif
                </ul>
                <form action="{{ URL('/addComment?newsId='.$newsInfo->id) }}" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <div class="col-sm-8">
                        <input name="comment" class="form-control" type="text" maxlength="50"  placeholder="添加评论，不超过50个字符" required="" aria-required="true">
                    </div>
                    <div class="col-sm">
                        <button class="btn btn-primary" type="submit">提交</button>
                    </div>
                </div>
                </form>
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