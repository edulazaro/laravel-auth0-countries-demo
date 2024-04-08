
// Code to dismiss the homepage auth error
document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.dismissable button').forEach(button => {
        button.addEventListener('click', function() {

            const targetSelector = this.getAttribute('data-dismiss-target');

            const targetElement = document.querySelector(targetSelector);

            if (targetElement) {
                targetElement.remove();
            }
        });
    });
});