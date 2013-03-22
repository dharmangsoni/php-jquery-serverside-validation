<!DOCTYPE  html>
<html>
  <head>
		<title>Jquery Serverside validation</title>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(function() {

				$("#btnLogin").click(function() {
					$.ajax({
						url : "ajax/login.php",
						type : "post",
						dataType : "json",
						data : $("#frmLogin").serialize(),
						success : function(res) {
							if (res.response == "error") {
								var errorList = "<ul>";
								$.each(res.detail, function(key, value) {
									errorList += "<li>" + value + "</li>";
								});
								errorList += "</ul>";
								$("#error-detail").html(errorList);
								$("#validation-error").fadeIn("fast");
							} else {
								$("#validation-error").fadeOut("fast");
								$("#frmLogin").submit();
							}

						}
					});
				});
                $("#close-box").click(function(){
                    $("#validation-error").fadeOut("fast");
                });
			});

		</script>

		<style type="text/css">
			body {
				font-family: Arial;
				font-size: 12px;
			}
			div#login-form {
				width: 500px;
				margin: 100px auto 0px auto;
				background: #ebebeb;
				padding: 30px;
			}
			label {
				display: block;
				font-weight: bold;
				margin: 5px 0px 10px 0px;
			}
			input[type=text], input[type=password] {
				padding: 5px 10px;
			}
			input[type=button] {
				margin: 8px 0px;
				padding: 5px 10px;
				display: block;
			}
			div#validation-error {
				width: 500px;
				position: absolute;
				top: 10px;
				left: auto;
				padding: 0px 0px 3px 0px;
				font-weight: bold;
				background: #fbfbfb;
				box-shadow: 0px 0px 5px #aaa;
				border: 1px solid #414141;
				border-radius: 5px;
				-moz-border-radius: 5px;
				display: none;
			}
			div#validation-error p.title {
				background: #ebebeb;
				border-radius: 5px 5px 0px 0px;
				-moz-border-radius: 5px 5px 0px 0px;
				color: #414141;
				text-shadow: 1px 1px 0px #fff;
				font-weight: bold;
				font-size: 15px;
				margin: 0px;
				padding: 8px;
			}div#validation-error p.title span.close {
			    font-size: 11px;
			    font-weight: bold;
			    text-shadow: none;
			    float:right;
			    cursor:pointer;
			}
			div#validation-error p.detail {
				text-shadow: 1px 1px 0px #fff;
				line-height: 20px;
				margin: 0px;
				color: #cc0000;
				padding: 0px 0px 0px 10px;
			}
		</style>
	</head>
	<body>
		<h1>JQeury Server Validation :</h1>
		<div id="login-form">
			<form id="frmLogin" method="post">
				<label>Username :</label>
				<input type="text" placeholder="Username" name="username" id="username" />
				<label>Password:</label>
				<input type="password" placeholder="Password" name="password" id="password" />
				<input type="button" id="btnLogin" class="block" name="login" value="Login" />
				<div id="validation-error">
					<p class="title">
						Validation Fail :
						<span class="close" id="close-box">X</span>
					</p>
					<p class="detail" id="error-detail">

					</p>
				</div>
			</form>
		</div>
	</body>
</html>
