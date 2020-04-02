<template>

</template>

<script>
    export default {
        data() {
            return {
                number: 1,
                resolution: 2
            }
        },
        methods: {
//            show: function () {
//                this.send();
//                console.log('set');
//            },
//            nextImage: function () {
//                this.number++;
//                this.send();
//                console.log('nextImage');
//            },
//            send: function () {
//                axios.post(
//                    '/data/image-generator',
//                    {
//                        number: this.number,
//                        resolution: this.resolutions[this.resolution]
//                    }
//                ).then(function (response) {
//                    console.log(response.data)
//
//
//                }).catch(function (error) {
//                    app.showLoader = false;
//                    console.log(error);
//                });
//            }
        },
        mounted() {
            console.log('Component ImageGeneratorOutput.vue mounted.')
        }
    }
</script>
