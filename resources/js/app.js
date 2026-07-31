console.log("app.js loaded");

let cart = JSON.parse(localStorage.getItem("cart")) || [];

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".add-cart").forEach((button) => {
        button.addEventListener("click", () => {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = Number(button.dataset.price);

            const item = cart.find((item) => item.id == id);

            if (item) {
                item.quantity++;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1,
                });
            }

            saveCart();
            renderCart();
        });
    });

    renderCart();
});

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function renderCart() {
    const cartList = document.querySelector("#cart-list");

    if (!cartList) return;

    cartList.innerHTML = "";

    let total = 0;

    cart.forEach((item) => {
        const itemTotal = item.price * item.quantity;

        total += itemTotal;

        cartList.innerHTML += `
            <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">

                <div class="text-sm font-bold text-slate-800">
                    ${item.name}
                </div>


                <div class="flex justify-between mt-3">

                    <div class="flex items-center gap-2">

                        <button 
                            class="minus w-6 h-6 bg-slate-100 rounded"
                            data-id="${item.id}">
                            -
                        </button>


                        <span>
                            ${item.quantity}
                        </span>


                        <button 
                            class="plus w-6 h-6 bg-slate-100 rounded"
                            data-id="${item.id}">
                            +
                        </button>

                    </div>


                    <span class="font-bold">
                        ${itemTotal.toLocaleString()}원
                    </span>

                </div>

            </div>
        `;
    });

    const totalElement = document.querySelector("#cart-total");

    if (totalElement) {
        totalElement.innerText = total.toLocaleString() + "원";
    }
}

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("plus")) {
        const id = e.target.dataset.id;

        const item = cart.find((i) => i.id == id);

        item.quantity++;

        saveCart();
        renderCart();
    }

    if (e.target.classList.contains("minus")) {
        const id = e.target.dataset.id;

        const item = cart.find((i) => i.id == id);

        item.quantity--;

        if (item.quantity <= 0) {
            cart = cart.filter((i) => i.id != id);
        }

        saveCart();
        renderCart();
    }
});

const clearButton = document.querySelector("#clear-cart");

if (clearButton) {
    clearButton.addEventListener("click", () => {
        cart = [];

        localStorage.removeItem("cart");

        renderCart();
    });
}

document.querySelector("#order-submit").addEventListener("click", async () => {
    const order = {
        table_number: 1,
        status: "ORDERED",
        order_items: cart.map((item) => ({
            food_id: item.id,
            quantity: item.quantity,
        })),
    };

    const response = await fetch("/api/orders", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify(order),
    });

    const data = await response.json();

    alert(data.message);

    // 주문 완료 후 장바구니 비우기
    cart = [];

    // localStorage에서도 삭제
    localStorage.removeItem("cart");

    // 화면 갱신
    renderCart();
});
