<template>
    <div class="body">
        {{ setTitle("Teams") }}
        <header>
            <div class="lo">
                    <a href="/"><img class="logo" src="../assets/Logo_Us_BP.png"></a>
                    <h2><span class="org">BASKET</span><span class="bla">BALL</span></h2>
            </div>
            <div class="nav1">
                <nav class="navigation">
                    <router-link class="home" to="/">Home</router-link> |
                    <router-link class="news" :to="{name: 'news'}" :style="session_token ? style1 : style2">News</router-link> <label v-if="session_token">|</label>
                    <router-link class="teams" :to="{name: 'teams'}" :style="session_token ? style1 : style2">Teams</router-link> <label v-if="session_token">|</label>
                    <router-link class="teamclips" :to="{name: 'teamclips'}" :style="session_token ? style1 : style2">Team Clips</router-link> <label v-if="session_token">|</label>
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
                        <a class="login" href="/choose-login">login</a>
                    </div>
        </header>
        <div class="search">
            <div class="s1">
                <span><img src="../assets/search_icon.png" /></span>
                <input type="text" placeholder="Search teams..." v-model="search_team" />
            </div>
        </div>
        <div class="newsC" v-if="teams != ''">
            <div class="con" v-for="team in filterTeams" :key="team.id">
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
        <div class="loading" v-else>
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <footer class="footer" v-if="teams != ''">
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
            search_team: '',
        }
    },
    created(){
        this.getInfo();
        this.getTeams();
    },
    computed:{
        filterTeams: function(){
            return this.teams.filter((team) => {
                return team.fullName.match(this.search_team);
            })
        }
    },
    methods:{
        logout() {
                this.axios.post(`http://127.0.0.1:8000/api/user/logout?token=${this.session_token}`)
                .then(() => {
                    Auth.logout();
                    sessionStorage.clear();
                    this.$router.push('/login');
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
                    setTimeout(() => {
                        this.teams = response.data;
                    },1500);
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

.body{
    background-color: #F6F6F6;
}

header{
    background-color: #FCB506;
    width: 100%;
    height: 90px;
    position: fixed;
    z-index: 3;
    display: flex;
    justify-content: space-between;
    padding: 10px 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.logo{
    width: 80px;
    height: 70px;
}


a.login{
    color: white;
    background-color: black;
    border-radius: 10px;
    padding: 8px 20px;
    text-decoration: none;
    font-size: 20px;
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
    align-items: center;
    flex-direction: row;
}
.lo h2{
    color: white;
    font-weight: 500;
    font-size: 25px;
}
.nav1{
    width: 80%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav1 nav a{
    color: white;
    text-decoration: none;
    margin: 0 20px;
    font-size: 20px;
    font-weight: 500;
    transition: 0.5s ease;
}
.nav1 nav a.teams{
    color: #001f3f;
}
.nav1 nav a.news:hover{
    color: #001f3f;
}
.nav1 nav a.home:hover{
    color: #001f3f;
}
.nav1 nav a.teamclips:hover{
    color: #001f3f;
}
.nav1 nav a.about:hover{
    color: #001f3f;
}

.logio{
    width: 3%;
    display: flex;
    justify-content: center;
    align-items: center;
}



.dropdown .dropbtn {
    font-size: 20px;
    border: none;
    outline: none;
    color: #0B55BE;
    padding: 5px 16px;
    background-color: #f9f9f9;
    border-radius: 5px;
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

.org{
    color: #E16A32;
    font-weight: 650;
}

.bla{
    color: black;
    font-weight: 650;
}


.newsC{
    width: 100%;
    height: 100%;
    background-color: #F6F6F6;
    padding: 20px 200px;
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





.lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    z-index: 1999;
}
.lds-roller div {
    animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    transform-origin: 40px 40px;
}
.lds-roller div:after {
    content: " ";
    display: block;
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: black;
    margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
    animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
    top: 63px;
    left: 63px;
}
.lds-roller div:nth-child(2) {
    animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
    top: 68px;
    left: 56px;
}
.lds-roller div:nth-child(3) {
    animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
    top: 71px;
    left: 48px;
}
.lds-roller div:nth-child(4) {
    animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
    top: 72px;
    left: 40px;
}
.lds-roller div:nth-child(5) {
    animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
    top: 71px;
    left: 32px;
}
.lds-roller div:nth-child(6) {
    animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
    top: 68px;
    left: 24px;
}
.lds-roller div:nth-child(7) {
    animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
    top: 63px;
    left: 17px;
}
.lds-roller div:nth-child(8) {
    animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
    top: 56px;
    left: 12px;
}
@keyframes lds-roller {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.loading{
    width: 100%;
    height: 600px;
    display: flex;
    justify-content: center;
    padding-top: 180px;
}

.search{
    width: 100%;
    height: 210px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.search input{
    border: none;
}

.search img{
    width: 35px;
    height: 35px;
    position: absolute;
    bottom: 10px;
}

.s1{
    position: absolute;
    bottom: 20px;
    width: 60%;
    height: 60px;
    padding: 15px;
    border: 2px solid #FCB506;
    border-radius: 11px;
    font-weight: 500;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    display: flex;
    justify-content: space-between;
}

.s1 input{
    width: 93%;
    height: 100%;
    background: #F6F6F6;
    padding: 10px;
    font-weight: 500;
}
.s1 input:focus{
    outline: none;
}
</style>