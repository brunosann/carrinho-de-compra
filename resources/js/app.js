const S = (el) => document.querySelector(el);
const SS = (el) => document.querySelectorAll(el);

const btnsCart = SS("[data-product]");
const cartComponent = S("#cart-component").cloneNode(true);
const boxCart = S("#box-cart");
const cart = S("#cart");
const btnCloseCart = S("#btn-close");
const btnOpenCart = S("#btn-cart");
const cartTotal = S("#cart-total");
const cartItemsQuantity = S(".cart-quantity");
const checkoutItems = S("#checkout-items");

[btnCloseCart, btnOpenCart].forEach((btn) =>
  btn.addEventListener("click", () => cart.classList.toggle("active"))
);

const addStorage = (data) => {
  const storage = JSON.parse(localStorage.getItem("_cart"));
  if (!storage) return localStorage.setItem("_cart", JSON.stringify([data]));
  const itemExist = storage.findIndex((cartItem) => cartItem.id == data.id);
  if (itemExist == -1) storage.push(data);
  else storage[itemExist].qt++;
  localStorage.setItem("_cart", JSON.stringify(storage));
};

let timer = null;
const renderCart = () => {
  let itemsTotal = 0;
  const cartComponents = [];
  const cartItems = JSON.parse(localStorage.getItem("_cart"));
  if (!cartItems) return;
  cartItems.forEach((cartItem) => {
    cartComponent.classList.remove("hidden");
    cartComponent.classList.add("flex");
    cartComponent.querySelector("[data-name]").innerText = cartItem.name;
    cartComponent.querySelector("[data-image]").src = cartItem.image;
    cartComponent.querySelector("[data-image]").alt = "foto" + cartItem.name;
    cartComponent.querySelector("[data-quantity]").innerText = cartItem.qt;
    cartComponent.querySelector("[data-price]").innerText =
      cartItem.price.replace(".", ",");
    cartComponent.querySelector("[data-cart-product]").dataset.cartProduct =
      cartItem.id;
    cartComponents.push(cartComponent.outerHTML);
    itemsTotal += Number(cartItem.qt);
  });
  const total = countTotal(cartItems);
  if (checkoutItems) renderCheckoutItems(cartComponents, total);
  boxCart.innerHTML = cartComponents.join(" ");
  cartItemsQuantity.innerText = itemsTotal;
  // debounce
  clearTimeout(timer);
  timer = setTimeout(() => {
    cartSynchronization(cartItems, itemsTotal);
  }, 750);
};

const renderCheckoutItems = (cartComponents, priceTotal) => {
  checkoutItems.innerHTML = cartComponents.join(" ");
  S("#checkout-total").innerText =
    "R$ " + priceTotal.toFixed(2).replace(".", ",");
};

const handleCart = ({ target }) => {
  const id = target.dataset.product;
  const parent = target.parentElement;
  const name = parent.querySelector("h2").innerText;
  const price = parent.querySelector("p span").innerText;
  const image = parent.previousElementSibling.querySelector("img").src;
  const qt = 1;
  addStorage({ id, name, price, image, qt });
  renderCart();
};

btnsCart.forEach((btn) => btn.addEventListener("click", handleCart));

const countTotal = (items) => {
  const priceTotal = items.reduce((acc, item) => {
    return acc + Number(item.price.replace(",", ".")) * Number(item.qt);
  }, 0);
  cartTotal.innerText = priceTotal.toFixed(2).replace(".", ",");
  return priceTotal;
};

const cartSynchronization = async (cart, itemsTotal) => {
  const res = await fetch(BASE_URL + "/sync-cart", {
    headers: {
      "X-CSRF-TOKEN": S('meta[name="csrf-token"]').content,
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({ cart, itemsTotal }),
  });
  const resJson = await res.json();
};

window.upItemCart = (el) => {
  const id = el.parentElement.dataset.cartProduct;
  const cartItems = JSON.parse(localStorage.getItem("_cart"));
  const index = cartItems.findIndex((cartItem) => cartItem.id == id);
  cartItems[index].qt++;
  localStorage.setItem("_cart", JSON.stringify(cartItems));
  renderCart();
};
window.downItemCart = (el) => {
  const id = el.parentElement.dataset.cartProduct;
  const cartItems = JSON.parse(localStorage.getItem("_cart"));
  const index = cartItems.findIndex((cartItem) => cartItem.id == id);
  if (cartItems[index].qt == 1) cartItems.splice(index, 1);
  else cartItems[index].qt--;
  localStorage.setItem("_cart", JSON.stringify(cartItems));
  renderCart();
};

renderCart();
