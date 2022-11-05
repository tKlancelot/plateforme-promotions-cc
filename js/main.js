import { Filter } from './Filter.js';

let button = document.querySelector('.menu__drop-down');
let box = document.querySelector('.menu__drop-down .submenu');

jQuery(button).mouseover(function(){
    jQuery(box).show();
})

jQuery(button).mouseleave(function(){
    jQuery(box).hide();
})


let alphabeticalFilterAB = new Filter('#ab');
let alphabeticalFilterCD = new Filter('#cd','regular','c','d');
let alphabeticalFilterEF = new Filter('#ef','regular','e','f');
let alphabeticalFilterGH = new Filter('#gh','regular','g','h');
let alphabeticalFilterIJ = new Filter('#ij','regular','i','j');
let alphabeticalFilterKL = new Filter('#kl','regular','k','l');
let alphabeticalFilterMN = new Filter('#mn','regular','m','n');
let alphabeticalFilterOP = new Filter('#op','regular','o','p');
let alphabeticalFilterQR = new Filter('#qr','regular','q','r');
let alphabeticalFilterST = new Filter('#st','regular','s','t');
let alphabeticalFilterUV = new Filter('#uv','regular','u','u');
let alphabeticalFilterWX = new Filter('#wx','regular','w','x');
let alphabeticalFilterYZ = new Filter('#yz','regular','y','z');

console.log(alphabeticalFilterAB);

// recuperer tous les boutons de categories

let allCategories = document.querySelectorAll('.aside__body__item #store-categories button');

allCategories.forEach((i) => {
    let id = "#"+i.id;
    new Filter(id,'autre');
    console.log(i.id == 'all' ? i.remove() : null);
})





