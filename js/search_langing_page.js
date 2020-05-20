"use strict";
$(document).ready(function(){
    $("#button").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
		document.querySelector(".container-login100-form-btn").style.display = "none";
		document.querySelector(".login100-form-title2").style.display = "none";

    });
	
	$("#button_codigo").click(function(){
		document.querySelector(".bg-modal2").style.display = "flex";
	});
	
	$(".close").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		document.querySelector(".login100-form-title2").style.display = "flex";

	});
	
	$(".close2").click(function(){
		document.querySelector(".bg-modal2").style.display = "none";
		
	});
	
	$(".close_x").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		
	});
	
	
	$("#closse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		document.querySelector(".login100-form-title2").style.display = "flex";

	});
	
	$("#clossse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";

	});
	
	
	$("a.txt3").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
	});
	
	$("#btnopen").click(function(){
		openC();
		window.close();
	});
	
	function openC(){
		window.open("registroo.php");
	}
	
	$("#btnopen_recover").click(function(){
		openI();
		window.close();
	});
	
	function openI(){
		window.open("index.php");
	}
	
});