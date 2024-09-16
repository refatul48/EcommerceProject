document.addEventListener('DOMContentLoaded', () => {
    function renderCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; // Clear previous items

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalQuantity = 0;

        cart.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <input type="checkbox" class="cart-item-checkbox" data-id="${item.id}" ${item.selected ? 'checked' : ''}>
                </td>
                <td>
                    <img src="${item.photo}" alt="${item.name}" class="product-image">
                </td>
                <td class="text-start product-title">
                    <h6 class="mb-0">${item.name}</h6>
                </td>
                <td>
                    <div class="product-qty d-inline-flex align-items-center" data-product-id="${item.id}">
                        <button class="decrease">-</button>
                        <input type="text" value="${item.quantity}" readonly>
                        <button class="increase">+</button>
                    </div>
                </td>
                <td>
                    <span class="text-dark fw-bold me-2 d-lg-none">Unit Price:</span>
                    <span class="text-dark fw-bold">TK. ${item.price}</span>
                </td>
                <td class="total-price">
                    <span class="text-dark fw-bold me-2 d-lg-none">Total Price:</span>
                    <span class="text-dark fw-bold">TK. ${item.quantity * item.price}</span>
                </td>
                <td>
                    <button class="btn btn-danger text-white delete-button" data-id="${item.id}">Delete</button>
                </td>
            `;
            cartItemsContainer.appendChild(row);

            // Calculate total quantity
            totalQuantity += parseInt(item.quantity);

            // Restore checkbox state if already selected
            const checkbox = row.querySelector('.cart-item-checkbox');
            checkbox.checked = item.selected || false; // Preserve selected state
        });

        // Update total quantity in the header
        document.getElementById('total-items').textContent = totalQuantity;

        // Add event listeners to delete buttons
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                cart = cart.filter(item => item.id !== id);
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCartItems(); // Re-render cart items after deletion
                showAlert('Item removed from cart');
            });
        });

        // Add event listeners to increase quantity buttons
        document.querySelectorAll('.increase').forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.parentElement.dataset.productId;
                const item = cart.find(item => item.id === productId);
                if (item) {
                    item.quantity++;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCartItems(); // Re-render cart items after quantity update
                    showAlert('Item quantity updated');
                    updateSelectedSubtotal();
                }
            });
        });

        // Add event listeners to decrease quantity buttons
        document.querySelectorAll('.decrease').forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.parentElement.dataset.productId;
                const item = cart.find(item => item.id === productId);
                if (item && item.quantity > 1) {
                    item.quantity--;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCartItems(); // Re-render cart items after quantity update
                    showAlert('Item quantity updated');
                    updateSelectedSubtotal();
                }
            });
        });

        // Add event listeners to checkboxes to update the subtotal
        document.querySelectorAll('.cart-item-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const id = checkbox.dataset.id;
                const item = cart.find(item => item.id === id);
                if (item) {
                    item.selected = checkbox.checked; // Save selection state
                    localStorage.setItem('cart', JSON.stringify(cart));
                }
                updateSelectedSubtotal();
            });
        });

        // Calculate and update subtotal on page load
        updateSelectedSubtotal();
    }

    function updateSelectedSubtotal() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let subtotal = 0;

        document.querySelectorAll('.cart-item-checkbox:checked').forEach(checkbox => {
            const id = checkbox.dataset.id;
            const item = cart.find(item => item.id === id);
            if (item) {
                subtotal += item.price * item.quantity;
            }
        });

        document.getElementById('subtotal').textContent = `TK. ${subtotal.toFixed(2)}`;
        document.getElementById('total').textContent = `TK. ${subtotal.toFixed(2)}`;
    }

    function showAlert(message) {
        // Display a temporary alert
        const alertBox = document.createElement('div');
        alertBox.className = 'alert alert-success';
        alertBox.textContent = message;
        document.body.appendChild(alertBox);
        setTimeout(() => alertBox.remove(), 2000);
    }

    renderCartItems(); // Render cart items on page load
});
