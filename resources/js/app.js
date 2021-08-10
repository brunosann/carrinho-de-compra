const S = (el) => document.querySelector(el);
const SS = (el) => document.querySelectorAll(el);

const btnsCart = SS("[data-product]");
const cartComponent = S("#cart-component").cloneNode(true);
const boxCart = S("#box-cart");
const btnClose = S("#btn-close");

const addStorage = (data) => {
  const storage = JSON.parse(localStorage.getItem("_cart"));
  if (!storage) return localStorage.setItem("_cart", JSON.stringify([data]));
  const itemExist = storage.findIndex((cartItem) => cartItem.id == data.id);
  if (itemExist == -1) storage.push(data);
  else storage[itemExist].qt++;
  localStorage.setItem("_cart", JSON.stringify(storage));
};

const renderCart = () => {
  const cartComponents = [];
  const cartItems = JSON.parse(localStorage.getItem("_cart"));
  cartItems.forEach((cartItem) => {
    cartComponent.classList.remove("hidden");
    cartComponent.classList.add("flex");
    cartComponent.querySelector("[data-name]").innerText = cartItem.name;
    cartComponent.querySelector("[data-image]").src = cartItem.image;
    cartComponent.querySelector("[data-image]").alt = "foto" + cartItem.name;
    cartComponent.querySelector("[data-quantity]").innerText = cartItem.qt;
    cartComponent.querySelector("[data-price]").innerText = cartItem.price;
    cartComponents.push(cartComponent.outerHTML);
  });
  boxCart.innerHTML = cartComponents.join(" ");
};

const handleCart = ({ target }) => {
  const id = target.dataset.product;
  const parent = target.parentElement;
  const name = parent.querySelector("h2").innerText;
  const price = parent.querySelector("p").innerText;
  const image = parent.previousElementSibling.querySelector("img").src;
  const qt = 1;
  addStorage({ id, name, price, image, qt });
  renderCart();
};

btnsCart.forEach((btn) => btn.addEventListener("click", handleCart));

const closeCart = () => {
  S("#cart").style.display = "none";
};

btnClose.addEventListener("click", closeCart);
