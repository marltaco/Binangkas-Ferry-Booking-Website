    document.addEventListener("DOMContentLoaded", function() {
        let currentPassenger = 1; 
        let passengerID;
        let paymentCompleted = false;

        document.getElementById("booking-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const cruiseID = document.getElementById("departing-ship").value;
            const returnCruise = document.getElementById("returning-ship").value;
            const passengerCount = parseInt(document.getElementById("passenger-count").value);
            
            const cabinType = document.getElementById("cabin").value;
            document.getElementById("input-body").style.display = "none";

            const emailField = document.querySelector('input[name^="email"]');
            const email = emailField ? emailField.value : '';
            
            showPassengerPopup(passengerCount, cruiseID, returnCruise, cabinType, email); 
        });

        function showPassengerPopup(passengerCount, cruiseID, returnCruise, cabinType, email) {
            if (currentPassenger <= passengerCount) {
                const popup = document.createElement("div");
                popup.classList.add("popup");
                popup.innerHTML = `
                    <h3>Passenger ${currentPassenger}</h3>
                    <input type="text" id="name_${currentPassenger}" placeholder="Name">
                    <input type="text" id="email_${currentPassenger}" placeholder="Email">
                    <input type="date" id="dob_${currentPassenger}" placeholder="Date of Birth">
                    <select id="gender_${currentPassenger}" name="gender_${currentPassenger}">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="tel" id="phoneNumber_${currentPassenger}" placeholder="Phone Number">
                    <button class="submit-passenger-btn">Submit Passenger ${currentPassenger}</button>
                `;
                document.body.appendChild(popup);

                popup.addEventListener("click", function(event) {
                    if (event.target.classList.contains("submit-passenger-btn")) {
                        const name = document.getElementById("name_" + currentPassenger).value;
                        const email = document.getElementById("email_" + currentPassenger).value;
                        const dob = document.getElementById("dob_" + currentPassenger).value;
                        const gender = document.getElementById("gender_" + currentPassenger).value;
                        const phoneNumber = document.getElementById("phoneNumber_" + currentPassenger).value;
                        console.log("Name:", name);
                        console.log("Email:", email);
                        console.log("DOB:", dob);
                        console.log("Gender:", gender);
                        console.log("Phone Number:", phoneNumber);

                        if (name === '' || email === '' || dob === '' || phoneNumber === '') {
                            alert("One or more required fields are missing: name, email, dob, phoneNumber");
                            return;
                        }

                        const departureDate = document.getElementById("departure-date").value;
                        const returnDate = document.getElementById("return-date").value;

                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "../script/insert-data.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText);
                                passengerID = xhr.responseText;
                                popup.remove();
                                currentPassenger++;
                                if (currentPassenger > passengerCount) {
                                    showPaymentPopup(cruiseID, returnCruise, email);
                                } else {
                                    showPassengerPopup(passengerCount, cruiseID, returnCruise, cabinType, email);
                                }
                            }
                        };

                        const formData = `name=${name}&email=${email}&dob=${dob}&gender=${gender}&phoneNumber=${phoneNumber}&origin=${origin}&destination=${destination}&departure-date=${departureDate}&return-date=${returnDate}&passenger-count=${passengerCount}&cabinType=${cabinType}&cruiseID=${cruiseID}&returnCruise=${returnCruise}`;
                        xhr.send(formData);
                    }
                });
            }
        }

        function showPaymentPopup(cruiseID, returnCruise, email) {
            const popup = document.createElement("div");
            popup.classList.add("popup");
            popup.innerHTML = `
                <h3>Payment</h3>
                <select id="paymentMethod" name="paymentMethod">
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
                <input type="text" id="username" placeholder="Username">
                <input type="text" id="cardNumber" placeholder="Card Number">
                <input type="text" id="expirationDate" placeholder="Expiration Date">
                <button class="submit-payment-btn">Make Payment</button>
            `;
            document.body.appendChild(popup);
        
            const submitPaymentButton = popup.querySelector(".submit-payment-btn");
            submitPaymentButton.addEventListener("click", function() {
                const paymentMethod = document.getElementById("paymentMethod").value;
                const username = document.getElementById("username").value;
                const cardNumber = document.getElementById("cardNumber").value;
                const expirationDate = document.getElementById("expirationDate").value;
        
                if (paymentMethod === '' || username === '' || cardNumber === '' || expirationDate === '') {
                    alert("One or more required fields are missing: paymentMethod, username, cardNumber, expirationDate");
                    return;
                }
        
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "../script/insert-payment.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                        paymentCompleted = true;
                        popup.remove();
                        showConfirmation(email); // Pass the emailParam to showConfirmation
                    }
                };
                const formData = `paymentMethod=${paymentMethod}&username=${username}&cardNumber=${cardNumber}&expirationDate=${expirationDate}&passengerID=${passengerID}&cruiseID=${cruiseID}&returnCruise=${returnCruise}`;
                xhr.send(formData);
            });
        }

        function showConfirmation(email) {
            console.log('Email:', email); 
            if (!email) {
                console.error('Email address is empty.');
                return;
            }
        
            // Display confirmation message
            const confirmationMessage = document.createElement("div");
            confirmationMessage.classList.add("popup");
            confirmationMessage.innerHTML = `
                <h3>Booking Confirmed!</h3>
                <p style='text-align:center;'>Your booking is successful. Please await an email confirmation.</p>
            `;
            document.body.appendChild(confirmationMessage);
            
            // Send email confirmation
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../script/confirm-email.php", true); 
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.error('Failed to send email confirmation:', xhr.statusText);
                    }
                }
            };
            xhr.send("email=" + encodeURIComponent(email)); 
        }
        
    });
