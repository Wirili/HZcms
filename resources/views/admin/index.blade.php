@extends('admin.layout')

@section('content')
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini">
                <b>A</b>LT
            </span>
            <span class="logo-lg">
                <b>Admin</b>LTE
            </span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <i class="fa fa-user"></i>
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">个人信息</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{URL::route('admin.logout')}}" class="btn btn-default btn-flat">注销</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">菜单</li>
                <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i>
                        <span>网站配置</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{URL::route('admin.config.edit')}}" target="main-content"><i class="fa fa-circle-o"></i>基本配置</a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.farm.index')}}" target="main-content"><i class="fa fa-circle-o"></i>宠物设置</a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.article.index')}}" target="main-content"><i class="fa fa-circle-o"></i>文章列表</a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.article_cat.index')}}" target="main-content"><i class="fa fa-circle-o"></i>文章类别</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i>
                        <span>会员管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{URL::route('admin.user.index')}}" target="main-content"><i class="fa fa-circle-o"></i>会员列表</a>
                        </li>
                        <li>
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>会员宠物列表</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i>
                        <span>商品管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{URL::route('admin.good.index')}}" target="main-content"><i class="fa fa-circle-o"></i>商品列表</a>
                        </li>
                        <li>
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>商品类型</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i>
                        <span>订单管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>订单列表</a>
                        </li>
                        <li>
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>订单查询</a>
                        </li>
                        <li>
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>发货单列表</a>
                        </li>
                        <li>
                            <a href="index.html" target="main-content"><i class="fa fa-circle-o"></i>退货单列表</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0);">
                        <i class="fa fa-dashboard"></i>
                        <span>权限管理</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{URL::route('admin.admin.index')}}" target="main-content"><i class="fa fa-circle-o"></i>管理员列表</a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.role.index')}}" target="main-content"><i class="fa fa-circle-o"></i>角色管理</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <iframe name="main-content" src="{{URL::route('admin.welcome')}}" frameborder="0" scrolling="yes" style="height:100%;width:100%;"></iframe>
    </div>
</div>
<script>
    $(function(){
        $('.sidebar-toggle').on('click',function(){
            if($('body').hasClass('sidebar-open')) {
                $('body').removeClass('sidebar-open');
            }else{
                $('body').addClass('sidebar-open');
            }
        });
        menu_tree('.sidebar');
    });
    function menu_tree (menu) {
        var _this = this;
        var animationSpeed = 100;
        $(document).off('click', menu + ' li a')
                .on('click', menu + ' li a', function (e) {
                    //Get the clicked link and the next element
                    var $this = $(this);
                    var checkElement = $this.next();

                    //Check if the next element is a menu and is visible
                    if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible')) && (!$('body').hasClass('sidebar-collapse'))) {
                        //Close the menu
                        checkElement.slideUp(animationSpeed, function () {
                            checkElement.removeClass('menu-open');
                            //Fix the layout in case the sidebar stretches over the height of the window
                            //_this.layout.fix();
                        });
                        checkElement.parent("li").removeClass("active");
                    }
                    //If the menu is not visible
                    else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                        //Get the parent menu
                        var parent = $this.parents('ul').first();
                        //Close all open menus within the parent
                        var ul = parent.find('ul:visible').slideUp(animationSpeed);
                        //Remove the menu-open class from the parent
                        ul.removeClass('menu-open');
                        //Get the parent li
                        var parent_li = $this.parent("li");

                        //Open the target menu and add the menu-open class
                        checkElement.slideDown(animationSpeed, function () {
                            //Add the class active to the parent li
                            checkElement.addClass('menu-open');
                            parent.find('li.active').removeClass('active');
                            parent_li.addClass('active');
                            //Fix the layout in case the sidebar stretches over the height of the window
                        });
                    }
                    //if this isn't a link, prevent the page from being redirected
                    if (checkElement.is('.treeview-menu')) {
                        e.preventDefault();
                    }
                });
    };
</script>
@endsection