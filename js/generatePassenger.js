document.addEventListener("DOMContentLoaded", function() {
    const passengerCountInput = document.getElementById("passenger-count");
    const passengerFormContainer = document.querySelector(".passenger-form");

    passengerCountInput.addEventListener("change", function() {
        const passengerCount = parseInt(passengerCountInput.value);
        generatePassengerInputs(passengerCount);
    });

    function generatePassengerInputs(count) {
        passengerFormContainer.innerHTML = ""; 
        for (let i = 1; i <= count; i++) {
            const passengerForm = document.createElement("div");
            passengerForm.innerHTML = `
                <h3>Passenger ${i}</h3>
                <input type="text" name="passengers[${i - 1}][name]" placeholder="Name" required>
                <input type="email" name="passengers[${i - 1}][email]" placeholder="Email" required>
                <input type="text" name="passengers[${i - 1}][phone]" placeholder="Phone Number" required>
                <input type="date" name="passengers[${i - 1}][dob]" placeholder="Date of Birth" required>
                <select name="passengers[${i - 1}][gender]" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            `;
            passengerFormContainer.appendChild(passengerForm);
        }
    }
});
