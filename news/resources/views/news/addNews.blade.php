<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>新闻管理</title>
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
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
                    <a href="{{URl('/newsList')}}"><i class="fa fa-th-large"></i> <span class="nav-label">新闻管理</span> <span class="fa arrow"></span></a>
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
                        欢迎您！{{ $adminName }}
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

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加新闻</h5>

                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="signupForm" method="post" action="
                        @if ($newsInfo['id'] =='')
                            {{URL('/createNews')}}
                        @else
                            {{URL('/updataNews')}}
                        @endif
                            ">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" value="{{ $newsInfo['id'] }}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题：</label>
                            <div class="col-sm-8">
                                <input name="title" value="{{ $newsInfo['newsTitle'] }}" class="form-control" type="text" maxlength="50"  placeholder="不超过50个字符" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">发布者：</label>
                            <div class="col-sm-8">
                                <input name="author" value="{{ $newsInfo['author'] }}" class="form-control" type="text" maxlength="50"  placeholder="不超过10个字符" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标签：</label>
                            <div class="col-sm-8">
                                <input name="type" value="{{ $newsInfo['type'] }}" class="form-control" type="text" placeholder="标签内容，以 - 隔开" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否热点：</label>
                            <div class="col-sm-8">
                                <input name="isHot" type="checkbox" class="checkbox" id="agree" value="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">内容：</label>
                            <div class="col-sm-8">
                                <textarea name="content" id="editor" placeholder="这里输入新闻内容" autofocus required="" aria-required="true">{{ $newsInfo['content'] }}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
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

<!-- 富文本编辑器 -->
<link rel="stylesheet" type="text/css" href="plugins/simditor/styles/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="plugins/simditor/styles/simditor.css" />
<script type="text/javascript" src="plugins/simditor/scripts/js/jquery.min.js"></script>
<script type="text/javascript" src="plugins/simditor/scripts/js/module.js"></script>
<script type="text/javascript" src="plugins/simditor/scripts/js/uploader.js"></script>
<script type="text/javascript" src="plugins/simditor/scripts/js/simditor.js"></script>
<script type="text/javascript">
    var editor = new Simditor({
        textarea: $('#editor')
    });
</script>

</body>

</html>