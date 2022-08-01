<template>
  <div class="home">
    <Header_Ad />
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
      city: ''
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
            city: this.city
            }
            );
            this.name = '';
            this.fullname = '';
            this.description = '';
            this.country = '';
            this.city = '';
        }catch(e){
            console.log(e);
        }
    },
}
}
</script>


<style>

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