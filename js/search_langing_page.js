"use strict";
$(document).ready(function(){
    $("#button").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
		document.querySelector(".container-login100-form-btn").style.display = "none";
		document.querySelector(".login100-form-title2").style.display = "none";

        console.log("CLICK qui");
    });
	
	$(".close").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		document.querySelector(".login100-form-title2").style.display = "flex";

		console.log("CLOSE");
	});
	
	$(".close_x").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		
		console.log("CLOSE re correo");
	});
	
	
	$("#closse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		document.querySelector(".login100-form-title2").style.display = "flex";

		console.log("CLOSE 3");
	});
	
	$("#clossse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";

		console.log("CLOSE 4");
	});
	
	
	$("a.txt3").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
        console.log("CLICK en nuevo registro");
	});
	
	$("#btnopen").click(function(){
		openC();
	});
	
	function openC(){
		console.log("HERE 2");
		window.open("registro.html");
	}
	
});