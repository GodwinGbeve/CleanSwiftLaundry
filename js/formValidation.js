$(document).ready(function () {
    const countries = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
        "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
        "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
        "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the",
        "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador",
        "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France",
        "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
        "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland",
        "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South",
        "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
        "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania",
        "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar",
        "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway",
        "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland",
        "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino",
        "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands",
        "Somalia", "South Africa", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria",
        "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
        "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu",
        "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    const countryDropdown = $('#registerCountry');
    countries.forEach(country => {
        const option = $('<option></option>').val(country).text(country);
        countryDropdown.append(option);
    });

    $('#registerForm').on('submit', function (event) {
        event.preventDefault();

        var name = $('#registerName').val();
        var email = $('#registerEmail').val();
        var password = $('#registerPassword').val();
        var country = $('#registerCountry').val();
        var city = $('#registerCity').val();
        var contact = $('#registerContact').val();

        console.log('Validating form...');

        if (!name || !email || !password || !country || !city || !contact) {
            Swal.fire('Error', 'All fields are required.', 'error');
            console.log('Validation failed: All fields are required.');
            return;
        }

        if (!validateEmail(email)) {
            Swal.fire('Error', 'Please enter a valid Ashesi email address.', 'error');
            console.log('Validation failed: Invalid email address.');
            return;
        }

        if (password.length < 6) {
            Swal.fire('Error', 'Password must be at least 6 characters long.', 'error');
            console.log('Validation failed: Password too short.');
            return;
        }

        if (!validatePhoneNumber(contact)) {
            Swal.fire('Error', 'Please enter a valid phone number with country code.', 'error');
            console.log('Validation failed: Invalid phone number.');
            return;
        }

        if (!validateCity(city)) {
            Swal.fire('Error', 'Please enter a valid city name.', 'error');
            console.log('Validation failed: Invalid city name.');
            return;
        }

        $.ajax({
            url: '../actions/registerprocess.php',
            type: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
                country: country,
                city: city,
                contact: contact
            },
            dataType: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    Swal.fire('Success', data.message, 'success');
                    $('#registerForm')[0].reset();
                    $('#registerModal').modal('hide');
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            },
            error: function () {
                Swal.fire('Error', 'An error occurred while processing your request.', 'error');
            }
        });

        console.log('Validation passed.');
    });

    $('#registerModal').on('hidden.bs.modal', function () {
        $('#registerForm')[0].reset();
    });

    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
        return re.test(email);
    }

    function validatePhoneNumber(phone) {
        var re = /^\+\d{1,3}\d{4,14}(?:x.+)?$/;
        return re.test(phone);
    }

    function validateCity(city) {
        var re = /^[a-zA-Z\s]+$/;
        return re.test(city);
    }
});