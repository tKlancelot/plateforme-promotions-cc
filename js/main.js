class Filter {

    constructor(domItem,type,letterX,letterY,itemArray){

        this.domItem = document.querySelector(domItem);
        this.itemArray = document.querySelectorAll(itemArray ?? '.boutique-card'); 
        this.firstItem = document.querySelector("#tous");
        this.cardsArray = [];
        this.firstLetterArray = [];
        this.initState();
        this.handleButton();
        this.handleAllBtn();
        this.letterX = letterX ?? 'a';
        this.letterY = letterY ?? 'b';
        this.displayAll();
        this.type = type ?? 'regular';
        type == 'regular' ? this.checkLetters() : null;

    }

    initState(){
        this.itemArray.forEach((e) => {
            jQuery(e).hide();
            this.cardsArray.push(e);
        })
        // console.log(this.cardsArray);
        var _this = this;

    }

    resetState(){
        this.itemArray.forEach((e) => {
            jQuery(e).hide();
        })
    }

    displayAll(){
        this.itemArray.forEach((e) => {
            jQuery(e).show();
        })
    }

    handleAllBtn(){
        var _this = this;   
        _this.firstItem.addEventListener('click',function(){
            _this.displayAll();
        })
    }

    handleButton(){
        var _this = this;   
        _this.domItem.addEventListener('click',function(){
            _this.resetState();
            if(_this.type == "regular"){
                _this.itemArray.forEach((e)=>{
                    let child = e.children[1].children[0].textContent.charAt(0);
                    if((child == _this.letterX) || (child == _this.letterY)){
                        e.style.display = "block";
                    }
                })
            }
            else{
                let btnContent = _this.domItem.textContent;
                _this.itemArray.forEach((f) => {
                    let child = f.children[1].children[2].children[0].children[0].textContent;
                    // console.log(child);
                    if (child == btnContent){
                        f.style.display = "block";
                        console.log(f);
                    };
                })
            }
        }
    )}

    checkLetters(){
        this.itemArray.forEach((e) => {
            let child = e.children[1].children[0].textContent.charAt(0);
            this.firstLetterArray.push(child);
        })
        let content = this.domItem.textContent;
        const firstL = content.split("",1);
        const secondL = content.split("",2);
        let cond1 = this.firstLetterArray.includes(firstL[0]);
        let cond2 = this.firstLetterArray.includes(secondL[1]);
        if(cond1 || cond2){
            // console.log('ok');
        }
        else{
            this.domItem.setAttribute("disabled",true);
        }
    }


}

let button = document.querySelector('.menu__drop-down');
let chevron = document.querySelector('i.fa-solid.fa-chevron-down');
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

// recuperer tous les boutons de categories

let allCategories = document.querySelectorAll('.aside__body__item #store-categories button');

allCategories.forEach((i) => {
    let id = "#"+i.id;
    new Filter(id,'autre');
    console.log(i.id == 'all' ? i.remove() : null);
})


