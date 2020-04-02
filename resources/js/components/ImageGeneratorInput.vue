<template>
    <form>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="prefix">{{ lang.prefix }}</label>
                    <input id="prefix" name="prefix" type="text" class="form-control" v-model="prefix">
                    <label for="number">{{ lang.number }}</label>
                    <input id="number" name="number" type="number" class="form-control" v-model="number">
                    <label for="resolution">{{ lang.resolution }}</label>
                    <select class="form-control" id="resolution" v-model="resolution" >
                        <option v-for="(res, index) in resolutions" v-bind:value="index">{{ res.name }}</option>
                    </select>
                    <label for="calc"></label>
                    <input id="calc" type="button" class="form-control" v-bind:value="lang.apply" v-on:click="apply()">
                    <label for="next_image"></label>
                    <input id="next_image" type="button" class="form-control" v-bind:value="lang.next_image" v-on:click="nextImage()">
                </div>
            </div>
            <div class="col-6">
            </div>
            <div class="col">
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['orderData', 'contractId', 'lang'],
        event: 'purchase',
        data() {
            return {
                prefix: '',
                number: 1,
                resolution: 2,
                timezone: 'Europe/Minsk',
                resolutions: [
                    {
                        name: 'SD (720x576)',
                        width: 720,
                        height: 576
                    },
                    {
                        name: 'HD (1280X720)',
                        width: 1280,
                        height: 720
                    },
                    {
                        name: 'Full HD (1080x1920)',
                        width: 1920,
                        height: 1080
                    },
                    {
                        name: '2k (2048x1152)',
                        width: 2048,
                        height: 1152
                    },
                    {
                        name: 'WQXGA (2560x1600)',
                        width: 2560,
                        height: 1600
                    },
                    {
                        name: 'QSXGA (2560x2048)',
                        width: 2560,
                        height: 2048
                    },
                    {
                        name: '4k (4096x2304)',
                        width: 4096,
                        height: 2304
                    },
                ]
            }
        },
        methods: {
            apply: function () {
                this.send();
            },
            nextImage: function () {
                this.number++;
                this.send();
            },
            send: function () {
                var that = this;
                axios.post(
                    '/data/image-generator',
                    {
                        prefix: this.prefix,
                        number: this.number,
                        resolution: this.resolutions[this.resolution],
                        timezone: this.timezone
                    }
                ).then(function (response) {
                    if (response.data.success === true) {
                        that.$parent.setInput(response.data.data);
//                        that.$emit('render');
                        that.$emit('render');
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            },
            dataImage: function () {

            }
        },
        mounted: function () {
            this.send();
            this.timezone = window.Intl.DateTimeFormat().resolvedOptions().timeZone;
        }
    }
</script>
