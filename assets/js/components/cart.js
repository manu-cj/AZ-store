const cart = () => {
    console.log('Function cart called');
    const body = document.querySelector('body');
    let cart = document.getElementById('cart');
    let cartIsActived = true;
    console.log('Initial cartIsActived:', cartIsActived);

    if (body.contains(cart)) {
        console.log('Cart element found in the body');
        cart.addEventListener('click', () => {
            cartIsActived = true;
            console.log('Mouseover event:', cartIsActived);
        });
        cart.addEventListener('mouseleave', () => {
            cartIsActived = false;
            console.log('Mouseleave event:', cartIsActived);
            setTimeout(() => {
                console.log('Timeout 10 seconds, cartIsActived:', cartIsActived);
                setTimeout(() => {
                    console.log('Timeout 1 second inside 10 seconds, cartIsActived:', cartIsActived);
                }, 1000);
                if (cartIsActived === false) {
                    console.log('Hiding cart because cartIsActived is false');
                    cart.style.display = 'none';
                }
            }, 10000);
        });
    } else {
        console.log('Cart element not found in the body');
    }
};

export default cart;
