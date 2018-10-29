//----------------------------------
//   File          : js/pages/forms/form_wizard.js
//   Type          : JS file
//   Version       : 1.0.0
//   Last Updated  : April 4, 2017
//----------------------------------

// ---------------------------------
// Table of contents
// ---------------------------------
// 1. Basic form steps wizard
// 2. Add steps dynamically
// 3. AJAX form submit

function showNote(type, msg) {
    var notification = new Noty({
        type: type,
        layout: 'bottomRight',
        text: msg
    }).on('afterShow', function() {
		setTimeout(function() {
			notification.close();
		}, 3000);
	}).show();
}

$(function() {
	'use strict';
	// ---------------------------------
	// 1. Basic form steps wizard
	// ---------------------------------
	$(".form-basic").formwizard({
		disableUIStyles: true,
		disableInputFields: false,
		inDuration: 150,
		outDuration: 150,
		// validationEnabled: true,
		formOptions: {

		},
	});

	// Cancel the post
	$(".form-post-cancel").formwizard({
		disableUIStyles: true,
		disableInputFields: false,
		formPluginEnabled: true,
		inDuration: 150,
		outDuration: 150,
		formOptions: {
			success: function(data){
				swal({title: "Congratulations!", text: "You are registered now!", type: "success", timer: 2000, confirmButtonColor: "#43ABDB"})
			},
			dataType: 'json',
			resetForm: true,
			beforeSubmit: function(){
				return confirm("This is the beforeSubmit callback, do you want to submit?");
			},
			beforeSend: function(){
				return confirm("This is the beforeSend callback, do you want to submit?");
			},
			beforeSerialize: function(){
				return confirm("This is the beforeSerialize callback, do you want to submit?");
			}
		}
	});


	// ---------------------------------
	// 2. Add steps dynamically
	// ---------------------------------
	$(".form-add-steps").formwizard({
		disableUIStyles: true,
		disableInputFields: false,
		inDuration: 150,
		outDuration: 150
	});

	// Append step on button click
	$("#add-step").on('click', function(){
		$(".step-wrapper").append($(".extra-steps .step:first"));
		$(".form-add-steps").formwizard("update_steps");
		return false;
	});

	// Select2 selects
	$('.select').select2();

	// Simple select without search
	$('.select-simple').select2({
		minimumResultsForSearch: Infinity
	});

	// Styled checkboxes and radios
	$('.styled').uniform({
		radioClass: 'choice'
	});

	// Styled file input
	$('.file-styled-basic').uniform({
		fileButtonHtml: 'Browse'
	});

	var $validator = $('.form-basic form').validate({
		rules: {
			fname: {
				required: true,
				minlength: 3
			},
			lname: {
				required: true,
				minlength: 3
			},
			wives: {
				required: true
			},
			child: {
				required: true,
			},
			tribe: {
				required: true,
			},
		},
		// success: function(label) {
		// 	// set &nbsp; as text for IE
		// 	label.html("&nbsp;").addClass("checked");
		// },
		// highlight: function(element, errorClass) {
		// 	$(element).parent().next().find("." + errorClass).removeClass("checked");
		// }
	});

	$(".form-basic, .form-validation, .form-add-steps, .form-ajax").on("step_shown", function(event, data){
		$.uniform.update();
		console.log('loading data for on step_show');
		console.log(data);
		var $valid = $('.form-basic form').valid();
		if(!$valid) {
			return false;
		}
	});

	$(".form-basic, .form-validation, .form-add-steps, .form-ajax").on("before_step_shown", function(event, data){
		console.log('loading data for on before_step_shown');
		console.log(data);
		console.log('loading event for on before_step_shown');
		console.log(event);
		if(data.previousStep == "step1") {
			console.log("You are on step 1");
			var $valid = $('.form-basic form').valid();
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var oname = $('#oname').val();
			var wives = $('#wives').val();
			var child = $('#child').val();
			var tribe = $('#tribe').val();

			if(!fname && fname.length < 3) {
				showNote('warning', 'First name field is required!');
				$('#fname').focus();
				// $validator.focusInvalid();
				event.preventDefault();
				return false;
			}
			if(!lname && lname.length < 3) {
				showNote('warning', 'Last name field is required!');
				// $('#lname').focus();
				// $validator.focusInvalid();
				event.preventDefault();
				console.log('Last name validation failed.');
				return false;
			}
			if(!wives && typeof wives != "number") {
				showNote('warning', 'No. of wives field is required!');
				$('#wives').focus();
				return false;
			}
			if(!child && typeof child != "number") {
				showNote('warning', 'No. of children field is required!');
				$('#child').focus();
				return false;
			}
			if(!tribe && tribe.length < 3) {
				showNote('warning', 'Tribe field is required!');
				$('#tribe').focus();
				return false;
			}
		}
	});


	// ---------------------------------
	// 3. AJAX form submit
	// ---------------------------------
	$(".form-ajax").formwizard({
		disableUIStyles: true,
		formPluginEnabled: true,
		disableInputFields: false,
		inDuration: 150,
		outDuration: 150,
		formOptions :{
			success: function(data){
				swal({title: "Congratulations!", text: "You are registered now!", type: "success", timer: 2000, confirmButtonColor: "#43ABDB"})
			},
			beforeSubmit: function(data){
				$("#ajax-data").css({borderTop: '1px solid #ddd', padding: 15}).html("<span class='text-semibold'>Data sent to the server:</span> " + $.param(data));
			},
			dataType: 'json',
			resetForm: true
		}
	});
});
