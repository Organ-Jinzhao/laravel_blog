<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>登录</title>
<link rel="stylesheet" href="{{asset('login/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('login/css/login.css')}}">
<link rel="stylesheet" href="{{asset('login/css/sign-up-login.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('login/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('login/css/inputEffect.css')}}" />
<link rel="stylesheet" href="{{asset('login/css/tooltips.css')}}" />
<link rel="stylesheet" href="{{asset('login/css/spop.min.css')}}" />

<script src="{{asset('login/js/jquery.min.js')}}"></script>
<script src="{{asset('login/js/snow.js')}}"></script>
<script src="{{asset('login/js/jquery.pure.tooltips.js')}}"></script>
<script src="{{asset('login/js/spop.min.js')}}"></script>
<script>
	(function() {

		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}

		[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}

			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );

		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}

		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();

	$(function() {
		$('#login #login-password').focus(function() {
			$('.login-owl').addClass('password');
		}).blur(function() {
			$('.login-owl').removeClass('password');
		});
		$('#login #register-password').focus(function() {
			$('.register-owl').addClass('password');
		}).blur(function() {
			$('.register-owl').removeClass('password');
		});
		$('#login #register-repassword').focus(function() {
			$('.register-owl').addClass('password');
		}).blur(function() {
			$('.register-owl').removeClass('password');
		});
		$('#login #forget-password').focus(function() {
			$('.forget-owl').addClass('password');
		}).blur(function() {
			$('.forget-owl').removeClass('password');
		});
	});

	function goto_register(){
		$("#register-username").val("");
		$("#register-password").val("");
		$("#register-repassword").val("");
		$("#register-code").val("");
		$("#tab-2").prop("checked",true);
	}

	function goto_login(){
		$("#login-username").val("");
		$("#login-password").val("");
		$("#tab-1").prop("checked",true);
	}

	function goto_forget(){
		$("#forget-username").val("");
		$("#forget-password").val("");
		$("#forget-code").val("");
		$("#tab-3").prop("checked",true);
	}

	{{--function login(){//登录--}}
		{{--var login = {};--}}
			{{--login.name = $("#login-username").val();--}}
			{{--login.password = $("#login-password").val();--}}
			{{--login.captcha = $("#login-captcha").val();--}}
		{{--$.post("/member/login",{"login":login,"_token":"{{ csrf_token() }}"},function(result){--}}

			{{--console.log(result.msg);--}}
			// if(result.code == 1 ){
			// 	spop({
			// 		template: '<h4 class="spop-title">'+result.msg+'</h4>即将于3秒后返回登录',
			// 		position: 'top-center',
			// 		style: 'success',
			// 		autoclose: 3000,
			// 		onOpen : function(){
			// 			var second = 2;
			// 			var showPop = setInterval(function(){
			// 				if(second == 0){
			// 					clearInterval(showPop);
			// 				}
			// 				$('.spop-body').html('<h4 class="spop-title">注册成功</h4>即将于'+second+'秒后返回登录');
			// 				second--;
			// 			},1000);
			// 		},
			// 		onClose : function(){
			// 			goto_login();
			// 		}
			// 	});
			// }else{
			// 	spop({
			// 		template: '<h4 class="spop-title">'+result.msg+'</h4>',
			// 		position: 'top-center',
			// 		style: 'error',
			// 		autoclose: 2000,
			// 	});
			// }
		{{--});--}}
		{{--判断用户名密码是否为空--}}
		{{--if(username == ""){--}}
			{{--$.pt({--}}
        		{{--target: $("#login-username"),--}}
        		{{--position: 'r',--}}
        		{{--align: 't',--}}
        		{{--width: 'auto',--}}
        		{{--height: 'auto',--}}
        		{{--content:"用户名不能为空"--}}
        	{{--});--}}
			{{--flag = true;--}}
		{{--}--}}
		{{--if(password == ""){--}}
			{{--$.pt({--}}
        		{{--target: $("#login-password"),--}}
        		{{--position: 'r',--}}
        		{{--align: 't',--}}
        		{{--width: 'auto',--}}
        		{{--height: 'auto',--}}
        		{{--content:"密码不能为空"--}}
        	{{--});--}}
			{{--flag = true;--}}
		{{--}--}}
		{{--//用户名只能是15位以下的字母或数字--}}
		{{--var regExp = new RegExp("^[a-zA-Z0-9_]{1,15}$");--}}
		{{--if(!regExp.test(username)){--}}
			{{--$.pt({--}}
        		{{--target: $("#login-username"),--}}
        		{{--position: 'r',--}}
        		{{--align: 't',--}}
        		{{--width: 'auto',--}}
        		{{--height: 'auto',--}}
        		{{--content:"用户名必须为15位以下的字母或数字"--}}
        	{{--});--}}
			{{--flag = true;--}}
		{{--}--}}

	{{--}--}}

	//注册
	function register(){
		var reg = {};
		reg.name = $("#register-username").val();
		reg.password = $("#register-password").val();
		reg.password_confirmation = $("#register-repassword").val();
		reg.phone = $("#register-phone").val();
		reg.captcha = $("#register-captcha").val();
		//判断用户名密码是否为空
		// if(reg.username == ""){
		// 	$.pt({
        // 		target: $("#register-username"),
        // 		position: 'r',
        // 		align: 't',
        // 		width: 'auto',
        // 		height: 'auto',
        // 		content:"用户名不能为空"
        // 	});
		// }
		// if(password == ""){
		// 	$.pt({
        // 		target: $("#register-password"),
        // 		position: 'r',
        // 		align: 't',
        // 		width: 'auto',
        // 		height: 'auto',
        // 		content:"密码不能为空"
        // 	});
		// }else{
		// 	if(password != repassword){
		// 		$.pt({
	    //     		target: $("#register-repassword"),
	    //     		position: 'r',
	    //     		align: 't',
	    //     		width: 'auto',
	    //     		height: 'auto',
	    //     		content:"两次输入的密码不一致"
	    //     	});
		// 	}
		// }
		// //用户名只能是15位以下的字母或数字
		// var regExp = new RegExp("^[a-zA-Z0-9_]{1,15}$");
		// if(!regExp.test(username)){
		// 	$.pt({
        // 		target: $("#register-username"),
        // 		position: 'r',
        // 		align: 't',
        // 		width: 'auto',
        // 		height: 'auto',
        // 		content:"用户名必须为15位以下的字母或数字"
        // 	});
		// 	flag = true;
		// }
		//检查用户名是否已经存在
		//调后台代码检查用户名是否已经被注册

		//检查注册码是否正确
		//调后台方法检查注册码，这里写死为11111111
		// if(code != '11111111'){
		// 	$.pt({
		//         target: $("#register-code"),
		//         position: 'r',
		//         align: 't',
		//         width: 'auto',
		//         height: 'auto',
		//         content:"注册码不正确"
		//        });
		// 	flag = true;
		// }
		$.post("/member/register",{"reg":reg,"_token":"{{ csrf_token() }}"},function(result){
			console.log(result.msg);
			if(result.code == 1 ){
				spop({
					template: '<h4 class="spop-title">'+result.msg+'</h4>即将于3秒后返回登录',
					position: 'top-center',
					style: 'success',
					autoclose: 3000,
					onOpen : function(){
						var second = 2;
						var showPop = setInterval(function(){
							if(second == 0){
								clearInterval(showPop);
							}
							$('.spop-body').html('<h4 class="spop-title">注册成功</h4>即将于'+second+'秒后返回登录');
							second--;
						},1000);
					},
					onClose : function(){
						goto_login();
					}
				});
			}else{
				spop({
					template: '<h4 class="spop-title">'+result.msg+'</h4>',
					position: 'top-center',
					style: 'error',
					autoclose: 2000,
				});
			}
		});
	}

	//重置密码
	function forget(){
		var username = $("#forget-username").val(),
			password = $("#forget-password").val(),
			code = $("#forget-code").val(),
			flag = false,
			validatecode = null;
		//判断用户名密码是否为空
		if(username == ""){
			$.pt({
        		target: $("#forget-username"),
        		position: 'r',
        		align: 't',
        		width: 'auto',
        		height: 'auto',
        		content:"用户名不能为空"
        	});
			flag = true;
		}
		if(password == ""){
			$.pt({
        		target: $("#forget-password"),
        		position: 'r',
        		align: 't',
        		width: 'auto',
        		height: 'auto',
        		content:"密码不能为空"
        	});
			flag = true;
		}
		//用户名只能是15位以下的字母或数字
		var regExp = new RegExp("^[a-zA-Z0-9_]{1,15}$");
		if(!regExp.test(username)){
			$.pt({
        		target: $("#forget-username"),
        		position: 'r',
        		align: 't',
        		width: 'auto',
        		height: 'auto',
        		content:"用户名必须为15位以下的字母或数字"
        	});
			flag = true;
		}
		//检查用户名是否存在
		//调后台方法

		//检查注册码是否正确
		if(code != '11111111'){
			$.pt({
		        target: $("#forget-code"),
		        position: 'r',
		        align: 't',
		        width: 'auto',
		        height: 'auto',
		        content:"注册码不正确"
		       });
			flag = true;
		}



		if(flag){
			return false;
		}else{//重置密码
			spop({
				template: '<h4 class="spop-title">重置密码成功</h4>即将于3秒后返回登录',
				position: 'top-center',
				style: 'success',
				autoclose: 3000,
				onOpen : function(){
					var second = 2;
					var showPop = setInterval(function(){
						if(second == 0){
							clearInterval(showPop);
						}
						$('.spop-body').html('<h4 class="spop-title">重置密码成功</h4>即将于'+second+'秒后返回登录');
						second--;
						},1000);
				},
				onClose : function(){
					goto_login();
				}
			});
			return false;
		}
	}

</script>
<style type="text/css">
html{width: 100%; height: 100%;}

body{

	background-repeat: no-repeat;

	background-position: center center #2D0F0F;

	background-color: #00BDDC;

	background-image: url({{asset('login/images/snow.jpg')}});

	background-size: 100% 100%;

}

.snow-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 100001; }

</style>
</head>
<body>
	<!-- 雪花背景 -->
	<div class="snow-container"></div>
	<!-- 登录控件 -->
	<div id="login">
		<input id="tab-1" type="radio" name="tab" class="sign-in hidden" checked />
		<input id="tab-2" type="radio" name="tab" class="sign-up hidden" />
		<input id="tab-3" type="radio" name="tab" class="sign-out hidden" />
		<div class="wrapper">
			<!-- 登录页面 -->
			<div class="login sign-in-htm">
				<form class="container offset1 loginform" method="post" action="/member/login">
				{{csrf_field()}}
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="login-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" name="name" value="{{old('name')}}" type="text" id="login-username"
									autocomplete="on" placeholder="请输入用户名" tabindex="1" maxlength="15" />
								<label class="input__label input__label--hideo" for="login-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" name="password" type="password" id="login-password" placeholder="请输入密码" tabindex="2" maxlength="15"/>
								<label class="input__label input__label--hideo" for="login-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" name="captcha" type="text" id="login-captcha" autocomplete="off" placeholder="请输入验证码"/>
								<label class="input__label input__label--hideo" for="register-captcha">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()" alt="验证码">
							</span>
						</section>
					</div>
					<div class="form-actions">
						<a tabindex="4" class="btn pull-left btn-link text-muted" onClick="goto_forget()">忘记密码?</a>
						<a tabindex="5" class="btn btn-link text-muted" onClick="goto_register()">注册</a>
						<input class="btn btn-primary" type="submit" tabindex="3"  value="登录"
							style="color:white;"/>
					</div>
				</form>
			</div>
			<!-- 忘记密码页面 -->
			<div class="login sign-out-htm">
				<form action="#" method="post" class="container offset1 loginform">
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="forget-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="forget-username" autocomplete="off" placeholder="请输入用户名"/>
								<label class="input__label input__label--hideo" for="forget-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="forget-code" autocomplete="off" placeholder="请输入注册码"/>
								<label class="input__label input__label--hideo" for="forget-code">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" id="forget-password" placeholder="请重置密码" />
								<label class="input__label input__label--hideo" for="forget-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
						</section>
					</div>
					<div class="form-actions">
						<a class="btn pull-left btn-link text-muted" onClick="goto_login()">返回登录</a>
						<input class="btn btn-primary" type="button" onClick="forget()" value="重置密码" 
							style="color:white;"/>
					</div>
				</form>
			</div>
			<!-- 注册页面 -->
			<div class="login sign-up-htm">
				<form action="#" method="post" class="container offset1 loginform">
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="register-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo"  type="text" id="register-username"
									autocomplete="off" placeholder="请输入用户名" maxlength="15"/>
								<label class="input__label input__label--hideo" for="register-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo"  type="password" id="register-password" placeholder="请输入密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="register-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo"  type="password" id="register-repassword" placeholder="请确认密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="register-repassword">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="register-phone" autocomplete="on" placeholder="请输入手机号码"/>
								<label class="input__label input__label--hideo" for="register-phone">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo"  type="text" id="register-captcha" autocomplete="off" placeholder="请输入验证码"/>
								<label class="input__label input__label--hideo" for="register-captcha">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>

							<span class="input input--hideo">
								<img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()" alt="验证码">
							</span>


						</section>
					</div>
					<div class="form-actions">
						<a class="btn pull-left btn-link text-muted" onClick="goto_login()">返回登录</a>
						<input class="btn btn-primary" type="button" onClick="register()" value="注册" 
							style="color:white;"/>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div style="text-align:center;">
<p>更多模板：<a href="/">源码之家</a></p>
</div>
</body>

<script>
	(function() {
		//登录提示
		@if(count($errors)>0 )
		@foreach($errors->all() as $error)
		spop({
			template: '<h4 class="spop-title">' + "{{$error}}" + '</h4>',
			position: 'top-center',
			style: 'error',
			autoclose: 2000,
		});
		@break
		@endforeach
		@endif

		@if(session('success'))
		spop({
			template: '<h4 class="spop-title">' + "{{session('success')}}" + '</h4>即将于3秒后返回登录',
			position: 'top-center',
			style: 'success',
			autoclose: 3000,
			onOpen: function () {
				var second = 2;
				var showPop = setInterval(function () {
					if (second == 0) {
						clearInterval(showPop);
					}
					$('.spop-body').html('<h4 class="spop-title">注册成功</h4>即将于' + second + '秒后返回登录');
					second--;
				}, 1000);
			},
			onClose: function () {
				goto_login();
			}
		});
		@endif
	})();
</script>

</html>