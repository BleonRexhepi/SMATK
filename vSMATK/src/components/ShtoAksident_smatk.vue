<template>
  <div class="ShtoAksident container">
    <h2 class="page-header"><b>Shto Aksidentin</b></h2>
	<Njofto_smatk v-if="alert" v-bind:message="alert" />
    <form v-on:submit="ShtoAksident">
        <div class="well">
            <h4 style="color:blue">Rrethanat e Aksidentit</h4><br>
            <div class="form-group">
                <label>Lokacioni</label>
			    <input type="text" class="form-control" placeholder="Lokacioni" v-model="aksidenti.Lokacioni_SMATK" />
            </div>
            <div class="form-group">
                <label>Data</label>
			    <input type="date" class="form-control"  v-model="aksidenti.Koha_SMATK"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:blue">Detajet e Aksidentit</h4><br>
            <div class="form-group">
                <label>Të Aksidentuarit</label>
				<input type="text" class="form-control" placeholder="Të Aksidentuarit" v-model="aksidenti.TeAksidentuarit_SMATK"/>
            </div>
			<div class="form-group">
                <label>Shkaku i Aksidentit</label>
                <textarea class="form-control" placeholder="Shkaku i Aksidentit" v-model="aksidenti.ShkakuAksidentit_SMATK"></textarea>
            </div>
        </div>
        <div class="well">
            <h4 style="color:blue">Pasojat e Aksidentit</h4><br>
            <div class="form-group">
                <label>Dëmet Materiale</label>
			    <input type="text" class="form-control" placeholder="Dëmet Materiale" v-model="aksidenti.DemetMateriale_SMATK"/>
            </div>
			<div class="form-group">
                <label>Dëmet në Njerzë</label>
			    <input type="text" class="form-control" placeholder="Dëmet në Njerzë" v-model="aksidenti.DemetneNjerz_SMATK"/>
            </div>
            <div class="form-group">
                <label>Arrestime</label>
			    <input type="number" class="form-control" placeholder="Arrestime" v-model="aksidenti.Arrestime_SMATK"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Dërgo</button>
    </form><br><br><br>
  </div>
</template>

<script>
import Njofto_smatk from './Njofto_smatk';
export default {
  name: 'ShtoAksident',
  data () {
    return {
      aksidenti: {},
	  alert:''
    }
  },
  methods: {
		ShtoAksident(e){
				if(!this.aksidenti.Lokacioni_SMATK || !this.aksidenti.Koha_SMATK || !this.aksidenti.TeAksidentuarit_SMATK){
				this.alert = 'Ju lutem plotesoni te gjitha fushat!';
			} else {
				let AksidentiRi = {
					Lokacioni_SMATK: this.aksidenti.Lokacioni_SMATK,
					Koha_SMATK: this.aksidenti.Koha_SMATK,
					TeAksidentuarit_SMATK: this.aksidenti.TeAksidentuarit_SMATK,
					ShkakuAksidentit_SMATK: this.aksidenti.ShkakuAksidentit_SMATK,
					DemetMateriale_SMATK: this.aksidenti.DemetMateriale_SMATK,
					DemetneNjerz_SMATK: this.aksidenti.DemetneNjerz_SMATK,
					Arrestime_SMATK: this.aksidenti.Arrestime_SMATK
				}
				this.$http.post('http://slimapp/api/aksidentet/shto', AksidentiRi)
				.then(function(response){
					this.$router.push({path: '/', query: {alert: 'Aksidenti u shtua!'}});
				});
				e.preventDefault();
			}
		e.preventDefault();
		}
	},
	components: {
        Njofto_smatk
	}
}
</script>