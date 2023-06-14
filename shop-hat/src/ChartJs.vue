<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script>
import { Bar, reactiveProp } from "vue-chartjs";

export default {
  extends: Bar,
  mixins: [reactiveProp],
  props: ["chartData", "options"],
  mounted() {
    this.renderChart(this.chartData, this.options);
  },
};
</script>
