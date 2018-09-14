$(document).ready(function()
{
	// This way, jQuery only has to select the element once
	var confirmation_checkbox = $(".toggle_confirmation");

	confirmation_checkbox.change(function()
	{
		toggle_attachment_field( $(this) );
	});

	$(".submit_button").click(function()
	{
		var form = $("#form_form").serialize();
		$.post("/forms/ajax_save_form",{form:form},function(data)
		{
			if (data.result == true)
			{
				window.location = "/forms/listing";
			}
			else
			{
				pretty_alert2({message : data.reason, url : ''});
			}

		},"json");
	});

	$(".check_box").each(function()
	{
		if ($(this).attr('correct_val') == $(this).val())
		{
			$(this).attr('checked','checked');
		}
	});


	$("#filesystem_browse").click(function()
	{
		load_filemanager();
	});


	// On page load
	toggle_attachment_field(confirmation_checkbox);

});

function toggle_attachment_field(selected_checkbox)
{
	var cust_eg_settings = $("#attachment_field");
	if (selected_checkbox.prop('checked'))
	{
		cust_eg_settings.slideDown();
	}
	else
	{
		cust_eg_settings.slideUp();
	}
}

// Initialize Dialog on '#file_manager_dialog'
function load_filemanager()
{
	if ($("#file_manager_dialog").length == 0)
	{
		$("body").append("<div id='file_manager_dialog'></div>");
		$("#file_manager_dialog").html("Loading...");
	}

	filemanager_dialog = $("#file_manager_dialog").dialog(
	{
		title: "File Manager",
		width: 1024,
		height: 768,
		modal: true,
	});

	$("#file_manager_dialog").dialog("option", "buttons", [
	{
		text: "Upload",
		click: function()
		{
			$("#upload_button").click();
		}
	},
	{
		text: "Close",
		click: function()
		{
			filemanager_dialog.dialog('close');
		}
	}]);

	//Load the file manager once, subsequent loads will keep the user in the same folder and prevent race conditions.
	if ($("#file_manager_dialog").html() == "Loading...")
	{
		$("#file_manager_dialog").load("/fileobjects/ftp?picker=true");
	}
}


// Trying out object literal notation based on jQuery's recommendation
// Object is wrapped in IIFE statement for scoping
var remove_attachment = (function()
{
	// Cache DOM selections. '$var_name' to signify that jQuery methods can be used
	var $form = $("#form_form"); // Only one DOM selection is made
	var $button = $form.find('#remove_attachment');
	var $name = $form.find('#fileobject_name');
	var $fileobject_id = $form.find('#fileobject_id');
	var $fileobjectsform_id = $form.find('#fileobjectsform_id');
	var $form_id = $form.find('#form_id');
	var $default_filename = $form.find('#default_filename');


	// Bind event(s)
	$button.on('click', removeAttachment);

	// Init. remove_attachment object is initialized on load
	_render();


	// '_methodName' signifies private method, not available to API
	function _render()
	{
		if (!_attachmentJustRemoved()) {
			$button.show();
		}
		else {
			// Split up for potential reusability and to keep them straight
			_removeFilename();
			_removeFileobjectsformId();
			$button.hide();
		}
	}

	function removeAttachment()
	{
		if (confirm("Are you sure you would like to remove this attachment?")) {
			_sendAjaxRequest($form_id.val());
		}

		// I wanted to put _render() here, but it has to occur after the AJAX call,
		// hence, it's included in $.post's callback.
	}

	// On success, removes fileobject_id & alerts
	// On fail, alerts error
	// Renders afterwards
	function _sendAjaxRequest(form_id)
	{
		$.post("/forms/ajax_delete_fileobjectsform",{form_id:form_id},function(data) {
			var msg = "";

			if (data.result === true) {
				msg = "Attachment removed successfully.";
				$fileobject_id.val("");
			}
			else {
				msg = data.reason;
			}

			pretty_alert2({message : msg, url : ''});
			_render();

		},"json");
	}

	function _attachmentJustRemoved()
	{
		if ($fileobject_id.val() === "") {
			return true;
		}
		return false;
	}

	function _removeFilename()
	{
		$name.html($default_filename.val());
	}

	function _removeFileobjectsformId()
	{
		$fileobjectsform_id.val("");
	}

	// provides API portion, method can be called in console
	return { removeAttachment: removeAttachment };
})();
