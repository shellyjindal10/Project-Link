
<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<script src ="../lib/js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../css/SplitsWise.css" media="screen" />	
		<script src="../js/SplitsWisePage.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/alertPlugins/jquery.bootstrap-growl.min.js"></script>
		
       <script type="text/javascript">
                var count = 0;
                var money = 0;
			    function myFunction() {
    									$("#Model-Body-hidden").show();
    									$("#lineAfterHeader").show();
				}
				function myFunction2() {
										$("#Model-Body-hidden2").show();
				}
				function submit(){ // verification can be called in this funciton. 
					return false;
				}
				function emailVerfication(emailAddress){
					var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    			return pattern.test(emailAddress);
				}
				$(document).ready(function() {
									console.log('Inside the document.ready');
									$('#mytextInputType').keypress(function (event) {
									         							            var keycode = (event.keyCode ? event.keyCode : event.which);
                                                                                    money = $('#billAmountTextInputType').val();                                                        
                                                                                                        
                                                                                                        
																					if(keycode == '13'){
																					                  var txtVal = $("#mytextInputType").val();
																									  if (txtVal.indexOf(',') != -1) {
																									  	              var match = txtVal.split(',');
																													  for (var a in match){
																															  	if(!emailVerfication(match[a])){
																															  		$('#mytextInputType').css("border","2px solid red");
																															  		$.bootstrapGrowl("enter a valid email id ");
																															  	}else{
																															  		$('#mytextInputType').css("border", "#DCDCDC solid 1px");
																															  	}
																													   }
																													   
																										               count = 2;
    																												   var commas_count = (txtVal.match(/,/g) || []).length;
    																												   count = count+commas_count;
    																												   money = money /count;
    																												   document.getElementById("amount_distributed").innerHTML = "($"+parseInt(money)+".00/person)";

																									  }else{
																											if(emailVerfication(txtVal)){
																												$('#mytextInputType').css("border", "#DCDCDC solid 1px");
																												if (money){
																														count = 1;
    																													money = money /2;
    																										     		document.getElementById("amount_distributed").innerHTML = "($"+parseInt(money)+".00/person)";
																												}
																											}else{
																													$.bootstrapGrowl("Enter a valid email address");
																													$('#mytextInputType').css("border","2px solid red");
																											}
																										}
																					}
				            		});
            								
             						$("#bill-paidBy-you").click(function(){
             														$.bootstrapGrowl("The paragraph was clicked.");
  									});
            	});
			   
		</script>
			
</head>
<body id="homePageBackground">
            
        <div id="main_container">
        		<div id="header_main_container">
        		      <div id="hi_container">
        		      		<p class="hi">hi!</p>
                 	  </div>
                 	  <div id="serach_box">
                 	  		<form id="search_box_form" method="post" action="../php/search.php">
                 	  			<input type="text" class="search_box" name="search_input_box" size="21" maxlength="120">
                 	  			<input type="submit" value="search" class="searchbutton">
                 	  			<a href ="../php/advancedSearch.php" title="advancedSearch" class="avancedSearch"><p id="advaced_fonting">Advanced</p></a>
                 	  		</form>
                 	  </div>                  
        		</div>
        		<div id="header_sub_container" class="navbar">
        				<div class="navbar-inner">
        		            <ul class="nav nav-pills">
        		             	<li ><a href="../php/homeClick.php" tite="header_home" id="header_home">Home</a></li>
			        		    <li class="active">
			        		    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			        		    		Profile - Splits Wise
			        		    	</a>
			        		    	
			        		    </li>
			        			<li class="dropdown">
			        				<a class="dropdown-toggle" data-toggle="dropdown" href ="#">
			        					Photos<b class="caret"></b>
			        				</a>
			        				<ul class="dropdown-menu">
			        				    <li><a href ="../php/photos.php?user=<?php echo $_SESSION['login_username'];?>">View Photos</a></li>
			        			 		<li><a href="../php/imageGallery.php?user=<?php echo $_SESSION['login_username'];?>">Image Gallery</a></li>
			        				</ul>
			        			</li>
			        			<li><a href="../php/friends.php?user=<?php echo $_SESSION['login_username'];?>">Friends</a></li>
			        		</ul>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
			        		</div>
        		</div> 
       </div>

       <!-- the Concept of Splits Wise starts here -->
       <div class="well" id="buttonsForSplitsWise">
       			<button class="btn btn-danger">
       				<a data-toggle="modal" href="#myAddBillModel">
       					Add a Bill
       				</a>
       			</button>
       			<button class="btn" id="settleUpBTN">
       				<a data-toggle="modal" href="#mySettleUPModel">
       					Settle up
       				</a>
       			</button>
       </div>

       <!-- Add Bill Model -->
      <div class="modal fade" id="myAddBillModel" tabinex="-1" role="dialog" aria-hidden="true">
      	<div class="modal-dailog">
      		<div class="modal-content">
      			<div class="model-header">
      				<div class="addBillHeaderTitle">
      					<h3 class="headerMainHeader">Add a Bill
      					<button type="button" class="close" data-dismiss="modal" > &times;</button></h3>
      			    </div>

      			    <div class="addBillHeaderBody">      			    
								With you and : <input type="text" name="usrname" placeholder="Enter names or email addresses" id="mytextInputType" onkeyup="myFunction()"><br>
      			    </div>
      			    <hr id="lineAfterHeader">
      			</div>
      			<div class="modal-body" id="Model-Body-hidden">
      					<div class="bill-icon">
      						<img src="../image/bill-icon.png" width="100%" height="100%"/>
      						<div class="bill-description">
      						 			<input type="text" name="usrname" placeholder="Enter a description" id="billDescriptiontextInputType">
      						 			<hr id="broken_bill_description_line">
      						</div>
      						<div class="bill-amount">
      									<input type="text" name="usrname" placeholder="$ 0.00" id="billAmountTextInputType">
      									<hr id="broken_bill_amount_line">
      						</div>
      						<div class="bill_paid_By">
      									<p>Paid by <span style="color:blue;" id="bill-paidBy-you">you</span> and <span style="color:blue;" id="bill-paidBy-splitsEqually">split equally</span></p>
      						</div>
      						<div class="bill_splits_amounts">
      						             <p id="amount_distributed">($0.00/person)</p>
      						</div>
      					</div>
      		    </div>
      		    <div class="modal-footer">
      		    		<button type="button" class="btn" data-dismiss="modal">Close</button>
      		    		<button type="button" class="btn btn-primary" id="addtheFinalBillButton">Add</button>
      		    </div>
      		</div>
      	</div>
      </div>
      <!--End of Bill Model-->

      <!--Settle Up Model -->
      <div class="modal fade" id="mySettleUPModel" tabinex="-1" role="dialog" aria-hidden="true">
      	<div class="modal-dailog">
      		<div class="modal-content">
      			<div class="model-header">
      					<div class="addBillHeaderTitle">
      						<h4 class="headerMainHeader">Settle Up The Bill
      						<button type="button" class="close" data-dismiss="modal" > &times;</button></h4>      						
      					</div>
      					<div class="addBillHeaderBody">      			    
	      			    	<form action="#">
									With you and : <input type="text" name="usrname" placeholder="Enter names or email addresses" id="mytextInputType" onkeyup="myFunction2();"><br>
							</form>
      			    	</div>
      			    	<hr id="lineAfterHeader">  					
      			</div>
      			<div class="modal-body" id="Model-Body-hidden2">
      					<p>Type your bill setllement information here </p>
      		    </div>
      		    <div class="modal-footer">
      		    		<button type="button" class="btn" data-dismiss="modal">Cancel</button>
      		    		<button type="button" class="btn btn-primary">Add</button>
      		    </div>
      		</div>
      	</div>
      </div>



</body>
</html>