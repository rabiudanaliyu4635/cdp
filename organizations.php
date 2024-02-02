<?php 
session_start();
include_once("config.php");

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Project Details</title>
	<link rel="icon" type="image/x-icon" href="icons\favi.ico">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/site.css">
	<link rel="stylesheet" type="text/css" href="nucleo/css/nucleo.css">
	<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	<style>main {
  margin-left: 300px;
}</style>
</head>
<body class="d-flex flex-column min-vh-100">
<?php include("admin.php"); ?>
	<div class="wrapper flex-grow-1">
		<main>
			<div class="container mb-3">
				<div class="mb-0 ">
					
					<div class="animate__animated animate__fadeInDown">
						<h1>
						  <span>Philanthropy Organizations : </span>
						</h1>
						<hr>
					</div>
					
					<br>
					<div class="row center-block animate__animated animate__fadeIn animate__delay-1s">
						<div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/dro.png" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Da'awah & Relief Oganization, Gombe</h5>
						    <p class="card-text">
								A faith based, non profit and non political organization established for Islamic evangelism and for assistance to orphans, vulnerable and less previlage. 
						    </p>
						  </div>
						</div>
						<div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/jibwis.jpg" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Jama'atul Izalatil Bid'ah Wa'iqamatis Sunnah (JIBWIS)</h5>
						    <p class="card-text">
								Izala Society or Jama'atu Izalatil Bid’ah Wa Iqamatus Sunnah, also known as JIBWIS, is a Salafi movement originally established in Northern Nigeria to fight what it sees as the bid'ah practiced by the Sufi brotherhoods. <br>
								JIBWIS is also a non-profit and less previlage organization committee. 
						    </p>
						  </div>
						</div>
                        <div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/zkwq.jpeg" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Zakah & Waqaf Foundation</h5>
						    <p class="card-text">
								Zakah and Waqf Foundation Gombe is a non-governmental, not-for-profit organization established in the year 2018. It mobilizes resources from zakah payers and other donors who are willing to channel their charities for proper disbursement to the poor in a manner that alleviates their poverty, uplifts their living standards and puts them on the path of socio-economic empowerment. 
						    </p>
						  </div>
						</div>
						<hr>
					</div>
					<br>
                    <div class="row center-block animate__animated animate__fadeIn animate__delay-1s">
						<div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/arewarmu.png" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Arewarmu Duniyarmu Humanatrian Organization</h5>
						    <p class="card-text">
								Arewarmu Duniyarmu Association of Nigeria is a regional non-governmental organization aimed at fostering and promoting youth development, women empowerment, community development and advocating for good governance and development in the Northern Region and Nigeria at large. 
						    </p>
						  </div>
						</div>
						<div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/sfh.png" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Society for Family Health</h5>
						    <p class="card-text">
                                Society for Family Health is one of Nigeria’s largest non-governmental organisations. Founded in 1985.<br>

                                Society for Family Health Nigeria has a mission to empower Nigerians, particularly the poor and vulnerable to lead healthier lives. 
						    </p>
						  </div>
						</div>
                        <div class="card mx-auto btncmn" style="width: 18rem;">
						  <img class="card-img-top" src="assets/images/fspch.png" width="286" height="150" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-center">Family Support Programme Children Home</h5>
						    <p class="card-text">
								Family Support Programme Childrens Home is categorized under NGOs, Nonprofit / Charity Organisations, Orphanages. 
						    </p>
						  </div>
						</div>
						<hr>
					</div>
					
				</div>			
				<br>
			
			<br>
		</main>
	</div>
	<footer class="text-center text-light bg-dark">
		Copyright © 2020 charity Donations Platform<br>
		<a href="mailto:info@huhu.com.my">info@cdp.com.my</a>
	</footer>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
			var dataTab = document.getElementById('rp-table');
		function rpDetails(oButton){
			console.log(dataTab);
			console.log(dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells[0].innerHTML);
			var length = dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells.length;
			var tableData = new Array(dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells.length - 1);
			for (var i = 0; i < length - 1; i++) {
		        tableData[i] = dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells[i].innerHTML;
		        console.log(tableData[i]);
		    }
		    // get tableData[0] / report ID
		    //show report based on report ID
		}

		function deleteRow(oButton){
			console.log(dataTab);
			console.log(dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells[0].innerHTML);
			var length = dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells.length;
			var tableData = new Array(dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells.length - 1);
			for (var i = 0; i < length - 1; i++) {
		        tableData[i] = dataTab.rows[oButton.parentNode.parentNode.rowIndex].cells[i].innerHTML;
		        console.log(tableData[i]);
		    }
		    var boolConfirm = confirm("Confirm Delete ?");
		    if(boolConfirm == true){
		    	dataTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.
		    }
		}
		var dataTab2 = document.getElementById('vol-table');
		function deletevol(){
			  var txt;
			  var r = confirm("Are you sure you want to remove this volunteer from the project?");
			  if (r == true) {
			    deleteProcess();
			  }else {
			  	return false;
			  }
		}
		function deleteProcess(username,pw){
				// checkDB
				// if Y -> menu
				// if F -> alert
				window.location.href = 'project-details.php';
		}

		$(document).ready(function(){
				
			});
			function upd_info(){
				$('#pj-time').prop('disabled',false);
				$('#pj-date').prop('disabled',false);
				$('#pj-obj').prop('disabled',false);
				$('#pj-loc').prop('disabled',false);
				$('#pj-dur').prop('disabled',false);
			}
			function info_submit(){
				$('#pj-time').prop('disabled',true);
				$('#pj-date').prop('disabled',true);
				$('#pj-obj').prop('disabled',true);
				$('#pj-loc').prop('disabled',true);
				$('#pj-dur').prop('disabled',true);

				upd_data();
			}
			function upd_data(){
				// update DB
			}


	</script>

</body>
</html>