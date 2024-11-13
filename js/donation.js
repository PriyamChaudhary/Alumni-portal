// donation.js

document.addEventListener('DOMContentLoaded', () => {
    const paymentMethodSelect = document.getElementById('payment-method');
    const paymentDetails = document.querySelectorAll('.payment-details');

    paymentMethodSelect.addEventListener('change', () => {
        const selectedMethod = paymentMethodSelect.value;
        
        paymentDetails.forEach(detail => {
            detail.style.display = detail.id === `${selectedMethod}-details` ? 'block' : 'none';
        });
    });
});