require('../../../node_modules/pixi.js/dist/pixi.js');
var styles = require('./styles');
var PIXI = window.PIXI;
import PipeCutting from './PipeCutting';

export default class View {

    constructor(params) {
        this.app = new PIXI.Application(
            params.width, 
            params.height, 
            {
                backgroundColor : styles.backgroundColor,
                preserveDrawingBuffer:true
            }
        );
        this.template = false;
    }

    addChild(child) {
        this.app.stage.addChild(child);
    }

    getTemplate(){
        // if (!this.template) {
        //     this.template = new PipeCutting();
        //     this.addChild(this.template.template);
        // }

        return this.template;
    };
    
    setTemplate(template){
        this.template = template;
        this.addChild(this.template.template);
    }
}
