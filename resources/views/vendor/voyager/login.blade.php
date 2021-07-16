<!DOCTYPE html>
<html>
    
<head>
	<title>Administrator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<style>
    body *{
        font-family: 'Poppins', sans-serif;
    }    
    body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #204a62 !important;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #f8fdfe;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			/* background: #60a3bc; */
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
            user-drag: none; 
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
			/* height: 150px; */
			width: 150px;
			/* border-radius: 50%; */
			/* border: 2px solid white; */
		}
		.form_container {
			margin-top: 51px;
		}
		.login_btn {
			width: 100%;
			background: rgb(36, 96, 185) !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}

        .haserror{
            border: 1px solid #c0392b;
        }
        .error{
            color: #c0392b;
            font-size: 13px;
        }
</style>    



<body oncontextmenu="return false;">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center" oncontextmenu="return false;">
					<div class="brand_logo_container">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/23/Emblem_of_Nepal.svg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    <form action="{{ route('voyager.login') }}" method="POST">
                        @csrf
                        <div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="text" class="form-control input_user {{ $errors->first('name')? 'haserror' : ''}}" name="name" id="name" value="{{ old('name') }}" placeholder="Username">
                        </div>
                        @if($errors->first('name'))
                        <div class="error mb-2 pl-5 mt-0" >Please enter credentials correctly</div>
                        @endif          
                        
						<div class="input-group mt-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
                            <input type="password" class="form-control input_pass {{ $errors->first('password')? 'haserror' : ''}}" name="password" placeholder="{{ __('voyager::generic.password') }}">
                        </div>
                        @if($errors->first('password'))
                        <div class="error mb-2 pl-5 mt-0" >{{$errors->first('password')}}</div>
                        @endif
						<div class="form-group mt-2">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" value="1" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
                    </form>

                </div>
			</div>
		</div>
	</div>
</body>
</html>