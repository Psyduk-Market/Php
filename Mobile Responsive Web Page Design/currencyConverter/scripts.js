var convertFromCurrency = "NZD";
var convertToCurrency = "EUR";

function convertToFloat(input) {
    if (/^(\-|\+)?([0-9]+(\.[0-9]+)?|Infinity)$/
            .test(input))
        return Number(input);
    return NaN;
}

$(document).ready(function () {
  updateConvertTo(convertToCurrency);
  updateConvertFrom(convertFromCurrency);
  getConversionRate(convertFromCurrency, convertToCurrency)
})

// Event listeners for convert from drop down
$(".convertFrom").click(function (event) {
    var currency = $(event.target).text();
    updateConvertFrom(currency);
});

// Event listeners for convert to drop down
$(".convertTo").click(function (event) {
    var currency = $(event.target).text();
    updateConvertTo(currency);
});

// Event listeners for text areas
$("#convertFromText").keyup(function() {
    var value = convertToFloat(this.value);

    if (isNaN(value)) {
        $("#convertFromText").removeClass("is-valid");
        $("#convertFromText").addClass("is-invalid");
    } else {
        $("#convertFromText").removeClass("is-invalid");
        $("#convertFromText").addClass("is-valid");
    }
});

$("#convertToText").keyup(function() {
    var value = convertToFloat(this.value);

    if (isNaN(value)) {
        $("#convertToText").removeClass("is-valid");
        $("#convertToText").addClass("is-invalid");
    } else {
        $("#convertToText").removeClass("is-invalid");
        $("#convertToText").addClass("is-valid");
    }
});


// Event listener for convert button
$("#convert").click(function() {
    var c1 = $("#convertFromDropdown").text();
    var c2 = $("#convertToDropdown").text();

    getConversionRate(c1, c2);
});


// Event listener for swap button
$("#swap").click(function() {
    var convertFrom = $("#convertFromText").val();
    var convertTo = $("#convertToText").val();
    $("#convertFromText").val(convertTo);
    $("#convertToText").val(convertFrom);
});


function getConversionRate(currency1, currency2) {
    var url = "https://api.exchangeratesapi.io/latest?base=" + currency1 + "&symbols=" + currency2;

    $.get( url, function( data ) {
        var rate = data.rates[currency2];
        displayConversionRate(currency1, currency2, rate);
        setConvertedRate(rate);
    });
}


/**
 * Sets the value for the converted currency.
 * @param rate The rate of conversion
 */
function setConvertedRate(rate) {
    console.log(rate)
    var oldCurrency = $("#convertFromText").val();
    console.log(oldCurrency)
    var newValue = parseFloat((rate * oldCurrency).toFixed(2));
    console.log(newValue)
    $("#convertToText").val(newValue);
}


/**
 * Display the conversion rate
 * @param currency1 the currency that is being converted from
 * @param currency2 the currency that is being converted to
 * @param rate The exchange rate
 */
function displayConversionRate(currency1, currency2, rate) {
    var text = "1 " + currency1 + " = " + rate + " " + currency2;
    $("#conversionRate").text(text);
}


function updateConvertTo(currency) {
    $("#convertToDropdown").text(currency);
    $("#currency2Label").text(currency);
    convertToCurrency = currency;
}


function updateConvertFrom(currency) {
    $("#convertFromDropdown").text(currency);
    $("#currency1Label").text(currency);
    convertFromCurrency = currency;
}
