export class FilterBase {

    constructor(handler,itemArray,type){
        this.handler = document.querySelector(handler);
        this.itemToFilter = document.querySelectorAll(itemArray);
        this.myArray = [];
        this.type = type;
        this.getValueToCompare();
        this.handleBtn();
    }

    resetState(){
        this.itemToFilter.forEach((e) => {
            jQuery(e).hide();
        })  
    }

    displayAll(){
        this.itemToFilter.forEach((e) => {
            jQuery(e).show();
        })  
    }

    // identifier l'element du dom qu'il faudra comparer avec la valeur du handler 
    getValueToCompare(){
        this.itemToFilter.forEach((e) => {
            switch(this.type){
                case 'promotion':
                    console.log('type promo');
                    let child = e.querySelector('.promotion-card__body .meta span:nth-child(1');
                    this.myArray.push(child);
                    break;
                case 'boutique':
                    console.log('type boutique');
                    break;
                default:
                    console.log('default');
                    break;
            }
        })
    }

    handleBtn(){
        var _this = this;
        this.handler.addEventListener('click',function(){
            _this.resetState();
            if(this.textContent == "all"){
                _this.displayAll();
            } 
            else {
                _this.myArray.forEach((e) => {
                    if(e.textContent == this.textContent){
                        switch(_this.type){
                            case 'promotion':
                                let parent = e.parentNode.parentNode.parentNode.parentNode;
                                jQuery(parent).show();
                                break;
                            case 'boutique':
                                console.log('type boutique');
                                break;
                            default:
                                console.log('default');
                                break;
                        }
                    }
                });
            }

            
        })
    }

}