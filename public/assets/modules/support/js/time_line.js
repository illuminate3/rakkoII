$(function () {
	$("#InternalContent").wysihtml5();
});

jQuery('.star').attr('disabled', true);

$(function () {
// $('#cand').wysihtml5();
var wysihtml5Editor = $('#reply_content').wysihtml5().data("wysihtml5").editor;

$('#select').on('change', function (e) {

//alert('hello2');
var $_token = $('#token').val();
var data = $('#select').val();

//var data1 = $(this).children('option:selected').data('id');
//alert('data1');
$.ajax({
type        :   "POST",
cache   :   false,
headers :   { 'X-XSRF-TOKEN' : $_token },
url         :   "agent/canned/"+ data,
dataType    :   'json',
data        :   ({data}),

success : function(response) {

	// alert(response);
	wysihtml5Editor.setValue(response, true);
	console.log(wysihtml5Editor.getValue());
}
});

return false;
});
});



$(function() {
$( "#tags, #tags2" ).autocomplete({
source: 'auto/<?php echo $tickets->id; ?>'
});
});

$(document).ready(function () {

//Initialize Select2 Elements
$(".select2").select2();

setInterval(function(){
$("#auto-submit").submit(function(){
$.ajax({
	type: "POST",
	url: "{!! url('agent/lock') !!}",
})
return false;
});
},180000);
});



jQuery(document).ready(function() {
// Close a ticket
$('#close').on('click', function(e) {
$.ajax({
	type: "GET",
	url: "agent/ticket/close/{{ $tickets->id}}",
	beforeSend: function() {
		$("#hidespin").hide();
		$("#spin").show();
		$("#hide2").hide();
		$("#show2").show();
	},
	success: function(response) {
		$("#refresh").load("agent/thread/{{ $tickets->id}}   #refresh");
		$("#show2").hide();
		$("#spin").hide();
		$("#hide2").show();
		$("#hidespin").show();
		$("#d1").trigger("click");
		var message = "Success! Your Ticket have been Closed";
		$("#alert11").show();
		$('#message-success1').html(message);
		setInterval(function(){
			$("#alert11").hide();
			setTimeout(function() {
				// var link = document.querySelector('#load-inbox');
				// if(link) {
				//     link.click();
				// }
				history.go(-1);
			}, 500);
		},2000);
	}
})
return false;
});

// Resolved  a ticket
$('#resolved').on('click', function(e) {
$.ajax({
	type: "GET",
	url: "agent/ticket/resolve/{{ $tickets->id}}",
	beforeSend: function() {
		$("#hide2").hide();
		$("#show2").show();
	},
	success: function(response) {
		$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
		$("#d1").trigger("click");
		$("#hide2").show();
		$("#show2").hide();
		var message = "Success! Your Ticket have been Resolved";
		$("#alert11").show();
		$('#message-success1').html(message);
		setInterval(function(){$("#alert11").hide();
			setTimeout(function() {
				// var link = document.querySelector('#load-inbox');
				// if(link) {
				//     link.click();
				// }
				history.go(-1);
			}, 500);
		},2000);
	}
})
return false;
});

// Open a ticket
$('#open').on('click', function(e) {
$.ajax({
	type: "GET",
	url: "agent/ticket/open/{{ $tickets->id}}",
	beforeSend: function() {
		$("#hide2").hide();
		$("#show2").show();
	},
	success: function(response) {
		$("#refresh").load("agent/thread/{{ $tickets->id}}   #refresh");
		$("#d1").trigger("click");
		$("#hide2").show();
		$("#show2").hide();
		var message = "Success! Your Ticket have been Opened";
		$("#alert11").show();
		$('#message-success1').html(message);
		setInterval(function(){$("#alert11").hide(); },4000);

	}
})
return false;
});

// delete a ticket
$('#delete').on('click', function(e) {
$.ajax({
	type: "GET",
	url: "agent/ticket/delete/{{ $tickets->id}}",
	beforeSend: function() {
		$("#hide2").hide();
		$("#show2").show();
	},
	success: function(response) {
		$("#refresh").load("agent/thread/{{ $tickets->id}}   #refresh");
		$("#d2").trigger("click");
		$("#hide2").show();
		$("#show2").hide();
		var message = "Success! Your Ticket have been moved to Trash";
		$("#alert11").show();
		$('#message-success1').html(message);
		setInterval(function(){$("#alert11").hide();
			setTimeout(function() {
				// var link = document.querySelector('#load-inbox');
				// if(link) {
				//     link.click();
				// }
				history.go(-1);
			}, 500);
		},2000);
	}
})
return false;
});

// ban email
$('#ban').on('click', function(e) {
$.ajax({
	type: "GET",
	url: "agent/email/ban/{{ $tickets->id}}",
	success: function(response) {
		$("#dismis2").trigger("click");
		$("#refresh").load("agent/thread/{{ $tickets->id}}   #refresh");
		var message = "Success! This Email have been banned";
		$("#alert11").show();
		$('#message-success1').html(message);
		setInterval(function(){$("#alert11").hide(); },4000);
	}
})
return false;
});

// internal note
// $('#internal').click(function() {
//     $('#t1').hide();
//     $('#t2').show();
// });

// comment a ticket
// $('#aa').click(function() {
//     $('#t1').show();
//     $('#t2').hide();
// });

// Edit a ticket
$('#form').on('submit', function() {
$.ajax({
	type: "POST",
	url: "agent/ticket/post/edit/{{ $tickets->id}}",
	dataType: "html",
	data: $(this).serialize(),
	beforeSend: function() {
		$("#hide").hide();
		$("#show").show();
	},
	success: function(response) {
		$("#show").hide();
		$("#hide").show();

		if (response == 0) {
			message = "Ticket Updated Successfully!"
			$("#dismis").trigger("click");
			$("#refresh1").load("agent/thread/{{ $tickets->id}}   #refresh1");
			$("#refresh2").load("agent/thread/{{ $tickets->id}}   #refresh2");
			$("#alert11").show();
			$('#message-success1').html(message);
			setInterval(function(){$("#alert11").hide(); },4000);
		}
		else if (response == 1) {
			$("#error-subject").show();
		}
		else if (response == 2) {
			$("#error-sla").show();
		}
		else if (response == 3) {
			$("#error-help").show();
		}
		else if (response == 4) {
			$("#error-source").show();
		}
		else if (response == 5) {
			$("#error-priority").show();
		}
	}
})
return false;
});

// Assign a ticket
$('#form1').on('submit', function() {
$.ajax({
	type: "POST",
	url: "agent/ticket/assign/{{ $tickets->id }}",
	dataType: "html",
	data: $(this).serialize(),
	beforeSend: function() {
		$("#assign_body").hide();
		$("#assign_loader").show();
	},
	success: function(response) {
		if(response == 1)
		{
			// $("#assign_body").show();
			// var message = "Success";
			// $('#message-success1').html(message);
			// setInterval(function(){$("#alert11").hide(); },4000);

			var message = "Success!";
			$("#alert11").show();
			$('#message-success1').html(message);
			setInterval(function(){$("#dismiss11").trigger("click"); },2000);
		}
		$("#assign_body").show();
		$("#assign_loader").hide();
		$("#dismis4").trigger("click");
		// $("#RefreshAssign").load( "agent/thread/{{ $tickets->id}} #RefreshAssign");
		// $("#General").load( "agent/thread/{{ $tickets->id}} #General");
	}
})
return false;
});


// Change owner of a ticket
$('#form4').on('submit', function() {
$.ajax({
	type: "POST",
	url: "agent/change-owner/{{ $tickets->id }}",
	dataType: "html",
	data: $(this).serialize(),
	beforeSend: function() {
		$("#change_body").hide();
		$("#change_loader").show();
	},
	success: function(response) {
		if(response != 1)
		{
			// $("#assign_body").show();
			 var message = "{{ trans('kotoba::helpdesk.user-not-found') }}";
			$('#change_alert').show();
			$('#message-success42').html(message);
			setInterval(function(){$("#change_alert").hide(); },5000);
			$("#change_body").show();
			$("#change_loader").hide();


		} else {
			$("#change_body").show();
			$("#change_loader").hide();
			$("#dismis42").trigger("click");
			// $("#RefreshAssign").load( "agent/thread/{{ $tickets->id}} #RefreshAssign");
			// $("#General").load( "agent/thread/{{ $tickets->id}} #General");
			$("#hide2").load("agent/thread/{{ $tickets->id}}  #hide2");
			$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
			$("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
			$("#refresh3").load("agent/thread/{{ $tickets->id}}  #refresh3");
			$("#refreshTo").load("agent/thread/{{ $tickets->id}}  #refreshTo");
			$("#change-refresh").load("agent/thread/{{ $tickets->id}}  #change-refresh");
			var message = "{{ trans('kotoba::helpdesk.change-success') }}";
			$("#alert11").show();
			$('#message-success1').html(message);
			setInterval(function(){$("#alert11").hide(); },4000);

		}
	}
})
return false;
});


// Add and change owner of a ticket
$('#change-add-owner').on('submit',function(){
$.ajax({
	type: "POST",
	url: "agent/change-owner/{{ $tickets->id }}",//url: "agent/add-user",
	dataType: "html",
	data: $(this).serialize(),
	beforeSend: function() {
		$('#add-change-loader').show();
		$('#add-change-body').hide();
	},
	success: function(response) {
		if(response == 1){
			$('#add-change-loader').hide();
			$('#add-change-body').show();
			$("#close101").trigger("click");
			$("#hide2").load("agent/thread/{{ $tickets->id}}  #hide2");
			$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
			$("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
			$("#refresh3").load("agent/thread/{{ $tickets->id}}  #refresh3");
			$("#refreshTo").load("agent/thread/{{ $tickets->id}}  #refreshTo");
			var message = "{{ trans('kotoba::helpdesk.change-success') }}";
			$("#alert11").show();
			$('#message-success1').html(message);
			setInterval(function(){$("#alert11").hide(); },4000);
		} else {
			if(response == 4){
				var message = "{{ trans('kotoba::helpdesk.user-exists') }}";
			} else if(response == 5){
				var message = "{{ trans('kotoba::helpdesk.valid-email') }}";
			} else {
				//var message = "Can't process your request. Try after some time.";
			}
			$('#change_alert2').show();
			$('#message-success422').html(message);
			setInterval(function(){$("#change_alert2").hide(); },8000);
			$('#add-change-loader').hide();
			$('#add-change-body').show();


		}
	}
})
return false;
});


// Internal Note
$('#form2').on('submit', function() {
$.ajax({
	type: "POST",
	url: "agent/internal/note/{{ $tickets->id }}",
	dataType: "html",
	data: $(this).serialize(),
	beforeSend: function() {
		$("#t2").hide();
		$("#show5").show();

	},
	success: function(response) {

		if (response == 1)
		{
			$("#refresh1").load("agent/thread/{{ $tickets->id}}   #refresh1");
			// $("#t4").load("agent/thread/{{ $tickets->id}}   #t4");
			var message = "Success! You have successfully replied to your ticket";
			$("#alert21").show();
			$('#message-success2').html(message);
			setInterval(function(){$("#alert21").hide();  },4000);

			 $("#newtextarea").empty();
			var div = document.getElementById('newtextarea');
			div.innerHTML = div.innerHTML + '<textarea style="width:98%;height:200px;" name="reply_content" class="form-control" id="reply_content"/></textarea>';

			$("#newtextarea1").empty();
			var div1 = document.getElementById('newtextarea1');
			div1.innerHTML = div1.innerHTML + '<textarea style="width:98%;height:200px;" name="InternalContent" class="form-control" id="InternalContent"/></textarea>';

			var wysihtml5Editor = $('textarea').wysihtml5().data("wysihtml5").editor;
		} else {
			// alert('fail');
			var message = "Fail! For some reason your message was not posted. Please try again later";
			$("#alert23").show();
			$('#message-danger2').html(message);
			setInterval(function(){$("#alert23").hide(); },4000);
			// $( "#dismis4" ).trigger( "click" );
		}
		$("#t2").show();
		$("#show5").hide();
	}
})
return false;
});

// Ticket Reply
$('#form3').on('submit', function() {
var fd = new FormData(document.getElementById("form3"));
$.ajax({
	type: "POST",
	url: "agent/thread/reply/{{ $tickets->id }}",
	enctype: 'multipart/form-data',
	dataType: "html",
	data: fd,
	processData: false,  // tell jQuery not to process the data
	contentType: false ,  // tell jQuery not to set contentType
	beforeSend: function() {

		$("#t1").hide();
		$("#show3").show();
	},

	success: function(response) {

		if (response == 1)
		{
			$("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
			// $("#t1").load("agent/thread/{{ $tickets->id}}  #t1");
			var message = "Success! You have successfully replied to your ticket";
			$("#alert21").show();
			$('#message-success2').html(message);
			setInterval(function(){$("#alert21").hide(); },4000);
			// var wysihtml5Editor = $('textarea').wysihtml5().data("wysihtml5").editor;
			$("#newtextarea").empty();
			var div = document.getElementById('newtextarea');
			div.innerHTML = div.innerHTML + '<textarea style="width:98%;height:200px;" name="reply_content" class="form-control" id="reply_content"/></textarea>';

			$("#newtextarea1").empty();
			var div1 = document.getElementById('newtextarea1');
			div1.innerHTML = div1.innerHTML + '<textarea style="width:98%;height:200px;" name="InternalContent" class="form-control" id="InternalContent"/></textarea>';

			var wysihtml5Editor = $('textarea').wysihtml5().data("wysihtml5").editor;
		} else {
			// alert('fail');
			// $( "#dismis4" ).trigger( "click" );
			var message = "Fail! For some reason your reply was not posted. Please try again later";
			$("#alert23").show();
			$('#message-danger2').html(message);
			setInterval(function(){$("#alert23").hide(); },4000);
		}
		$("#show3").hide();
		$("#t1").show();
	}
})
return false;
});

// Surrender
$('#Surrender').on('click', function() {
$.ajax({
	type: "GET",
	url: "agent/ticket/surrender/{{ $tickets->id }}",
	success: function(response) {

		if (response == 1)
		{
			// alert('ticket has been un assigned');
			var message = "Success! You have Unassigned your ticket";
			$("#alert11").show();
			$('#message-success1').html(message);
			setInterval(function(){$("#dismiss11").trigger("click"); },2000);
			// $("#refresh1").load( "http://localhost/faveo/public/thread/{{ $tickets->id}}   #refresh1");
			$('#surrender_button').hide();
		}
		else
		{
			var message = "Fail! For some reason your request failed";
			$("#alert13").show();
			$('#message-danger1').html(message);
			setInterval(function(){$("#dismiss13").trigger("click"); },2000);
			// alert('fail');
			// $( "#dismis4" ).trigger( "click" );
		}
		$("#dismis6").trigger("click");
	}
})
return false;
});

$("#search-user").on('submit',function(e) {
	$.ajax({
	type: "POST",
	url: "agent/search-user",
	dataType: "html",
	data: $(this).serialize(),

	beforeSend: function() {
		$('#show7').show();
		$('#hide1234').hide();
	},
	success: function(response) {
		$('#show7').hide();
		$('#hide1234').show();
		$('#here').html(response);
		$("#recepients").load("agent/thread/{{ $tickets->id}}   #recepients");
		$("#surrender22").load("agent/thread/{{ $tickets->id}}   #surrender22");

	}
})
return false;
});


$("#add-user").on('submit',function(e) {
	$.ajax({
	type: "POST",
	url: "agent/add-user",
	dataType: "html",
	data: $(this).serialize(),

	 beforeSend: function() {
		$('#show8').show();
		$('#hide12345').hide();
	},
	success: function(response) {
		$('#show8').hide();
		$('#hide12345').show();

	$('#here2').html(response);
	$("#recepients").load("agent/thread/{{ $tickets->id}}   #recepients");
	$("#surrender22").load("agent/thread/{{ $tickets->id}}   #surrender22");
	}
})
return false;
});

// checking merge
$('#MergeTickets').on('show.bs.modal', function (id) {
$.ajax({
	type: "GET",
	url: "agent/check-merge-ticket/{{ $tickets->id }}",
	dataType: "html",
	data:$(this).serialize(),
	beforeSend: function() {
		$("#merge_body").hide();
		$("#merge_loader").show();
	},
	success: function(response) {
		if(response == 0) {
			$("#merge_body").show();
			$("#merge-succ-alert").hide();
			$("#merge-body-alert").show();
			$("#merge-body-form").hide();
			$("#merge_loader").hide();
			$("#merge-btn").attr('disabled', true);
		   var message = "{{ trans('kotoba::helpdesk.no-tickets-to-merge') }}";
			$("#merge-err-alert").show();
			$('#message-merge-err').html(message);

		} else {
			$("#merge_body").show();
			$("#merge-body-alert").hide();
			$("#merge-body-form").show();
			$("#merge_loader").hide();
			$("#merge-btn").attr('disabled', false);
			$("#merge_loader").hide();
			$.ajax({
				url: "agent/get-merge-tickets/{{ $tickets->id}}",
				type: 'GET',
				data: $(this).serialize(),
				success: function(data) {

					$('#select-merge-tickts').html(data);
				}
				// return false;
			});
		}
	}
});
});

//submit merging form
$('#merge-form').on('submit', function(){
$.ajax({
		type: "POST",
		url: "agent/merge-tickets/{{ $tickets->id }}",
		dataType: "html",
		data: $(this).serialize(),
		beforeSend: function() {
			$("#merge_body").hide();
			$("#merge_loader").show();

		},
		success: function(response) {
			if(response == 0) {
				$("#merge_body").show();
				$("#merge-succ-alert").hide();
				$("#merge-body-alert").show();
				$("#merge-body-form").hide();
				$("#merge_loader").hide();
				$("#merge-btn").attr('disabled', true);
			   var message = "{{ trans('kotoba::helpdesk.merge-error') }}";
				$("#merge-err-alert").show();
				$('#message-merge-err').html(message);

			} else if(response == 2) {
				$("#merge_body").show();
				$("#merge-succ-alert").hide();
				$("#merge-body-alert").show();
				$("#merge-body-form").hide();
				$("#merge_loader").hide();
				$("#merge-btn").attr('disabled', true);
				var message = "{{ trans('kotoba::helpdesk.merge-error2') }}";
				$("#merge-err-alert").show();
				$('#message-merge-err').html(message);

			} else {
				$("#merge_body").show();
				$("#merge-err-alert").hide();
				$("#merge-body-alert").show();
				$("#merge-body-form").hide();
				$("#merge_loader").hide();
				$("#merge-btn").attr('disabled', true);
				$("#hide2").load("agent/thread/{{ $tickets->id}}  #hide2");
				$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
				$("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
				$("#refresh3").load("agent/thread/{{ $tickets->id}}  #refresh3");
				$("#refreshTo").load("agent/thread/{{ $tickets->id}}  #refreshTo");
				$("#more-option").load("agent/thread/{{ $tickets->id}}  #more-option");
				var message = "{{ trans('kotoba::helpdesk.merge-success') }}";
				$("#merge-succ-alert").show();
				$('#message-merge-succ').html(message);

			}

		}
	})
	return false;

});

});



function remove_collaborator(id) {
var data = id;
$.ajax({
	headers: {
	'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
	},
	type: "POST",
	url: "agent/remove-user",
	dataType: "html",
	data: {data1:data},
	success: function(response) {
		if (response == 1) {
			$("#recepients").load("agent/thread/{{ $tickets->id}}   #recepients");
		};
	// $('#here2').html(response);

	// $("#surrender22").load("agent/thread/{{ $tickets->id}}   #surrender22");
	}
})
return false;
}

$(document).ready(function() {

var Vardata="";
var count = 0;
$(".select2").on('select2:select', function(){
parentAjaxCall();
});
$(".select2").on('select2:unselect', function(){
parentAjaxCall();
});
function parentAjaxCall(){
// alert();
var arr = $("#select-merge-tickts").val();
if(arr == null) {
document.getElementById("select-merge-parent").innerHTML = "<option value='{{ $tickets->id}}'><?php $ticket_data = App\Modules\Support\Http\Models\HelpDesk\Ticket\Ticket_Thread::select('title')->where('ticket_id', "=", $tickets->id)->first();    echo $ticket_data->title;?></option>"
} else {
$.ajax({
	type: "GET",
	url: "agent/get-parent-tickets/{{ $tickets->id }}",
	dataType: "html",
	data:{data1:arr},
	beforeSend: function() {
	   $("#parent-loader").show();
	   $("#parent-body").hide();
	},
	success: function(data) {
		$("#parent-loader").hide();
		$("#parent-body").show();
		// $("#select-merge-parent").focus();
		$('#select-merge-parent').html(data);
		// $( this ).off( event );
	}
});
}

}

var locktime = '<?php echo $var->collision_avoid;?>'*60*1000;
lockAjaxCall(locktime);
setInterval(function() {// to call ajax for ticket lock repeatedly after defined lock time interval
lockAjaxCall(locktime);
return false;
}, locktime);
});
//ajax call to check ticket and lock ticket
function lockAjaxCall(locktime){
$.ajax({
	type: "GET",
	url: "agent/check/lock/{{ $tickets->id}}",
	dataType: "html",
	data: $(this).serialize(),
	success: function(response) {
		if(response == 0) {
		   var message = "{{ trans('kotoba::helpdesk.locked-ticket') }}";
			$("#alert22").show();
			$('#message-warning2').html(message);
			$('#replybtn').attr('disabled', true);
			//setInterval(function(){$("#alert23").hide(); },10000);
		} else if(response == 2) {
			// alert(response);
			// var message = "{{ trans('kotoba::helpdesk.access-ticket') }}"+locktime/(60*1000)
			// +"{{ trans('kotoba::helpdesk.minutes') }}";
			$("#alert22").hide();
			$("#hide2").load("agent/thread/{{ $tickets->id}}  #hide2");
			$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
			$("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
			$("#refresh3").load("agent/thread/{{ $tickets->id}}  #refresh3");
			$("#t5").load("agent/thread/{{ $tickets->id}}  #t5");
			// $("#alert21").show();
			// $('#message-success2').html(message);
			$('#replybtn').attr('disabled', false);
			// setInterval(function(){$("#alert21").hide(); },8000);
		} else {
			// alert(response);
			// var message = "{{ trans('kotoba::helpdesk.access-ticket') }}"+locktime/(60*1000)
			// +"{{ trans('kotoba::helpdesk.minutes') }}";
			$("#alert22").hide();
			$("#refresh").load("agent/thread/{{ $tickets->id}}  #refresh");
		   // $("#refresh1").load("agent/thread/{{ $tickets->id}}  #refresh1");
			$("#refresh3").load("agent/thread/{{ $tickets->id}}  #refresh3");
			$("#t5").load("agent/thread/{{ $tickets->id}}  #t5");
			// $("#alert21").show();
			// $('#message-success2').html(message);
			$('#replybtn').attr('disabled', false);
			// setInterval(function(){$("#alert21").hide(); },8000);
		}
	}
})
}

$(function() {

	$('h5').html('<span class="stars">'+parseFloat($('input[name=amount]').val())+'</span>');
	$('span.stars').stars();

	$('h4').html('<span class="stars2">'+parseFloat($('input[name=amt]').val())+'</span>');
	$('span.stars2').stars();

});

$.fn.stars = function() {
return $(this).each(function() {
	$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
});
}
