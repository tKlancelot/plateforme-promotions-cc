class Filter {

    constructor(domItem,letterX,letterY,itemArray){

        this.domItem = document.querySelector(domItem);
        this.itemArray = document.querySelectorAll(itemArray ?? '.boutique-card'); 
        this.firstItem = document.querySelector("#all");
        this.cardsArray = [];
        this.firstLetterArray = [];
        this.initState();
        this.handleButton();
        this.handleAllBtn();
        this.letterX = letterX ?? 'a';
        this.letterY = letterY ?? 'b';
        this.displayAll();

    }

    initState(){
        this.itemArray.forEach((e) => {
            jQuery(e).hide();
            this.cardsArray.push(e);
        })
        console.log(this.cardsArray);
        this.checkLetters();
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
            _this.itemArray.forEach((e)=>{
                let child = e.children[1].children[0].textContent.charAt(0);
                if((child == _this.letterX) || (child == _this.letterY)){
                    e.style.display = "block";
            }
        })
    })}

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
            console.log('ok');
        }
        else{
            this.domItem.setAttribute("disabled",true);
        }
    }


}

let button = document.querySelector('.menu__drop-down');
let chevron = document.querySelector('i.fa-solid.fa-chevron-down');
let box = document.querySelector('.menu__drop-down .submenu');

jQuery(button).click(function(){
    jQuery(box).show();
})

jQuery(button).mouseleave(function(){
    jQuery(box).hide();
})




let alphabeticalFilterAB = new Filter('#ab');
let alphabeticalFilterCD = new Filter('#cd','c','d');
let alphabeticalFilterEF = new Filter('#ef','e','f');
let alphabeticalFilterGH = new Filter('#gh','g','h');
let alphabeticalFilterIJ = new Filter('#ij','i','j');
let alphabeticalFilterKL = new Filter('#kl','k','l');
let alphabeticalFilterMN = new Filter('#mn','m','n');
let alphabeticalFilterOP = new Filter('#op','o','p');
let alphabeticalFilterQR = new Filter('#qr','q','r');
let alphabeticalFilterST = new Filter('#st','s','t');
let alphabeticalFilterUV = new Filter('#uv','u','u');
let alphabeticalFilterWX = new Filter('#wx','w','x');
let alphabeticalFilterYZ = new Filter('#yz','y','z');