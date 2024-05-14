document.addEventListener("DOMContentLoaded", function() {
    const roundtripCheckbox = document.getElementById("roundtrip");
    const onewayCheckbox = document.getElementById("oneway");
    const departureDateField = document.getElementById("departure-date");
    const returnDateField = document.getElementById("return-date");

    roundtripCheckbox.addEventListener("change", function() {
        if (roundtripCheckbox.checked) {
            departureDateField.style.display = "block";
            returnDateField.style.display = "block";
        } else {
            departureDateField.style.display = "none";
            returnDateField.style.display = "none";
        }
    });

    onewayCheckbox.addEventListener("change", function() {
        if (onewayCheckbox.checked) {
            departureDateField.style.display = "block";
            returnDateField.style.display = "none";
        }
    });
});