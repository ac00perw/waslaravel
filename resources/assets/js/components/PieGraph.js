import Graph from './Graph';
var colorArray=[
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, .5)',
                'rgba(255, 159, 64, 0.4)',
                'rgba(255, 59, 64, 0.4)',
                'rgba(255, 159, 164, 0.4)',
                'rgba(55, 59, 224, 0.7)',
            ];
export default Graph.extend({
    props: ['keys', 'values', 'height', 'width'],

    ready() {

        this.render({

           labels: this.keys,
            type: 'pie',
            // We could also do labels of
            // ['Jeffrey', 'Taylor'], and
            // then use one dataset object.
            datasets: [

                {
                    label: 'Waste by Cost in US Dollars',
                    backgroundColor: colorArray,
                    data: this.values,



                }

               
            ]
        });
    }
});