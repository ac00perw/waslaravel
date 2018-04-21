import Vue from 'vue';
import WasteGraph from './components/WasteGraph';
import CostGraph from './components/CostGraph';
import PieGraph from './components/PieGraph';
import Stats from './components/Stats';

new Vue({
	el: 'body',
	components: { WasteGraph, CostGraph, PieGraph, Stats }
});
