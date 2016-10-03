import Vue from 'vue';
import Chart from 'chart.js';

export default Vue.extend({
    template: `
        <div>
            <canvas width="{{{ width }}}" height="{{{ height }}}" v-el:canvas></canvas>
            
        </div>
    `,
    
    data() {
        return {
            legend: '{{{legend}}}',
            
        };
    },


    methods: {
        render(data) {
            //console.log(data);
            const chart = new Chart(
                this.$els.canvas.getContext('2d'),
                {type: data.type, data: data, options: {legend: {display: data.displayLegend}} }
            );//.Bar(data);
          
        }
    }
});
