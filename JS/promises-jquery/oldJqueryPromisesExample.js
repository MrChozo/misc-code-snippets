// Courses.view
$(document).ready(function()
{
	/**
	 * Select DOM elements and assign defaults
	 */
	var form_locked = false;
	var adult_or_child = $(".adult_or_child");
	var participant_wrapper = $("#participant_wrapper");
	var sign_up_form = $("#sign_up_form");
	var sign_up_button = $("#sign_up_button");
	var form_and_button = $.extend({}, sign_up_form, sign_up_button);
	var how_did_you_hear_about_this_class = $("#how_did_you_hear_about_this_class");
	var how_did_you_hear_about_this_class_other = $("#how_did_you_hear_about_this_class_other");


	/**
	 * Event listeners
	 */
	$("#submit_button").click(function(e) {
		e.preventDefault();

		if (!lock_form()) {
			return false;
		}

		if (!$("#party_form").valid()) {
			unlock_form();
			alert("You missed one or more required fields. Please fill them out before submitting this form");
			return false;
		}

		var form = $("#party_form").serialize();

		$.post("/courses/ajax_submit_registration",{form:form},function(data) {
			if (data.result == true) {
				window.location = data.url;
			}
			else {
				unlock_form();
				alert(data.reason);
			}
		},"json");
	});

	$("#add_participant").click(function() {
		var html = $("#member_template").html();
		participant_wrapper.append(html);
	});

	participant_wrapper.on("click", ".delete_participant", function() {
		if ($(".member_wrapper").size() == 1) {
			alert("You cannot delete the last member of a party");
		}
		else {
			if (confirm("Are you sure you want to delete this participant?")) {
				$(this).parent(".member_wrapper").remove();
			}
		}
	});

	participant_wrapper.on("change", ".adult_or_child", function() {
		var element = $(this);
		var selected = element.val();
		toggleAgeWrapper(selected, element);
	});

	sign_up_button.click(function() {
		var form_top = $("#form_top").position().top;

		// Animations for showing form
		sign_up_form.slideDown();
		sign_up_button.fadeOut();



		/*
		 * VVVVVVVVVVVVVVV  PROMISE HEEEEEEEEEEEEEERE  VVVVVVVVVVVVVVVVVVVV
		 * VVVVVVVVVVVVVVV  PROMISE HEEEEEEEEEEEEEERE  VVVVVVVVVVVVVVVVVVVV
		 * VVVVVVVVVVVVVVV  PROMISE HEEEEEEEEEEEEEERE  VVVVVVVVVVVVVVVVVVVV
		 */


		// Waits for both form and button's animations to finish
		form_and_button.promise().done(function() {
			$("html, body").animate({scrollTop: form_top});
		});
	});

	$(".privacy_policy").click(function() {
		$("#privacy_policy_dialog").dialog({
			modal: true,
			fluid: true,
			width: '33%',
			title: 'Privacy Policy',
			buttons:
			{
				Ok: function()
				{
					$( this ).dialog( "close" );
				}
			}
		});
	});

	how_did_you_hear_about_this_class.change(toggleOtherInput);


	/**
	 * Executed on page load
	 */
	$("#spinner").hide();
	$("#phone").mask("(999) 999-9999");


	/**
	 * Assign functions
	 */
	function toggleAgeWrapper(selected, element) {
		if (selected == "Adult") {
			element.parent().parent(".member_wrapper").find(".age_wrapper").slideUp();
		}
		else {
			element.parent().parent(".member_wrapper").find(".age_wrapper").slideDown();
		}
	}

	function toggleOtherInput() {
		if ($(this).val() == "Other") {
			how_did_you_hear_about_this_class_other.slideDown();
		}
		else {
			how_did_you_hear_about_this_class_other.slideUp();
		}
	}

	function lock_form() {
		if (form_locked) {
			return false;
		}
		else {
			form_locked = true;
			$("#spinner").fadeIn();
			$("#submit_button").addClass('button_clicked');
			return true;
		}
	}

	function unlock_form() {
		form_locked = false;
		$("#spinner").fadeOut();
		$("#submit_button").removeClass('button_clicked');
	}
});
