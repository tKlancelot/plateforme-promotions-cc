

let button = document.querySelector('.menu__drop-down');
let chevron = document.querySelector('i.fa-solid.fa-chevron-down');
let box = document.querySelector('.menu__drop-down .submenu');

jQuery(button).click(function(){
    jQuery(box).show();
    // jQuery(chevron).toggleClass('turn-180');
})

jQuery(button).mouseleave(function(){
    jQuery(box).hide();
    // jQuery(chevron).toggleClass('turn-180');
})

