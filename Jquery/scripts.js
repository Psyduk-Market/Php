var convertFromCurrency = "NZD";
var convertToCurrency = "EUR";

function convertToFloat(input) {
    if (/^(\-|\+)?([0-9]+(\.[0-9]+)?|Infinity)$/
            .test(input))
        return Number(input);
    return NaN;
}

$(".convertFrom").click(function(event) {
	updateConvertFrom($(event.target).text());
});

$(".convertTo").click(function(event) {
	updateConvertTo($(event.target).text());
});

function updateConvertFrom(input) {
	$("#exchangeFrom").text(input);
	convertFromCurrency = input;
}

function updateConvertTo(input) {
	$("#exchangeTo").text(input);
	convertToCurrency = input;
}


$(".convertFromExchange").keyup(function(event) {
	res = convertToFloat($(event.target).val());
	console.log(res);
	if (Number.isNaN(res)) {
		$(".convertFromExchange").removeClass("is-valid");
		$(".convertFromExchange").addClass("is-invalid");
	} else {
		$(".convertFromExchange").removeClass("is-invalid");
		$(".convertFromExchange").addClass("is-valid");
	}
});

$(".convertToExchange").keyup(function(event) {
	res = convertToFloat($(event.target).val());
	console.log(res);
	if (Number.isNaN(res)) {
		$(".convertToExchange").removeClass("feValid");
		$(".convertToExchange").addClass("feInValid");
	} else {
		$(".convertToExchange").removeClass("feInValid");
		$(".convertToExchange").addClass("feValid");
	}
});


$("#convertButton").click(function() {
	
	if ($(".convertFromExchange").hasClass("is-valid")) {
		exFrom = $(".convertFromExchange").val();
	}
	
	if ($(".convertFromExchange").hasClass("is-valid")) {
		exTo = $(".convertToExchange").val();
	}
	getConverstionRate(exFrom, exTo);
	
});


function getConverstionRate(exFrom, exTo) {
	url = "https://api.exchangeratesapi.io/latest?base=" + convertFromCurrency + "&symbols=" + convertToCurrency ;
	console.log(url);
	$.get( url, function( data ) {
		console.log(data.rates[convertToCurrency]);
		$("#convertToTextArea").val(data.rates[convertToCurrency]);
		alert( data );
	});
}

$("#showConvertion").click(function() {
	exFrom = $(".convertFromExchange").val();
	exTo = $(".convertToExchange").val();
	console.log(exTo);
	displayConversionRate(exFrom,exTo);
});

function displayConversionRate(f,t) {
	result = "1 " + convertFromCurrency + " = " + toString(t) + convertToCurrency;
	console.log(result);
	$('h2').text(result);
}



