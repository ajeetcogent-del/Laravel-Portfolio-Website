function getRegisterValidationRules() {
    return {
        name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true,
            digits: true,
            minlength: 10
        },
        role: {
            required: true
        },
        password: {
            required: true,
            minlength: 8
        },
        password_confirmation: {
            required: true,
            minlength: 8,
            equalTo: "#password"
        },
        terms: {
            required: true
        }
    };
}
