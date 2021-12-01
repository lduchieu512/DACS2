@extends('layout')
@section('content')

		<section id="form"><!--form-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="login-form"><!--login form-->
								<h2>Đăng nhập tài khoản</h2>
								<form action="#">
									<input type="text" name="email_account" placeholder="Tài khoản" />
									<input type="password" name="password_account" placeholder="Mật khẩu " />
									<span>
										<input type="checkbox" class="checkbox"> 
										Lưu mật khẩu
									</span>
									<button type="submit" class="btn btn-default">Đăng nhập</button>
								</form>
							</div><!--/login form-->
						</div>
						<div class="col-sm-1">
							<h2 class="or">HOẶC</h2>
						</div>
						<div class="col-sm-4">
							<div class="signup-form"><!--sign up form-->
								<h2>Đăng ký</h2>
								<form action="{{URL::to('/add-customers')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="customers_name" placeholder="Tên Tài khoản"/>
									<input type="email" name="customers_email" placeholder="Email "/>
									<input type="password" name="customers_password" placeholder="Mật khẩu "/>
									<input type="number" name="customers_phone" placeholder="Phone "/>
									<button type="submit" class="btn btn-default">Đăng ký</button>
								</form>
							</div><!--/sign up form-->
						</div>
					</div>
				</div>
		</section><!--/form-->





@endsection     