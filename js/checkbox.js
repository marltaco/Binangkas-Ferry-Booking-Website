document.addEventListener("DOMContentLoaded", function() {
    const roundtripCheckbox = document.getElementById("roundtrip");
    const onewayCheckbox = document.getElementById("oneway");
    const departureDateInput = document.getElementById("departure-date");
    const returnDateInput = document.getElementById("return-date");
    const returnDateLabel = document.querySelector("label[for='return-date']");
    const destinationSelect = document.getElementById("destination");
    const departingShipSelect = document.getElementById("departing-ship");
    const returningShipSelect = document.getElementById("returning-ship");

    returnDateInput.style.display = "none";
    returnDateLabel.style.display = "none";

    roundtripCheckbox.addEventListener("change", function() {
        if (roundtripCheckbox.checked) {
            onewayCheckbox.checked = false;
            departureDateInput.style.display = "block";
            returnDateInput.style.display = "block";
            returnDateLabel.style.display = "block";
            departingShipSelect.style.display = "block";
            returningShipSelect.style.display = "block"; 
            populateShipsForDestination(destinationSelect.value); 
        } else {
            departureDateInput.style.display = "block";
            returnDateInput.style.display = "none";
            returnDateLabel.style.display = "none";
            departingShipSelect.style.display = "none"; 
            returningShipSelect.style.display = "none";
        }
    });

    onewayCheckbox.addEventListener("change", function() {
        if (onewayCheckbox.checked) {
            roundtripCheckbox.checked = false;
            departureDateInput.style.display = "block";
            returnDateInput.style.display = "none";
            returnDateLabel.style.display = "none";
            departingShipSelect.style.display = "block";
            returningShipSelect.style.display = "none";
            populateShipsForDestination(destinationSelect.value);
        } else {
            departureDateInput.style.display = "block";
            returnDateInput.style.display = "block";
            returnDateLabel.style.display = "block";
            departingShipSelect.style.display = "block"; 
            returningShipSelect.style.display = "block"; 
            populateShipsForDestination(destinationSelect.value); 
        }
    });

    function populateShipsForDestination(destinationID) {
        fetch("../script/fetch-ships.php?destinationID=" + destinationID)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Server response was not ok: ' + response.statusText);
                }
                return response.json(); 
            })
            .then(data => {
                console.log("Server Response:", data); 
                departingShipSelect.innerHTML = '';
                returningShipSelect.innerHTML = '';
                data.forEach(ship => {
                    const option = document.createElement('option');
                    option.value = ship.cruiseID;
                    option.textContent = ship.CruiseName;
                    departingShipSelect.appendChild(option);
                    returningShipSelect.appendChild(option.cloneNode(true));
                });
            })
            .catch(error => console.error("Error fetching ships:", error));
    }

    destinationSelect.addEventListener("change", function() {
        populateShipsForDestination(this.value);
    });
});
