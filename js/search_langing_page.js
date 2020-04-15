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
	
	$("#registro_form").validate({
		rules: {
		  nombre : {
			required: true,
			minlength: 3
		  },
		  apellido : {
			  required: true,
			  minlength: 3
		  },
		  celular: {
			required: true,
			number: true,
			min: 8
		  },
		  ci : {
			  required: true,
			  number: true,
			  min: 7
		  },
		  mail : {
			required: true,
			email: true
		  },
		  pass : {
			  required: true,
			  minlength: 5
		  }
		},
		  messages : {
			  nombre : {
				  required : "Ingrese su(s) nombre(s)",
				  minlength : "El nombre debe ser de al menos 3 caracteres"
			  },
			  apellido : {
				  required : "Ingrese su(s) apellido(s)",
				  minlength : "El nombre debe ser de al menos 4 caracteres"
			  },
			  celular : {
				  required : "Ingrese su teléfono celular",
				  number : "Ingrese sólo dígitos",
				  min : "Número inválido"
			  },
			  ci : {
				  required : "Ingrese su carnet",
				  number : "Ingrese sólo dígitos",
				  min : "C.I inválido"
			  },
			  mail : {
				  required : "Ingrese su correo electrónico",
				  email : "Formato debe ser: abd@dominio.extension"
			  },
			  pass : {
				  required : "Ingrese una contraseña",
				  minlength : "El tamaño debe ser de al menos 5 caracteres"
			  }
		  }
		  		
	});
});