import Vue from 'vue';
import WasteGraph from './components/WasteGraph';
import CostGraph from './components/CostGraph';
import PieGraph from './components/PieGraph';

new Vue({
	el: 'body',
	components: { WasteGraph, CostGraph, PieGraph }
});

