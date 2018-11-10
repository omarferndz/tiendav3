// JavaScript Document
var appMar = new Vue({
	el: '#marcas',
	data:{
		marcas: []
	},
	mounted: function(){
		this.getAllMembers();
	},
	methods:{
		getAllMembers: function(){
			axios.get("frontend/appmarcas.php")
				.then(function(response){
					//console.log(response);
					appMar.marcas = response.data.marcas;
				});
		}
	}
});

