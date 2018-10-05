<!DOCTYPE html>
<html lang="en">
<head>
	<title>Exchange Rates</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>
<body>

	
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div style="margin-left: 1%;">

					<button style="margin-right: 10%" onclick="change_exchange_type('JPY')">JPY</button>
					
					<button style="margin-right: 10%" onclick="change_exchange_type('USDT')">USDT</button>
				
					<button style="margin-right: 10%" onclick="change_exchange_type('BTC')">BTC</button>
				
					<button style="margin-right: 10%" onclick="change_exchange_type('ETH')">ETH</button>
				
					<button style="margin-right: 10%" onclick="change_exchange_type('HT')">HT</button>
					
				</div>
				<div class="table" style="margin-top: 30px;" id="table_view">

					<div class="row header">
						<div class="cell">
							DateTime
						</div>
						<div class="cell">
							Pair
						</div>
						<div class="cell">
							Price
						</div>
						<div class="cell">
							Max-Min
						</div>
						<div class="cell">
							Exchange
						</div>
					</div>
				

				</div>
			</div>
		</div>
	</div>

	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/vendor/select2/select2.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script>
		
		function change_exchange_type(type)
		{
			$.post("Main/change_type", {type:type}, function(data) {
				$("#table_view").html(data);
			});
		}

		change_exchange_type('USDT');

	</script>

</body>
</html>