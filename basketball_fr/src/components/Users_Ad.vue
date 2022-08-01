<template>
  <div class="users">
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
        <button type="button" class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
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
    }
  },
  created(){
    this.getusers();
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
    async deleteUser(id){
        try{
            await axios.delete(`http://127.0.0.1:8000/api/users/${id}`);
            this.getusers();
        }catch(e){
            console.log(e);
        }
    }
  }
}
</script>


<style>

.bgt{
    background-color: black;
    color: white;
    height: 90px;
    border: 2px solid black;
}

</style>

