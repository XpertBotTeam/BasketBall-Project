<template>
    <div>
        {{ setTitle("About") }}
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
                    <router-link class="teams" :to="{name: 'teamclips'}" :style="session_token ? style1 : style2">Team Clips</router-link> <label v-if="session_token">|</label>
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
        <br />
        <div class="ConIm">
            <div class="ConDiv">
                <table>
                    <tr>
                        <td><h1>About us</h1></td>
                    </tr>
                    <tr>
                        <td><p>This Project about "BasketBall Website (News & Teams)"
we have in this website [Home Page & News Page & Teams Page], and include of course Login page, if you want to create new account you can press on regsiter to create one, you can update you profile information any time,
 and the MAIN Topic of this website is to show the nba news and basketball  teams information.</p></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';


export default{
    name: 'AboutPage',
    data(){
        return {
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
        this.getInfo();
    },
    methods: {
        logout() {
                this.axios.post(`http://127.0.0.1:8000/api/user/logout?token=${this.session_token}`)
                .then(() => {
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
.nav1 nav a.about{
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

.ConIm{
    width: 100%;
    height: 700px;
    margin-top: 100px;
    background: url(../assets/cover_nba.jpg) no-repeat;
    background-size: contain;
    background-position: center center;
}

.ConDiv{
    float: left;
    padding: 110px;
}

.ConDiv h1{
    background-color: black;
    color: white;
    border-radius: 15px;
    padding: 30px;
    margin: 10px;
    font-size: 50px;
}
.ConDiv p{
    width: 470px;
    text-align: center;
    font-weight: bold;
}
table{
    width: 40%;
    border-radius: 20px;
}

table td{
        padding: 10px;
        height: 230px;
}


</style>