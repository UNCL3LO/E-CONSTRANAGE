
    // JavaScript code
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.querySelector('.alert-success');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 3000);
        }
    });

