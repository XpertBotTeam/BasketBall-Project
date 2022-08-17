<template>
    <div class="header">
        <div class="img">
            <img  src="../assets/Logo_BP.png">
        </div>
        <nav class="nav">
        <router-link to="/admin">Users</router-link> |
        <router-link to="/add-news">Add News</router-link> |
        <router-link to="/add-teams">Add Teams</router-link> |
        <router-link to="/admin-register">Create Admin</router-link> 
        </nav>
        <div class="adminL" v-if="AdminToken">
            <button class="login" @click="logout()">Logout</button>
        </div>
        <div class="adminL" v-else>
            <img  src="../assets/admin-logo.png">
        </div>
    </div>
</template>


<script>
export default {
    name: 'Header_Ad',
    data(){
    return {
        AdminToken:  window.sessionStorage.getItem("admin-token"),
        }
    },
    methods:{
        logout() {
                this.axios.post(`http://127.0.0.1:8000/api/admin/logout?token=${this.AdminToken}`)
                .then(() => {
                    sessionStorage.clear();
                    this.$router.push('/choose-login');
                })
                .catch((error) => {
                    console.log(error);
                });
            },
    }
}
</script>


<style scoped>

*{
    margin: 0;
    padding: 0;
}

.header{
    width: 100%;
    height: 100px;
    background-color: #D35400;
    border-radius: 0px;
    display: flex;
    justify-content: space-between;
}
.img {
    width: 10%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.img img {
    width: 180px;
    height: 170px;
    margin-top: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.nav{
    width: 70%;
    height: 100%;
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
}

.nav a {
   font-size: 20px;
   margin: 0px 50px 0px 50px;
   color: white;
   text-decoration: none;
   
}
.nav a:hover {
   color: #DDDD2E;
   text-decoration: none;
}

nav a.router-link-exact-active {
  color: #DDDD2E;
}

.adminL{
    width: 15%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.adminL img {
    width: 80px;
    height: 80px;
    margin: 10px;
}


button.login{
    color: white;
    background-color: black;
    border: 2px solid black;
    border-radius: 10px;
    padding: 10px 25px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: 0.5s ease;
}

button.login:hover {
    color: #FCB506;
    transform: scale(1.1, 1.1);
}

</style>