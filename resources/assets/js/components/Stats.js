import Vue from 'vue';
import VueResource from 'vue-resource';
Vue.use(require('vue-resource'));

window.Vue = Vue;

export default Vue.extend({
    template: `
        {{{ userData.id[2] }}}
            <div class="col-md-8 stats" >
                    <table>
                        <thead>
                            <tr>
                            <td></td><td><img class="small-avatar" src="{{{ userData.avatar_path[0] }}}" /> </td><td> <img class="small-avatar" src="{{{ userData.avatar_path[1] }}}" /></td>
                            </tr>
                            <tr>
                            <td></td><td><a href="/home/{{{ userData.id[0] }}}/{{{ userData.range.start }}}/{{{ userData.range.end }}}">{{{ userData.team_name[0] }}}</a> </td><td> <a href="/home/{{{ userData.id[1] }}}">{{{ userData.team_name[1] }}}</a></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="stat">
                                <td class="key">Total Teammates</td><td>{{{ userData.teammates[0] }}} </td><td> {{{ userData.teammates[1] }}}</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Total Weight</td><td>{{{ userData.total_weight[0] }}} oz. </td><td> {{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Total Cost</td><td> $ {{{ userData.total_cost[0] }}} </td><td> $ {{{ userData.total_cost[1] }}}</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Best Month</td><td>{{{ userData.total_weight[0] }}} oz.</td><td>{{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">$ vs Spend</td><td>{{{ userData.total_weight[0] }}} oz.</td><td>{{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Dilligence</td><td>{{{ userData.total_weight[0] }}} oz.</td><td>{{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Best Month</td><td>{{{ userData.total_weight[0] }}} oz.</td><td>{{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Most Efficient Food Type</td><td>{{{ userData.total_weight[0] }}} oz.</td><td>{{{ userData.total_weight[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Total Weight Per Teammate</td><td>{{{ userData.total_weight_per_teammate[0] }}} oz.</td><td>{{{ userData.total_weight_per_teammate[1] }}} oz.</td>
                            </tr>
                            <tr class="stat">
                                <td class="key">Total Cost Per Teammate</td><td>\${{{ userData.total_cost_per_teammate[0] }}}</td><td>\${{{ userData.total_cost_per_teammate[1] }}}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>

        
    `,
    props: ['challenge'],
    data() {
         return { 
            userData: [],
            id: this.challenge,
        }
    },  
    created() {
        this.fetchStats();
        
        
    },
    methods: {
        
        fetchStats: function(){
            var id=parseInt(this.challenge);
            this.$http.get('/challenge/'+ id +'/stats').then(function(users){
                this.$set('userData', users.body);
                console.log(users.body);
            });
        }
    }

});
