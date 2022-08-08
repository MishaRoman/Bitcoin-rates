<template>
    <div>
        <h3>Bitcoin rates from 01.01.2015 to 31.12.2017</h3>
        <div id="loading" v-if="loading"></div>
        <trading-vue v-else :data="this.$data" :width="this.width - 40" :height="this.height - 100"></trading-vue>
    </div>
</template>
<script>

import TradingVue from 'trading-vue-js'
import axios from 'axios'

export default {
  name: 'app',
  components: { TradingVue },
  data() {
    return {
      ohlcv: [],
      loading: true,
      width: window.innerWidth,
      height: window.innerHeight,
    }
  },
  methods: {
    getData() {
      axios.get('http://localhost:8000/api/bitcoin/rates')
        .then(res => {
          this.ohlcv = res.data.data
          this.loading = false
        })
      },
    onResize(event) {
      this.width = window.innerWidth
      this.height = window.innerHeight
    }
  },
  mounted() {
    this.getData()
    window.addEventListener('resize', this.onResize)
  },
  beforeDestroy() {
      window.removeEventListener('resize', this.onResize)
  },
}

</script>

<style>
#loading {
  display: inline-block;
  width: 50px;
  height: 50px;
  border: 5px solid blue;
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
  position: fixed;
  top: 50%;
  left: 50%;
}

@keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}
</style>