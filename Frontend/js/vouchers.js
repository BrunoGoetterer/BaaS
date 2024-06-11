document.addEventListener("DOMContentLoaded", function() {
    // Get all voucher elements
    const vouchers = document.querySelectorAll(".voucher");

    // Loop through each voucher
    vouchers.forEach(function(voucher) {
        // Get the status of the voucher
        const status = voucher.getAttribute('data-status');
        console.log(`Voucher status: ${status}`);  // Debugging line

        // Check if the status is "used" or "expired"
        if (status === "used" || status === "expired") {
            // Add a class to highlight them
            voucher.classList.add("highlight");
            console.log(`Added highlight to voucher with status: ${status}`);  
        }
    });
});
