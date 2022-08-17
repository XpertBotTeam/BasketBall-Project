<template>
    <div class="updBg">
        {{ setTitle("Edit Users") }}
        <div class="infoUs">
            <form>
            <div class="form-group">
                <label>Name</label>
                <input type="name"  class="form-control" placeholder="Enter name.."  v-model="name">
            </div>
            <br />
            <div class="form-group">
                <label>Email</label>
                <input type="email"  class="form-control" placeholder="Enter email.." v-model="email">
            </div>
            <br />
            <div class="form-group">
                <label>Password</label>
                <input type="name" class="form-control" placeholder="Enter password.." v-model="password">
            </div>
            <br />
            <button type="button" class="btnn" @click="saveUsers()">Save</button>
            <br />
        </form>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

export default{
    name: 'UpdateUsers_Ad',
    data(){
        return {
            name: '',
            email: '',
            password: '',
        }
    },
    created(){
        this.getUsersDetails();
    },
    methods:{
        async getUsersDetails(){
        try{
            const response = await axios.get(`http://127.0.0.1:8000/api/users/${this.$route.params.id}`);
            this.name = response.data.User.name;
            this.email = response.data.User.email;
            this.password = response.data.User.password;
        }catch(e){
            console.log(e);
        }
    },
    async saveUsers(){
        try{
            await axios.put(`http://127.0.0.1:8000/api/users/${this.$route.params.id}`,
            {
            name: this.name,
            email: this.email,
            password: this.password,
            });
            this.name = '';
            this.email = '';
            this.password = '';     
            this.$router.push({ name: 'admin' });
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


<style>

.updBg{
    width: 100%;
    height: 100%;
    background-color: black;
    display: flex;
    justify-content: center;
}

.infoUs{
    width: 50%;
    height: 600px;
    margin: 35px;
    background-color: rgba(255, 255, 255, 0.801);
    border-radius: 10px;
    padding: 50px;
}

.btnn{
    background-color: black;
    border-radius: 10px;
    color: white;
    padding: 15px 50px;
    margin: 20px;
    transition: 0.7s ease;
}

.btnn:hover{
    color: #FCB506;
}
</style>