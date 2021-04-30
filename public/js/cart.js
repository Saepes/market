
$(document).ready(function () {
    qty = $("#qty")[0];
    console.log(qty)
    const BTNINC = $("#btnInc");
    const BTNDECK = $("#btnDeck");

    btnInc(BTNINC);
    btnDeck(BTNDECK);
})

function btnInc(btn) {
    btn.click(function () {
        qty.innerHTML = parseInt(qty.innerHTML) + 1;
    })
}

function btnDeck(btn) {
    btn.click(function () {
        if(parseInt(qty.innerHTML) <= 0) {
            qty.innerHTML = 1;
        }
        qty.innerHTML = parseInt(qty.innerHTML) - 1;
    })
}

