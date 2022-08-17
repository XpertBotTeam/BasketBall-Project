<template>
  <div class="users">
    {{ setTitle("Admin Info") }}
    <div class="headTitle">
      <h2>Users</h2>
    </div>
<table class="table">
  <thead>
    <tr class="bgt">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in users" :key="user.id">
      <th scope="row">{{ user.id }}</th>
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>{{ user.password }}</td>
      <td>
        <router-link id="btnEd" :to="{name: 'updateUser',params:{id: user.id}}" class="btn btn-success">Edit</router-link>
        <button type="button" id="btnDe" class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
<div class="headTitle">
      <h2>Teams</h2>
    </div>
<table class="table">
  <thead>
    <tr class="bgt">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">FullName</th>
      <th scope="col">Description</th>
      <th scope="col">Country</th>
      <th scope="col">City</th>
      <th scope="col">img</th>
      <th scope="col">Ownership</th>
      <th scope="col">Head Coach</th>
      <th scope="col">General Manager</th>
      <th scope="col">Championships</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="team in teams" :key="team.id">
      <th scope="row">{{ team.id }}</th>
      <td>{{ team.name }}</td>
      <td>{{ team.fullName }}</td>
      <td>{{ team.Description }}</td>
      <td>{{ team.country }}</td>
      <td>{{ team.city }}</td>
      <td class="tdimg">{{ team.img }}</td>
      <td>{{ team.ownership }}</td>
      <td>{{ team.headcoach }}</td>
      <td>{{ team.generalmanager }}</td>
      <td>{{ team.championships }}</td>
      <td>
        <router-link id="btnEd" :to="{name: 'updateteams',params:{id: team.id}}" class="btn btn-success">Edit</router-link>
        <button type="button" id="btnDe" class="btn btn-danger" @click="deleteTeams(team.id)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
<div class="headTitle">
      <h2>News</h2>
    </div>
<table class="table">
  <thead>
    <tr class="bgt">
      <th scope="col">#</th>
      <th scope="col">Img</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Info</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="neww in newws" :key="neww.id">
      <th scope="row">{{ neww.id }}</th>
      <td class="tdimg">{{ neww.img }}</td>
      <td>{{ neww.title }}</td>
      <td>{{ neww.content }}</td>
      <td>{{ neww.info }}</td>
      <td>
        <router-link id="btnEd" :to="{name: 'updatenews',params:{id: neww.id}}" class="btn btn-success">Edit</router-link>
        <button type="button" id="btnDe" class="btn btn-danger" @click="deleteNews(neww.id)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Users_Ad',
  data(){
    return {
        users: [],
        teams: [],
        newws: [],
    }
  },
  created(){
    this.getusers();
    this.getTeams();
    this.getNews();
  },
  methods: {
    async getusers(){
        try{
            const response = await axios.get("http://127.0.0.1:8000/api/users");
            this.users = response.data;
        }catch(e){
            console.log(e);
        }
    },
    async getTeams(){
        try{
            const response = await axios.get("http://127.0.0.1:8000/api/teams");
            this.teams = response.data;
        }catch(e){
            console.log(e);
        }
    },
    async getNews(){
        try{
            const response = await axios.get("http://127.0.0.1:8000/api/news");
            this.newws = response.data;
        }catch(e){
            console.log(e);
        }
    },
    async deleteUser(id){
        try{
            await axios.delete(`http://127.0.0.1:8000/api/users/${id}`);
            this.getusers();
        }catch(e){
            console.log(e);
        }
    },
    async deleteTeams(id){
        try{
            await axios.delete(`http://127.0.0.1:8000/api/teams/${id}`);
            this.getTeams();
        }catch(e){
            console.log(e);
        }
    },
    async deleteNews(id){
        try{
            await axios.delete(`http://127.0.0.1:8000/api/news/${id}`);
            this.getNews();
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

.table{
  margin: 0;
  padding: 0;
}

.bgt{
    background-color: black;
    color: white;
    height: 90px;
    border: 2px solid black;
    padding: 0;
    margin: 0;
}

#btnEd{
  background-color: #FF5D00;
  border: 2px solid #FF5D00;
  color: white;
  margin-right: 10px;
}
#btnDe{
  background-color: black;
  border: 2px solid black;
  color: white;
}

.headTitle{
  background: black;
  color: white;
  padding: 20px;
  height: 50px;
}


.tdimg{
  width: 30px;
  overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 10px;     /* fallback */
   max-height: 32px;      /* fallback */
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}

</style>

