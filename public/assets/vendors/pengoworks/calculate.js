var bIsFirebugReady = (!!window.console && !!window.console.log);
$(document).ready(

	function (){
		// update the plug-in version
		$("#idPluginVersion").text($.Calculation.version);
/*
		$.Calculation.setDefaults({
			onParseError: function(){
				this.css("backgroundColor", "#cc0000")
			}
			, onParseClear: function (){
				this.css("backgroundColor", "");
			}
		});
*/

		// bind the recalc function to the quantity fields
		$("input[id^=products_]").bind("keyup change focus", recalc);
		$("input[id^=items_]").bind("keyup change focus", recalc);
		$("input[id^=charges_]").bind("keyup change focus", recalc);
		$("input[id^=qty_item_]").bind("keyup change focus", recalc);
		$("input[id^=price_item_]").bind("keyup change focus", recalc);

		// run the calculation function now
		recalc();

		// automatically update the "#totalSum" field every time
		// the values are changes via the keyup event
		$("input[name^=sum]").sum("keyup", "#totalSum");

		// automatically update the "#totalAvg" field every time
		// the values are changes via the keyup event
		$("input[name^=avg]").avg({
			bind:"keyup"
			, selector: "#totalAvg"
			// if an invalid character is found, change the background color
			, onParseError: function(){
				this.css("backgroundColor", "#cc0000")
			}
			// if the error has been cleared, reset the bgcolor
			, onParseClear: function (){
				this.css("backgroundColor", "");
			}
		});

		// automatically update the "#minNumber" field every time
		// the values are changes via the keyup event
		$("input[name^=min]").min("keyup", "#numberMin");

		// automatically update the "#minNumber" field every time
		// the values are changes via the keyup event
		$("input[name^=max]").max("keyup", {
			selector: "#numberMax"
			, oncalc: function (value, options){
				// you can use this to format the value
				$(options.selector).val(value);
			}
		});

		// this calculates the sum for some text nodes
		$("#idTotalTextSum").click(
			function (){
				// get the sum of the elements
				var sum = $(".textSum").sum();
				// update the total
				$("#totalTextSum").text("$" + sum.toString());
			}
		);

		// this calculates the average for some text nodes
		$("#idTotalTextAvg").click(
			function (){
				// get the average of the elements
				var avg = $(".textAvg").avg();
				// update the total
				$("#totalTextAvg").text(avg.toString());
			}
		);

	} // close function
); // close document ready

function recalc(){
	$("[id^=total_item]").calc(
		// the equation to use for the calculation
		"qty * price",
		// define the variables used in the equation, these can be a jQuery object
		{
			qty: $("input[id^=qty_item_]"),
			price: $("[id^=price_item_]")
		},
		// define the formatting callback, the results of the calculation are passed to this function
		function (s){
			// return the number as a dollar amount
//				return "$" + s.toFixed(2);
			return s.toFixed(2);
		},
		// define the finish callback, this runs after the calculation has been complete
		function ($this){
			// sum the total of the $("[id^=total_item]") selector
			var sum = $this.sum();

			$("#grand_total").val(
				// round the results to 2 digits
//					"$" + sum.toFixed(2)
				sum.toFixed(2)
			);
		}
	);
}
