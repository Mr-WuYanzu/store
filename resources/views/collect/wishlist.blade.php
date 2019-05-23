@extends('layouts.app')

@section('title', '心愿列表')

@section('content')

    <!-- side nav right-->
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
            <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
        </ul>
    </div>
    <!-- end side nav right-->

    <!-- navbar bottom -->
    <div class="navbar-bottom">
        <div class="row">
            <div class="col s2">
                <a href="index.html"><i class="fa fa-home"></i></a>
            </div>
            <div class="col s2">
                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
            </div>
            <div class="col s4">
                <div class="bar-center">
                    <a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
                    <span>2</span>
                </div>
            </div>
            <div class="col s2">
                <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
            </div>
            <div class="col s2">
                <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </div>
    <!-- end navbar bottom -->

    <!-- wishlist -->
    <div class="wishlist section">
        <div class="container">
            <div class="pages-head">
                <h3>WISHLIST</h3>
            </div>
            <div class="content">
                @foreach($collectInfo as $k=>$v)
                <div class="cart-1">
                    <div class="row">
                        <div class="col s5">
                            <h5>Image</h5>
                        </div>
                        <div class="col s7">
                            <img src="/img/{{$v->goods_img}}" alt="" style="width:200px;height:210px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Name</h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="">{{$v->goods_name}}</a></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Stock Status</h5>
                        </div>
                        <div class="col s7">
                            <h5>In Stock</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Price</h5>
                        </div>
                        <div class="col s7">
                            <h5>￥{{$v->goods_price}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>Action</h5>
                        </div>
                        <div class="col s7" c_id="{{$v->c_id}}">
                            <h5><i class="fa fa-trash"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col 12">
                            <button class="btn button-default">SEND TO CART</button>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end wishlist -->

    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->

@endsection
<script src="/js/jquery.min.js"></script>
<script>
    $(function () {
        $('.fa').click(function () {
            var c_id=$(this).parents('div').attr('c_id');
            $.ajax({
                url:'/collect/del',
                dataType:'json',
                data:{c_id:c_id},
                success:function (res) {
                    if(res.errno==0){
                        if (confirm('确定要删除吗')){
                            alert('删除成功');
                            location.reload();
                            return true;
                        }
                        return false;

                    }
                }
            })
        })
    })
</script>