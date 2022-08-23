<template>
    <div>
        {{ setTitle("Team Clips") }}
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
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="selector">
            <label for="teams">Choose a Team:</label>

            <select name="teams" id="teams" v-model="selected" @change="chooseVideo()">
            <option v-for="team in teams" :key="team.id" :value="{name: team.fullName}" >{{ team.fullName }}</option>
            </select>
        </div>
        <div class="cover1" v-if="videoId">
            <youtube class="youtube" :video-id="videoId" ref="youtube" @playing="playing"></youtube>
        </div>
        <div class="cover2" v-else>
            <h2>No Video</h2>
        </div>
        <footer class="footer">
            <p class="footer-title">Copyright @ <span>Omar Ghieh</span></p>
        </footer>
    </div>
</template>


<script>
import axios from 'axios';
import Auth from './Auth.js';


export default {
    name: 'TeamClips',
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
            selected: [],
            videoId: '',
        }
    },
    created(){
        this.getInfo();
        this.getTeams();
    },
    methods: {
        setTitle(name){
                document.title = name;
        },
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
                        this.teams = response.data;
                }catch(e){
                    console.log(e);
                }
    },
    playVideo() {
        this.player.playVideo()
    },
    playing() {
        console.log('we are watching!!!')
    },
    chooseVideo(){
        if(this.selected.name == "Atlanta Hawks"){
            this.videoId = 'lR4vlXpvp1k';
        }
        else if(this.selected.name == 'Boston Celtics'){
            this.videoId = '1GI3xiBQkOc';
        }
        else if(this.selected.name == 'Brooklyn Nets'){
            this.videoId = 'R73peHIhGHE';
        }
        else if(this.selected.name == 'Charlotte Hornets'){
            this.videoId = '1-4Hx1Uzk2M';
        }
        else if(this.selected.name == 'Chicago Bulls'){
            this.videoId = 'qA2CMX8Ihow';
        }
        else if(this.selected.name == 'Cleveland Cavaliers'){
            this.videoId = '-siIwqu8Ti4';
        }
        else if(this.selected.name == 'Dallas Mavericks'){
            this.videoId = 'MEs5owtx_qQ';
        }
        else if(this.selected.name == 'Toronto Raptors'){
            this.videoId = '7wIwo91Kfas';
        }
        else if(this.selected.name == 'London Lightning'){
            this.videoId = 'Q3t71YjW4wQ';
        }
        else if(this.selected.name == 'KW Titans'){
            this.videoId = 'JPsEO_F-v5Q';
        }
        else if(this.selected.name == 'BC Khimki'){
            this.videoId = 'LMIp-9ZL9vw';
        }
        else if(this.selected.name == 'Al-Hilal'){
            this.videoId = 'Ki0wLdHGvyo';
        }
        else if(this.selected.name == 'Limoges CSP'){
            this.videoId = 'ETyYyWPqIi4';
        }
        else if(this.selected.name == 'Antibes Sharks'){
            this.videoId = '6WVC5xmZLy0';
        }
        else if(this.selected.name == 'Al Riyadi Club Beirut'){
            this.videoId = 'cgs8HrNIdEA';
        }
        else if(this.selected.name == 'Champville SC'){
            this.videoId = 'BWd4GeMT5dQ';
        }
        else if(this.selected.name == 'Beirut Club'){
            this.videoId = 'PSZjiiMWE2A';
        }else{
            this.videoId = '';
        }
    }
    },
    computed: {
    player () {
        return this.$refs.youtube.player
    },
    },
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
.nav1 nav a.teamclips{
    color: #001f3f;
}
.nav1 nav a.news:hover{
    color: #001f3f;
}
.nav1 nav a.teams:hover{
    color: #001f3f;
}
.nav1 nav a.home:hover{
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


.selector{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    padding: 10px 0px;
}

.selector label{
    color: black;
    font-size: 25px;
    font-weight: 500;
    margin-right: 10px;
    margin-top: 10px;
}

.selector select{
    width: 30%;
    height: 35px;
    border-radius: 5px;
    margin-top: 10px;
}

.cover1{
    width: 100%;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
    margin-bottom: 70px;
}
.cover2{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
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