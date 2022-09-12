<template>
	<div class="aksidentet_smatk container">
		<Njofto_smatk v-if="alert" v-bind:message='alert' />
		<h2 class="page-header"><b>Menaxho Aksident</b></h2>
	 	<input class="form-control" placeholder="Ju lutem jepni lokacionin e aksidentit!" v-model="filtrofillimi">
	 	<br>
		<table class="table table-striped">
            <thead>
				<tr>
					<th style="text-align:left">Lokacioni</th>
					<th style="text-align:left">Data</th>
					<th style="text-align:left">Të Aksidentuarit</th>
					<th style="text-align:left">Shkaku i Aksidentit</th>
					<th style="text-align:left">Dëmet Materiale</th>
					<th style="text-align:left">Dëmet në Njerzë</th>
					<th style="text-align:left">Arrestime</th>		
					<th style="text-align:center">Modifiko/Fshij</th>			
				</tr>
			</thead>
			<tbody>
				<tr v-for="aksidenti in filtroPrej(aksidentet_smatk, filtrofillimi)">
					<td style="text-align:left">{{aksidenti.Lokacioni_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.Koha_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.TeAksidentuarit_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.ShkakuAksidentit_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.DemetMateriale_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.DemetneNjerz_SMATK}}</td>
					<td style="text-align:left">{{aksidenti.Arrestime_SMATK}}</td>
					<td>
						<router-link class="btn btn-primary" v-bind:to="'/ModifikoAksident_smatk/'+aksidenti.NumriAksidentit_SMATK">Modifiko</router-link> 
						<button class="btn btn-danger " v-on:click="FshijeAksidentin(aksidenti.NumriAksidentit_SMATK)">Fshij</button> <br>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import Njofto_smatk from './Njofto_smatk'
	export default {
		name: 'aksidentet_smatk',
		data () {
			return {
				aksidentet_smatk: [],
				alert: '',
				filtrofillimi:''
			}
		},
		methods: {
			fetchaksidentet_smatk(){
				this.$http.get('http://slimapp/api/aksidentet')
				.then(function(response){
					this.aksidentet_smatk = response.body;
				});
				
			},
			filtroPrej(list, value){
				value=value.charAt(0).toUpperCase()+value.slice(1);		
				return list.filter(function(aksidenti){				
					return aksidenti.Lokacioni_SMATK.indexOf(value) > -1;
				});
			},
			FshijeAksidentin(NumriAksidentit_SMATK){
				this.$http.delete('http://slimapp/api/aksidentet/fshij/'+NumriAksidentit_SMATK)
				.then(function(response){
					this.$router.push({path: '/', query: {alert: 'Aksidenti u fshij!'}});
					window.location.reload();
				});
			}
		},
		created: function(){
			if(this.$route.query.alert){
			this.alert=this.$route.query.alert;
			}
			this.fetchaksidentet_smatk();
		},
		components: {
			Njofto_smatk
		}
	}
</script>