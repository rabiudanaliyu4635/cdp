
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donotion</title>
    <link rel="icon" type="image/x-icon" href="icons\favi.ico">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/site.css">
	<link rel="stylesheet" type="text/css" href="nucleo/css/nucleo.css">
	<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	<style> </style>

</head>
<body class="d-flex flex-column min-vh-100">
    <?php include 'header.php'; ?>

    <!-- donation_form.php -->
    <div class="wrapper flex-grow-1">
					<br>
					<br>
		<h2 class="text-center animate__animated animate__fadeInDown">Donate Now</h2>
		<div class="container mb-5 animate__animated animate__fadeIn animate__delay-1s">
		<hr>
			<div class="">
	
				<form id="paymentForm" action="" method="post" class="">
					<div class="col-md-6">
					<br>
					
						<div class="form-group row">
							<label for="donorName" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input id="email-address" type="email" class="form-control" autocomplete="off" name="donorName" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="donorEmail" class="col-sm-3 col-form-label">Amount</label>
							<div class="col-sm-9">
								<input id="amount" type="tel" class="form-control" autocomplete="off" name="donorEmail" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="donorPhone" class="col-sm-3 col-form-label">First Name</label>
							<div class="col-sm-9">
								<input id="first-name" type="text" class="form-control" autocomplete="off" name="donorPhone" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="donorPhone" class="col-sm-3 col-form-label">Last Name</label>
							<div class="col-sm-9">
								<input id="last-name" type="text" class="form-control" autocomplete="off" name="donorPhone" required>
							</div>
						</div>
										
						<br>
						<input type="submit" onclick="payWithPaystack()" id="donateBtn" class="btn btn-primary form-control btncmn" value="Pay" name="donate">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
	const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_175eed5a1f5bf2a62452046306d6298753042811', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });

  handler.openIframe();
}
</script>
</body>
</html>