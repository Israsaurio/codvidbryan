
"use strict";
$(document).ready(function(){
    $("#button").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
        console.log("CLICK qui");
    });
	
	$(".close").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		console.log("CLOSE");
	});
	
	$("#closse").click(function(){
		document.querySelector(".bg-modal").style.display = "none";
		console.log("CLOSE");
	});
	
	$("a.txt3").click(function(){
		document.querySelector(".bg-modal").style.display = "flex";
        console.log("CLICK en nuevo registro");
	});
});