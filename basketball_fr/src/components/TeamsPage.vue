<template>
    <div>
        {{ setTitle("Teams") }}
        <header>
        <div class="lo">
                <a href="/"><img class="logo" src="../assets/Logo_Us_BP.png"></a>
        </div>
        <div class="nav1">
            <nav class="navigation">
                <router-link class="home" to="/">Home</router-link>
                <router-link class="news" :to="{name: 'news'}" :style="session_token ? style1 : style2">News</router-link>
                <router-link class="teams" :to="{name: 'teams'}" :style="session_token ? style1 : style2">Teams</router-link>
                <router-link class="about" :to="{name: 'about'}">About us</router-link>
            </nav>
        </div>
                <div class="logio" v-if="session_token">
                    <div class="dropdown">
                        <button class="dropbtn">
                        {{ user_name }}
                        <img class="dropmenu" src="../assets/dropmenu.png">
                        </button>
                        <div class="dropdown-content">
                            <router-link :to="{name: 'editprofile', params:{id: info.id}}">Profile</router-link>
                            <a href="javascript:void(0)" @click="logout()">logout</a>
                        </div>
                    </div>
                </div>
                <div class="logio" v-else>
                    <a class="login" href="/login">login</a>
                </div>
        </header>
        <div class="newsC">
            <div class="con" v-for="team in teams" :key="team.id">
                <router-link class="a" :to="{name: 'TeamDetails', params:{id: team.id}}">
                    <div class="content">
                        <div class="logoo">
                            <img  :src="team.img" >
                        </div>
                        <div class="info">
                            <p class="p1">Name: <span>{{ team.fullName }}</span></p>
                            <p class="p2">Country: <span>{{ team.country }}</span></p>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
        <footer class="footer">
        <p class="footer-title">Copyright @ <span>Omar Ghieh</span></p>
    </footer>
    </div>
</template>


<script>
import axios from 'axios';
import Auth from './Auth.js';

export default{
    name: 'TeamsPage',
    data(){
        return {
            teams: [],
            info: [],
            user_id: '',
            session_token: window.sessionStorage.getItem("token"),
            style1: {
                display: 'inline-block',
            },
            style2: {
                display: 'none',
            },
            user_name: '',
        }
    },
    created(){
        this.getTeams();
        this.getInfo();
    },
    methods:{
        logout() {
                this.axios.post(`http://127.0.0.1:8000/api/user/logout?token=${this.session_token}`)
                .then(() => {
                    Auth.logout();
                    sessionStorage.clear();
                    this.$router.push('/');
                })
                .catch((error) => {
                    console.log(error);
                });
            },
        async getInfo(){

            if(this.session_token){
                try{
                        const response = await axios.get(`http://127.0.0.1:8000/api/user/profile?token=${this.session_token}`);
                        this.info = response.data;
                        this.user_name = this.info.name;
                }catch(e){
                    console.log(e);
                }
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
    setTitle(name){
            document.title = name;
        }
    }
}
</script>



<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
html{
    scroll-behavior: smooth;
}

*{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;

}

header{
    background-color: #FCB506;
    width: 100%;
    height: 140px;
    position: fixed;
    z-index: 3;
    display: flex;
    justify-content: space-between;
    padding: 10px 100px;
    border: 2px solid #FCB506;
    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;
}
.logo{
    width: 150px;
    height: 130px;
}


a.login{
    color: white;
    background-color: black;
    border: 2px solid black;
    border-radius: 10px;
    padding: 10px 25px;
    text-decoration: none;
    font-size: 1.2em;
    font-weight: 500;
    transition: 0.5s ease;
}

a.login:hover {
    color: #FCB506;
    transform: scale(1.1, 1.1);
}



.lo{
    width: 10%;
    height: 100%;
    display: flex;
    justify-content: center;
}
.nav1{
    width: 60%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav1 nav a{
    color: #601cfc;
    text-decoration: none;
    margin: 0 30px;
    font-size: 1.4em;
    font-weight: 500;
}
.nav1 nav a.teams{
    border-bottom: 2px solid black;
    border-radius: 8px;
}
.nav1 nav a.news:hover{
    color: #7d48f8;
}
.nav1 nav a.teams:hover{
    color: #7d48f8;
}
.nav1 nav a.about:hover{
    color: #7d48f8;
}

.logio{
    width: 10%;
    display: flex;
    justify-content: center;
    align-items: center;
}


.dropdown .dropbtn {
    font-size: 21px;
    border: none;
    outline: none;
    color: #0B55BE;
    padding: 14px 16px;
    background-color: #f9f9f9;
    border-radius: 10px;
    font-family: inherit;
    margin: 0;
    display: flex;
    justify-self: center;
    flex-direction: row;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    color: 	#043E90;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 999;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropmenu{
    width: 15px;
    height: 15px;
    margin: 10px 5px;
}

.newsC{
    width: 100%;
    height: 100%;
    background-color: #F6F6F6;
    padding: 200px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
}

.con{
    width: 28%;
    height: 300px;
    margin: 20px;
}
.content{
    width: 100%;
    height: 300px;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(1 1 1 / 55%);
    transition: 0.6s ease;
}
.content:hover {
        transform: scale(1.1, 1.1);
}

.logoo{
    width: 100%;
    height: 150px;
    border-radius: 15px;
}
.logoo img{
    width: 100%;
    height: 190px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.info{
    width: 100%;
    height: 130px;
    border-radius: 15px;
    padding-top: 40px;
}

.p1{
    width: 100%;
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
    text-align: left;
}
.p1 span{
    padding-left: 5px;
    color: black;
}
.p2{
    width: 100%;
    font-size: 15px;
    font-weight: bold;
    padding: 10px;
    text-align: left;
}

.p2 span{
    padding-left: 5px;
    color: black;
}

.footer{
    background-color: black;
    color: #fff;
    padding: 1em;
    display: flex;
    justify-content: center;
}

.footer-title{
    font-size: 1.2em;
    font-weight: 600;
    padding: 7px 0 0 0;
}

.footer-title span{
    color: #FCB506;
}

</style>