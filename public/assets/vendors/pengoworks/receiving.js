var bIsFirebugReady = (!!window.console && !!window.console.log);
$(document).ready(

	function (){
		// update the plug-in version
		$("#idPluginVersion").text($.Calculation.version);

		$.Calculation.setDefaults({
			onParseError: function(){
				this.css("backgroundColor", "#ddd")
			}
			, onParseClear: function (){
				this.css("backgroundColor", "");
			}
		});


/*
		// bind the recalc function to the quantity fields
		$("input[id^=count_]").bind("keyup change focus", recalc);

		// run the calculation function now
		recalc();

		// automatically update the "#totalSum" field every time
		// the values are changes via the keyup event
		$("input[id^=count_]").sum("keyup", "#grand_total");
*/

//$("input[id^=count_]").bind("keyup change focus", recalc);

//recalc();			// automatically update the "#totalSum" field every time
// the values are changes via the keyup event

		$("input[id^=count_]").sum("keyup change focus", "#totalSum");



	} // close function
); // close document ready
