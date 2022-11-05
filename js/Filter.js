export class Filter {

    constructor(domItem,type,letterX,letterY,itemArray){

        this.domItem = document.querySelector(domItem);
        this.itemArray = document.querySelectorAll(itemArray ?? '.boutique-card'); 
        this.firstItem = document.querySelector("#tous");
        this.cardsArray = [];
        this.firstLetterArray = [];
        this.initState();
        this.handleButton();
        this.handleAllBtn();
        this.displayAll();
        this.letterX = letterX ?? 'a';
        this.letterY = letterY ?? 'b';
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


