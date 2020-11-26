<?php
	$type = filter_input(INPUT_GET, 't', FILTER_SANITIZE_STRING);
	if(empty($type)){
		$type = 'user';
	}
	
	if(!file_exists(__DIR__ . '/includes/' . $type . '.php')){
		$type = 'user';
	}
	
	$headline = ucwords($type);
	$content_path = __DIR__ . '/includes/' . $type . '.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hamsto API Documentation</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="./assets/prism.css">
	<link rel="stylesheet" href="./assets/custom.css">
	<style type="text/css">
		body{
			min-width: 960px;
			max-width: 1280px;
		}


		pre[class*="language-"]{
			padding: 0.6rem 1.2rem;
		}
		pre.language-html{
			position: relative;
			margin-top: 35px;
			overflow: visible;
		}
		pre.language-html:before{
			content: attr(data-type);
			position: absolute;
			top: -30px;
			left: 0;
			font-weight: 600;
			font-size: 15px;
			display: inline-block;
			padding: 2px 5px;
			border-radius: 6px;
			text-transform: uppercase;
			background-color: #3387CC;
			color: #ffffff;
		}
		pre.language-html[data-type="get"]:before {
			background-color: green;
		}

		pre.language-html[data-type="put"]:before {
			background-color: #e5c500;
		}

		pre.language-html[data-type="post"]:before {
			background-color: #4070ec;
		}

		pre.language-html[data-type="delete"]:before {
			background-color: #ed0039;
		}
		#navigation{
			width: 250px;
			position: fixed;
			top: 0;
			left: 0;
			height: 100%;
			background: #f1f1f1;
			padding: 15px;
		}
		#navigation ul{
			margin-left: 0;
			margin-bottom: 0;
			padding-left: 0;
			display: block;
			list-style: none;
		}
		#navigation ul li{
			display: block;
		}
		#navigation ul li a{
			display: block;
			font-size: 14px;
			padding: 0.1rem 0.75rem;
			color: #36ab92;
		}
		#navigation ul li a:hover{
			text-decoration: none;
			color: #2a8571;
		}
		#navigation ul li ul{
			display: none;
		}
		#navigation ul li a.active + ul{
			display: block;
		}
		#navigation > ul > li{
			margin-bottom: 3px;
		}
		#navigation > ul > li > a{
			padding: 5px 0.75rem;
			font-weight: 700;
			text-transform: uppercase;
			background: #36ab92;
			color: #fff;
			font-size: 16px;
		}
		#navigation > ul > li > a:hover{
			background: #2a8571;
			color: #fff;
		}
		#content{
			width: calc(100% - 280px);
			margin-left: 280px;
			padding: 15px 0;
		}
		#content > section{
			border-top: 1px solid #f1f1f1;
			padding-top: 20px;
			margin-top: 30px;
		}
		#content > section h4{
			background: #dbf0ec;
			border-top: 1px solid #b6e1d8;
			border-bottom: 1px solid #b6e1d8;
			padding: 5px 0.75rem;
			margin-top: 40px;
			margin-bottom: 10px;
			text-transform: uppercase;
		}
		#content > section h3{
			background: #f78964;
			color: #fff;
			padding: 5px 0.75rem;
			text-shadow: 0 0 3px rgba(0,0,0,0.4);
			text-transform: uppercase;
		}
		#logo{
			padding: 15px 0 0;
			text-align: center;
			background: #fff;
			margin: -15px -15px 15px;
			border-bottom: 1px solid #e6e6e6;
			border-right: 1px solid #f1f1f1;
		}
		#logo img{
			display: inline-block;
		}
		.table th, .table td{
			vertical-align: middle;
		}
		.spacer{
			width: 100%;
			height: 40px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav id="navigation">
				<div id="logo">
					<img src="./assets/logo.gif" alt="Hamsto">
				</div>
				<ul>
					<li><a href="?t=user"<?php if($type == 'user'){echo ' class="active"';} ?>>User</a>
						<ul>
							<li><a href="#get-user">Get user</a></li>
							<li><a href="#get-account-balance">Get account balance</a></li>
							<li><a href="#create-user">Create user</a></li>
							<li><a href="#update-user">Update user</a></li>
							<li><a href="#rate-user">Rate user</a></li>
						</ul>
					</li>
					<li><a href="?t=authorization"<?php if($type == 'authorization'){echo ' class="active"';} ?>>Authorization</a>
						<ul>
							<li><a href="#check-login">Check login</a></li>
							<li><a href="#check-social-login">Check social login</a></li>
							<li><a href="#get-user-id">Get user ID by auth_key</a></li>
							<li><a href="#log-out">Log out</a></li>
						</ul>
					</li>
					<li><a href="?t=messages"<?php if($type == 'messages'){echo ' class="active"';} ?>>Messages</a>
						<ul>
							<li><a href="#get-all-messages">Get all messages</a></li>
							<li><a href="#get-message">Get message</a></li>
							<li><a href="#send-message">Send message</a></li>
						</ul>
					</li>
					<li><a href="?t=locations"<?php if($type == 'locations'){echo ' class="active"';} ?>>Locations</a>
						<ul>
							<li><a href="#get-all-locations">Get all locations</a></li>
							<li><a href="#get-location">Get location</a></li>
							<li><a href="#create-location">Create location</a></li>
							<li><a href="#update-location">Update location</a></li>
							<li><a href="#toggle-status">Toggle status (active / disabled)</a></li>
							<li><a href="#toggle-favorite">Toggle favorite</a></li>
							<li><a href="#search-locations">Search locations</a></li>
						</ul>
					</li>
					<li><a href="?t=bookings"<?php if($type == 'bookings'){echo ' class="active"';} ?>>Bookings</a>
						<ul>
							<li><a href="#get-all-bookings">Get all bookings</a></li>
							<li><a href="#get-booking">Get booking</a></li>
							<li><a href="#create-booking">Create booking</a></li>
							<li><a href="#accept-booking">Accept booking</a></li>
							<li><a href="#reject-booking">Reject booking</a></li>
							<li><a href="#cancel-booking">Cancel booking</a></li>
							<li><a href="#get-agreement">Get agreement</a></li>
							<li><a href="#update-agreement">Update agreement</a></li>
							<li><a href="#accept-agreement">Accept agreement</a></li>
							<li><a href="#reject-agreement">Reject agreement</a></li>
						</ul>
					</li>
					<li><a href="?t=transactions"<?php if($type == 'transactions'){echo ' class="active"';} ?>>Transactions</a>
						<ul>
							<li><a href="#get-all-transactions">Get all transactions</a></li>
							<li><a href="#get-transaction">Get transaction</a></li>
							<li><a href="#create-deposit">Create deposit</a></li>
							<li><a href="#request-payout">Request payout</a></li>
							<li><a href="#update-transaction">Update transaction</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<main id="content">
				<h1><?= $headline; ?></h1>
				<pre data-type="REST base"><code class="language-html">https://www.hamsto.com/wp-json/v1</code></pre>
				<section>
					<?php include_once($content_path); ?>
				</section>
				
			</main>
		</div>
	</div>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="./assets/prism.js"></script>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function(){
			jQuery(document).ready(function($){
				
				// $('body').scrollspy({ target: '#navigation' });
				
			});
		});
	</script>
</body>
</html>