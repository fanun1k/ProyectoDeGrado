<style type="text/css">
        body { margin: 0; padding: 0; }
        .header { padding: 10px; background: black; color: white; }
        .section { padding: auto; }
</style>

<div id="app">
        <div class="section" style="width: 500px; margin: auto;">
            <qrcode-scanner v-bind:qrbox="250" v-bind:fps="10" style="width: 500px;"></qrcode-scanner>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
Vue.component('qrcode-scanner', {
    props: {
        qrbox: Number,
        fps: Number,
    },
    template: `<div id="qr-code-full-region"></div>`,
    mounted: function () {
        var $this = this;
        var config = { fps: this.fps ? this.fps : 10 };
        if (this.qrbox) {
            config['qrbox'] = this.qrbox;
        }

        function onScanSuccess(decodedText, decodedResult) {
            $this.$root.$emit('decodedCode', decodedText, decodedResult);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner("qr-code-full-region", config);
        html5QrcodeScanner.render(onScanSuccess);
    }
});

var app = new Vue({
    el: '#app',
    data: { header: 'Html5-qrcode using vue.js', result: '' },
    created: function () {
        this.$root.$on('decodedCode', function (decodedText, decodedResult) {
            this.decodedText = decodedText;
            alert(this.decodedText);
        }.bind(this));
    }
});
</script>