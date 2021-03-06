require('../../../node_modules/pixi.js/dist/pixi.js');
var PIXI = window.PIXI;
var styles = require('./styles');

export default class ImageGenerator {

    constructor() {
        this.template = new PIXI.Graphics();
    }

    show(input, viewParams) {
        // let scaleX = 1;
        // let scaleY = 1;
        // let additionalMarginX = 0;
        // if (dataResponse.maxWidth/dataResponse.maxHeight <= (4/3)) {
        //     //max height
        //     scaleY = scaleX =
        //         (1 - (2 * styles.marginYPercent)/100) *
        //         viewParams.height/dataResponse.maxHeight;
        //     additionalMarginX = (viewParams.width - dataResponse.maxWidth * scaleX)/2 - (styles.marginXPercent/100) * viewParams.width;
        // } else {
        //     //max width
        //     scaleX = scaleY = (1 - (2 * styles.marginXPercent)/100) * viewParams.width/dataResponse.maxWidth;
        // }
        //
        //
        // let path = dataResponse.pathes[0];
        // let scalePath = dataResponse.pathes[1];
        //
        // // path = scale(path, scaleX, scaleY, viewParams, additionalMarginX, dataResponse);
        // // scalePath = scale(scalePath, scaleX, scaleY, viewParams, additionalMarginX, dataResponse);
        // var pathIndex = 0;
        // path = path.map(function (v){
        //     //x
        //     if (pathIndex % 2 === 0) {
        //         v = v * scaleX + (styles.marginXPercent/100) * viewParams.width + additionalMarginX;
        //     } else {
        //         v = v * scaleY + (styles.marginYPercent/100) * viewParams.height + scaleY * dataResponse.maxHeight;
        //     }
        //     pathIndex++;
        //
        //    return v;
        // });
        //
        // scalePath = scalePath.map(function (v){
        //     //x
        //     if (pathIndex % 2 === 0) {
        //         v = v * scaleX + (styles.marginXPercent/100) * viewParams.width + additionalMarginX;
        //     } else {
        //         v = v * scaleY + (styles.marginYPercent/100) * viewParams.height + scaleY * dataResponse.maxHeight;
        //     }
        //     pathIndex++;
        //
        //     return v;
        // });
        //
        //
        // let textStyle = new PIXI.TextStyle({
        //     fontFamily: "Arial",
        //     fontSize: 18,
        //     fill: "black",
        //     stroke: '#444444',
        //     strokeThickness: 3
        // });
        //
        // this.widthText = new PIXI.Text(dataResponse.maxWidth, textStyle);
        // this.widthText.x = path[0] + ((dataResponse.maxWidth - 25)/2) * scaleX;
        // this.widthText.y = path[1]-20;
        // this.template.addChild(this.widthText);
        //
        // this.labelTextLine1 = new PIXI.Text(dataResponse.diameter, textStyle);
        // this.labelTextLine1.x = dataResponse.maxWidth * scaleX - 100;
        // this.labelTextLine1.y = 20;
        // this.template.addChild(this.labelTextLine1);
        //
        // this.labelTextLine2 = new PIXI.Text(dataResponse.angle, textStyle);
        // this.labelTextLine2.x = dataResponse.maxWidth * scaleX - 100;
        // this.labelTextLine2.y = 40;
        // this.template.addChild(this.labelTextLine2);
        //

        for(let i = 0; i < input.texts.length; i++) {
            this.template.addChild(this.createText(input.texts[i]));
        }
        //
        this.template.lineStyle(8, styles.line_color, 1);
        this.template.drawPolygon(input.pathes[0]);
        // this.template.drawPolygon(scalePath);

        return this.template;
    }

    createText(data) {
        let text = new PIXI.Text(data.text, data.style);

        // let style = new PIXI.TextStyle(data.style)
        // console.log(new PIXI.TextMetrics.measureText('AS0003', style));
        text.x = data.x;
        text.y = data.y;

        return text;
    }



    clear() {
        this.template.clear();
        this.template.removeChildren();
    }
};

