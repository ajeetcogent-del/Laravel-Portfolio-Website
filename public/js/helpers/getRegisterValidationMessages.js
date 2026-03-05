function getRegisterValidationMessages() {
    return {
        name: {
            required: "Please enter your full name",
            minlength: "Your name must be at least 3 characters long"
        },
        email: {
            required: "Please enter an email address",
            email: "Please enter a valid email address"
        },
        phone: {
            required: "Please enter your phone number",
            digits: "Please enter only digits",
            minlength: "Phone number must be at least 10 digits"
        },
        role: {
            required: "Please select a role"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
        },
        password_confirmation: {
            required: "Please confirm your password",
            equalTo: "Passwords do not match"
        },
        terms: "Please accept our terms"
    };
}
