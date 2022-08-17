<template>
    <div>
        {{ setTitle("Home") }}
        {{ islogin() }}
        {{  }}
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
                    <a class="login" href="/choose-login">login</a>
                </div>
    </header>
    <section class="main">
        <div class="cont">
            <h2>Hello, I'm Omar, This is<br><span class="">BasketBall Project</span></h2>
            <a :href="session_token ? '/teams' : '/login'" class="main-btn">View Teams</a>
        </div>
    </section>
    <section class="cards" id="services"> 
        <h2 class="title">Services</h2>
        <div class="content">
            <div class="card">
                <div class="icon">
                    <img  src="../assets/login.png" >
                </div>
                <div class="info">
                    <h3>login/Register</h3>
                    <p>The login page to show whether the visitor is (user or Admin), because the users page is different of admin pages.</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <img  src="../assets/teams.png" >
                </div>
                <div class="info">
                    <h3>View Teams</h3>
                    <p>Teams page is displayed all teams basketball worldwide, and display all information about them.</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <img  src="../assets/admin.png" >
                </div>
                <div class="info">
                    <h3>Admin Dashboard</h3>
                    <p>Admin Dashboard is to show and delete users account, and can admin to create a new teams not include in the teams pages, like (local team).</p>
                </div>
            </div>
        </div>
    </section>
    <section class="cards2 contact" id="contact">
        <h2 class="title">Lets work together</h2>
        <div class="content">
            <div class="card">
                <div class="icon">
                    <img style="width: 80px; height: 80px;" src="../assets/phone.png" >
                </div>
                <div class="info">
                    <h3>Phone</h3>
                    <p>+96103143178</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <img style="width: 80px; height: 80px;"  src="../assets/email.png" >
                </div>
                <div class="info">
                    <h3>Email</h3>
                    <p>ghiehomar@gmail.com</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p class="footer-title">Copyright @ <span>Omar Ghieh</span></p>
    </footer>
    </div>
</template>


<script>
import axios from 'axios';


export default {
    name: 'Home_Usr',
    data(){
        return{
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
        islogin(){
            this.user_id = this.$route.params.id;
        },
        logout() {
                this.axios.post(`http://127.0.0.1:8000/api/user/logout?token=${this.session_token}`)
                .then(() => {
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
.nav1 nav a.home{
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






section {
        width: 100%;
        height: 1000px;
}

.main {
    background: url(../assets/cover_nba.jpg) no-repeat;
    background-size: contain;
    background-position: center center;
}

.main h2{
    color: #4E1A81;
    font-size: 1.4em;
    font-weight: 500;
    position: relative;
    right: 30px;
}

.main h2 span{
    display: inline-block;
    margin-top: 10px;
    color: #4E1A81;
    font-size: 2em;
    font-weight: 600;
    position: relative;
    right: 5px;
}



.main-btn {
    color: #fff;
    background-color: #FCB506;
    text-decoration: none;
    font-size: 1.1em;
    font-weight: 600;
    display: inline-block;
    padding: 0.9375em 2.1875em;
    letter-spacing: 1px;
    border-radius: 15px;
    margin-top: 20px;
    margin-bottom: 40px;
    position: relative;
    right: 30px;
    transition: 0.7s ease;
}

.main-btn:hover{
    background-color: #FCB506;
    color: white;
    transform: scale(1.1, 1.1);
}

.cont{
    float: left;
    padding: 120px;
    margin: 170px 40px 40px 20px;
}
.cont a:hover{
    text-decoration: none;
}

.cards{
    background-color: #FCB506;
    border: 2px solid #FCB506;
    border-radius: 25px;
    padding: 50px;
    height: 100%;
    margin: 20px 0px;
}
.cards2 {
    background-color: white;
    padding: 50px;
    height: 100%;
    margin: 20px 0px;
}
.title {
    display: flex;
    justify-content: center;
    color: #3a6cf4;
    font-size: 2.1em;
    font-weight: 800;
    margin-bottom: 30px;
    border-bottom: 2px solid white;
    padding: 20px;
}

.content {
    display: flex;
    justify-content: center;
    flex-direction: row;
    flex-wrap: wrap;
}

.card {
    background-color: #fff;
    width: 21.25em;
    box-shadow: 0 5px 25px rgba(1 1 1 / 15%);
    border-radius: 10px;
    padding: 25px;
    margin: 15px;
    transition: 0.6s ease;
}

.card:hover {
    transform: scale(1.1, 1.1);
}

.icon {
    width: 100%;
    height: 100%; 
    display: flex;
    justify-content: center;
}

.icon img {
    width: 120px;
    height: 120px;
}

.info {
    text-align: center;
}

.info h3{
    color: #3a6cf4;
    font-size: 1.2em;
    font-weight: 700;
    margin: 10px;
}

.contact .icon {
    font-size: 4.5em;
}

.contact .info h3{
    color: black;
}

.contact .info p {
    font-size: 1.2em;
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

</style>
