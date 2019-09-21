		$(document).ready(function(){


			  $(".stat-btn").click(function(){
			    $(".stat").removeClass("hidden");
			  });

			  
			  $(".data1").click(function(){
			    $(".stat,.forecast,.api").addClass("hidden");
			    $(".data").removeClass("hidden");
			  });


			  $(".api1").click(function(){
			    $(".stat,.forecast,.data").addClass("hidden");
			    $(".api").removeClass("hidden");
			  });


			  $(".forecast1").click(function(){
			    $(".stat,.data,.api").addClass("hidden");
			    $(".forecast").removeClass("hidden");
			  });

			  
		});