<template>
    <div>
        <h3>Bitcoin rates from 01.01.2015 to 31.12.2017</h3>
        <trading-vue v-if="!loading" :data="this.$data" :width="this.width - 40" :height="this.height - 100"></trading-vue>
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
      axios.get('http://kalyna-test.atwebpages.com/api/bitcoin/rates')
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