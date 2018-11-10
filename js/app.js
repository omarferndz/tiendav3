// JavaScript Document
var appCat = new Vue({
	el: '#categorias',
	data:{
		members: []
	},
	mounted: function(){
		this.getAllMembers();
	},
	methods:{
		getAllMembers: function(){
			axios.get("frontend/appcategorias.php")
				.then(function(response){
					//console.log(response);
					appCat.members = response.data.members;
				});
		}
	}
});

// Marcas
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
// Ubicacion
var appUbi = new Vue({
	el: '#ubicacion',
	data:{
		ubicacion: []
	},
	mounted: function(){
		this.getAllMembers();
	},
	methods:{
		getAllMembers: function(){
			axios.get("frontend/appubicacion.php")
				.then(function(response){
					//console.log(response);
					appUbi.ubicacion = response.data.ubicacion;
				});
		}
	}
});