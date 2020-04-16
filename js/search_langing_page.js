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
	
	$("#closse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		document.querySelector(".container-login100-form-btn").style.display = "flex";
		document.querySelector(".login100-form-title2").style.display = "flex";

		console.log("CLOSE");
	});
	
	$("a.txt3").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
        console.log("CLICK en nuevo registro");
	});
	
	
});