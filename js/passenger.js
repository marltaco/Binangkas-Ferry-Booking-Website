document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('booking-form');

    bookingForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const destination = document.getElementById('destination').value;
        const date = document.getElementById('date').value;
        const passengerCount = document.getElementById('passenger-count').value;

        console.log('Destination:', destination);
        console.log('Date of Travel:', date);
        console.log('Number of Passengers:', passengerCount);
    });
});
