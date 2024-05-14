document.getElementById('origin').addEventListener('change', function() {
    var originID = this.value;
    fetch('../script/fetch_destinations.php?originID=' + originID)
        .then(response => response.text()) // Change to text() to see the raw response
        .then(data => {
            console.log(data); // Log the raw response
            // Try to parse as JSON
            var jsonData = JSON.parse(data);
            var destinationSelect = document.getElementById('destination');
            destinationSelect.innerHTML = ''; 
            jsonData.forEach(destination => {
                var option = document.createElement('option');
                option.value = destination.destinationID;
                option.text = destination.locationName;
                destinationSelect.add(option);
            });
        })
        .catch(error => console.error('Error fetching destinations:', error));
});
