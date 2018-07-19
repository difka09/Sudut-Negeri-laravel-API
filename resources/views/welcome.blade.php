<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Coming Soon</title>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/countdown.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" href="font/Bebas/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
		<header>
			
			<h2 class="title">Sudut Negeri</h2>
			
		</header>
	
		<section id="twd-container">
			<h1 class="head">Coming Soon</h1>
			<div id="count-down-container"></div>
			
			<script type="text/javascript">
			var currentyear=new Date().getFullYear()
			var target_date=new cdtime("count-down-container", "December 29, "+currentyear+" 0:0:00")
			target_date.displaycountdown("days", displayCountDown)
			</script>
			
		</section>
	
</body>
</html>