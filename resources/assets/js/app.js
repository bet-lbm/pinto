new Vue({

	el:'#crud',

	created:function(){
		this.getKeeps();
	},

	data:{
		keeps:[]
	},
	methods:{
		getKeeps: function(){
			var urlKeeps='task';
			axios.get(urlKeeps).then(response=>{
				this.keeps=response.data
			});
		}
	}
});