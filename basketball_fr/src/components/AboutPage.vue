<template>
    <div>
        {{ setTitle("About") }}
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
.nav1 nav a.about{
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