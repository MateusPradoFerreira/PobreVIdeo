var largura = window.innerWidth;

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 10,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

function bnt_event_add(bb) {
    let inp_cat = document.getElementById(bb);
    let adicionar_cat = document.getElementById('adicionar_cat');

    if (typeof inp_cat == 'undefined' || inp_cat === null) {
        return;
    } else {
        inp_cat.style.display = 'Block'
        adicionar_cat.style.display = 'none'
    }
}

function bnt_event_qc(bb) {
    let inp_cat = document.getElementById(bb);
    let adicionar_cat = document.getElementById('adicionar_cat');

    if (typeof inp_cat == 'undefined' || inp_cat === null) {
        return;
    } else {
        inp_cat.style.display = 'none'
        adicionar_cat.style.display = 'Block'
    }
}
function avs_add_remov(tt) {
    let ttc = document.getElementById(tt);

    if (typeof inp_cat == 'undefined' || inp_cat === null) {
        return;
    } else {
        ttc.style.display = 'none'
    }
}