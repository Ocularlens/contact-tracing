<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="app">
                    {{ info }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    el: '#app',
    data () {
        return {
        info: null
        }
    },
    mounted () {
        axios
        .get('https://api.coindesk.com/v1/bpi/currentprice.json')
        .then(response => (this.info = response))
    }
}
</script>