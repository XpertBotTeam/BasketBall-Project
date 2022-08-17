<template>
  <div class="home">
    <Header_Ad />
    {{ setTitle("Add Teams") }}
    <h1 id="head">Add Teams</h1>
    <form>
      <div id="name" class="form-group">
        <label>Name</label>
        <input type="name"  class="form-control" placeholder="Enter team name.." v-model="name">
      </div>
      <br />
      <div id="fullname" class="form-group">
        <label>FullName</label>
        <input type="name"  class="form-control" placeholder="Enter team full name.." v-model="fullname">
      </div>
      <br />
      <div id="description" class="form-group">
        <label>Description</label>
        <input type="name" class="form-control" placeholder="Enter team Description.." v-model="description">
      </div>
      <br />
      <div id="country" class="form-group">
        <label>Country</label>
        <input type="name" class="form-control" placeholder="Enter team country.." v-model="country">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>City</label>
        <input type="name" class="form-control" placeholder="Enter team City.." v-model="city">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>Logo Link</label>
        <input type="name" class="form-control" placeholder="Enter Team Logo.." v-model="img">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>Ownership</label>
        <input type="name" class="form-control" placeholder="Enter team ownership.." v-model="ownership">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>Head Coach</label>
        <input type="name" class="form-control" placeholder="Enter team headcoach.." v-model="headcoach">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>General Manager</label>
        <input type="name" class="form-control" placeholder="Enter team generalmanager.." v-model="generalmanager">
      </div>
      <br />
      <div id="city" class="form-group">
        <label>Championships</label>
        <input type="name" class="form-control" placeholder="Enter team championships.." v-model="championships">
      </div>
      <br />
      <button type="submit" class="btn btn-primary" @click="saveTeam()">Submit</button>
  </form>
  </div>
</template>

<script>
import Header_Ad from './Header_Ad.vue';
import axios from 'axios';

export default {
  name: 'Add_Teams_Ad',
  components:{
    Header_Ad
  },
  data(){
    return {
      name: '',
      fullname: '',
      description: '',
      country: '',
      city: '',
      img: '',
      ownership: '',
      headcoach: '',
      generalmanager: '',
      championships: ''
    }
  },
  methods: {
    async saveTeam(){
        try{
            await axios.post("http://127.0.0.1:8000/api/teams",
            {
            name: this.name,
            fullName: this.fullname,
            Description: this.description,
            country: this.country,
            city: this.city,
            img: this.img,
            ownership: this.ownership,
            headcoach: this.headcoach,
            generalmanager: this.generalmanager,
            championships: this.championships,
            }
            );
            this.name = '';
            this.fullname = '';
            this.description = '';
            this.country = '';
            this.city = '';
            this.img = '';
            this.ownership = '';
            this.headcoach = '';
            this.generalmanager = '';
            this.championships = '';
        }catch(e){
            console.log(e);
        }
    },
    setTitle(name){
            document.title = name;
        }
}
}
</script>


<style scoped>

#head{
  background-color: black;
  color: white;
  border-bottom: 2px solid black;
  border-bottom-right-radius: 30px;
  border-bottom-left-radius: 30px;
  font-size: 35px;
  padding: 10px;
}
#name{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#fullname{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#description{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#country{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#city{
  width: 500px;
  text-align: center;
  display: inline-block;
}


</style>