import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Import Tailwind CSS modal components (optional)
import 'tailwindcss/tailwind.css';

// Handle modal opening when the trigger button is clicked
document.addEventListener('DOMContentLoaded', function () {
    const modalTriggerButton = document.querySelector('[data-toggle="modal"]');
    const modalElement = document.querySelector('#bookAppointmentModal');

    if (modalTriggerButton && modalElement) {
        modalTriggerButton.addEventListener('click', function () {
            modalElement.classList.add('block');
            modalElement.classList.remove('hidden');
        });

        // Handle modal closing when the close button is clicked
        const modalCloseButton = modalElement.querySelector('.modal-close');
        if (modalCloseButton) {
            modalCloseButton.addEventListener('click', function () {
                modalElement.classList.remove('block');
                modalElement.classList.add('hidden');
            });
        }
    }
});

