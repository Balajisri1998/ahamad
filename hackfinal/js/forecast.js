
	 	function test(){
	 		console.log();
	 		var content=contentt;
	 		document.getElementById("content").innerHTML = content; 
	 		// alert("it works");
	 	}
	 	function myFunction() {
		  var x = document.getElementById("change");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		} 
	 	$(window).load(function(){
	 		$(".li:first").addClass("highlight")
	 	});
        $(document).ready(function() { 
        	$(".li").click(function(){
	            $(this).siblings().removeClass("highlight")
	            $(this).addClass("highlight")
	        });
	        console.log("jdhg");
	        $("#period").change(function(){
	        	console.log("helo");
		        var selectedOption = $(this).children("option:selected").val();
		        $("#change").toggle();
		        console.log("helo");
		       
		        
		    });

        }); 


        var app = angular.module("app", ["ngRoute"]);
		app.config(function($routeProvider) {
		    $routeProvider
		    .when("/", {
		        templateUrl : "forecast.html"
		    })
		    .when("/Data", {
		        templateUrl : "data.html"
		    })
		    .when("/ForeCast", {
		        templateUrl : "forecast.html"
		    })
		    .when("/API", {
		        templateUrl : "api.html"
		    });
		});
        