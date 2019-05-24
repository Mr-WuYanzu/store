@extends('layouts.app')

@section('title', '登录')

@section('content')
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>LOGIN</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12">
						<div class="input-field">
							<input type="text" class="validate user_name" placeholder="USERNAME" required>
						</div>
						<div class="input-field">
							<input type="password" class="validate password" placeholder="PASSWORD" required>
						</div>
						<a href="/forget" class="forget"><h6>Forgot Password ?</h6></a>
						<a class="btn button-default">LOGIN</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->

	<!-- scripts -->
	<script src="js/jquery.min.js"></script>

	<script>
		$(function(){
		    //点击登录
		    $(document).on('click',".btn",function () {
				var user_name = $(".user_name").val();
				var password = $(".password").val();
				$.ajax({
					url:"/login_do",
					data:{user_name:user_name,password:password},
                    type:'post',
                    async:false,
                    dataType:'json',
					success:function (res) {
						if(res.errno==1){
						    alert(res.msg);
						    location.href="/"
						}else{
                            alert(res.msg);
                            location.href="/login"
						}
                    },
                    error:function(res){
                        alert("发生错误："+ res.msg);
                    }
				})
            });
		})
	</script>
@endsection