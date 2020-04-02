/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('../../node_modules/pixi.js/dist/pixi.js');
var PIXI = window.PIXI;
import  View from './modules/View.js';
import  PipeCutting from './modules/PipeCutting.js';
import  ImageGenerator from './modules/ImageGenerator.js';
var styles = require('./modules/styles');
import  JsPDF from '../../node_modules/jspdf/dist/jspdf.min';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('image-generator-input', require('./components/ImageGeneratorInput.vue'));
Vue.component('outputa', require('./components/ImageGeneratorOutput.vue'));
var app;


window.onload = function () {
    function setDownloadImage() {
        var canvas = document.getElementsByTagName('canvas');
        let url = canvas[0].toDataURL('image/png');

        url = url.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');

        /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
        this.href = url.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
        document.location.reload(true);

        // url = url.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
        //
        // var doc = new JsPDF("l", "mm", 'a4');
        // doc.addImage(url, "PNG", 10, 10);
        // // doc.text('Hello world!', 10, 10);
        // doc.save('a4.pdf')
        //ff-netto-web

        // var canvas = document.getElementsByTagName('canvas');
        // downloadLnk = document.createElement('a');
        // link.href = canvas[0].toDataURL("image/png");
        // link.download = "demo.png";


    }


    app = new Vue({
        el: '#app',
        data: {
            view: null,
            viewParams :{
                width: null,
                height: null
            },
            downloadUrl: null,
            form: {
                diameter: 60,
                angle:45
            },
            input: {
                'a':3
            },
            dataResponse: {

            }
        },
        methods: {
            calculate: function () {
                const that = this;
                axios.post('/data/pipe-cut', this.form).then(function (response) {
                    that.dataResponse = response.data;
                    that.render();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            render: function () {
                if (!this.view ) {
                    this.createCanvas(this.input.view.params);
                }
                if (this.input
                    && this.input.view
                    && this.input.view.params
                    && this.input.view.params.width
                    && this.input.view.params.height
                ) {
                    this.view.app.renderer.resize(this.input.view.params.width, this.input.view.params.height);
                    // this.view.app.renderer.backgroundColor = this.input.view.params.backgroundColor;
                }
                this.renderTemplate();
            },
            // forceRender: function () {
            //     console.log('forceRender ' );
            //     this.createCanvas(this.input.view.params);
            //    
            //     this.renderTemplate();
            // },
            renderTemplate: function () {
                let template = this.view.getTemplate();
                if (template) {
                    template.clear();
                    if (this.getDataUrl() === '/data/pipe-cut') {
                        template.show(this.dataResponse, this.viewParams);
                    } else {
                        template.show(this.input, this.viewParams);
                    }
                }
            },
            getData: function () {
                const that = this;
                axios.post(
                    this.getDataUrl(),
                    this.input
                ).then(function (response) {
                    // console.log(response.data);
                    // that.dataResponse = response.data;
                    // that.render();
                    // setDownloadImage();


                }).catch(function (error) {
                    console.log(error);
                });
            },
            createTemplate: function () {
                let location = window.location.pathname;
                let slug = location.split('/').pop();
                if (slug === 'pipe-angle-cutting') {
                    return new PipeCutting();
                } else if (slug === 'image-generator') {
                    return new ImageGenerator();
                }
            },
            getDataUrl: function () {
                let location = window.location.pathname;
                let slug = location.split('/').pop();
                if (slug === 'pipe-angle-cutting') {
                    return '/data/pipe-cut';
                } else if (slug === 'image-generator') {
                    return '/data/image-generator';
                }
            },
            setInput: function (input) {
                this.input = input;
            },
            createCanvas: function(params) {
                let canvasElement = window.document.getElementById('canvas');
                if (canvasElement) {
                    if (params && params.width && params.height) {
                        this.viewParams.width = params.width;
                        this.viewParams.height = params.height;
                    } else {
                        this.viewParams.width = canvasElement.offsetWidth;
                        this.viewParams.height = canvasElement.offsetWidth * 0.75;
                    }
                    this.view = new View({"width": this.viewParams.width, "height": this.viewParams.height});
                    let template = this.createTemplate();
                    if (template) {
                        this.view.setTemplate(template);
                    }
                    canvasElement.appendChild(this.view.app.view);
                }
            }
        },
        created: function () {
            if (this.getDataUrl() === '/data/pipe-cut') {
                this.createCanvas();
            }
        },
        mounted: function (){
            if (this.getDataUrl() === '/data/pipe-cut') {
                this.calculate();
            }
        },
    });
    window.vueApp = app;
    var downloadLnk = document.getElementById('downloadLnk');
    if (downloadLnk) {
        downloadLnk.addEventListener('click', setDownloadImage, false);
    }
}
