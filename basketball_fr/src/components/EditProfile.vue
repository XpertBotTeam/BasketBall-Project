<template>
    <div>
        {{ setTitle("Edit Profile") }}
        {{ takeParam() }}
        <div class="popup" ref="popup" id="noblur">
                <img src="../assets/verifypopup.png">
                <h2 class="success">Success!</h2>
                <p>Profile Updated Successfully</p>
        </div>
        <header>
        <div class="lo">
                <a href="/"><img class="logo" src="../assets/Logo_Us_BP.png"></a>
        </div>
        <div class="nav1">
            <nav class="navigation">
                <router-link class="home" to="/">Home</router-link>
                <router-link class="news" :to="{name: 'news'}" :style="session_token? style1 : style2">News</router-link>
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
                            <router-link to="/">Profile</router-link>
                            <a href="javascript:void(0)" @click="logout()">logout</a>
                        </div>
                    </div>
                </div>
                <div class="logio" v-else>
                    <a class="login" href="/login">login</a>
                </div>
    </header>
    <section class="head">
        <h2 class="editH">Edit Profile</h2>
    </section>
    <section class="main">
            <div class="info">
                    Name <input v-model="info.name" class="inp" type="text" placeholder="Enter your name...." ><br/>
                    Email <input v-model="info.email" class="email" type="email" placeholder="Enter your email...." ><br/>
                    Password <input ref="myInput" v-model="info.password" class="pass" type="password" showPassword="true" placeholder="Enter your password...." ><br/>
                    <input class="checkbox" type="checkbox" @click="showPassword()"> Show Password <br />
                    <button type="button" @click="saveProfile()">Save</button>
            </div>
    </section>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: 'EditProfile',
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
    methods:{
        takeParam(){
            this.user_id = this.$route.params.id;
        },
        setTitle(name){
                document.title = name;
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
            showPassword() {
                var x = this.$refs.myInput;
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
        },
        async saveProfile(){
        try{
            await axios.put(`http://127.0.0.1:8000/api/users/${this.info.id}`,
            {
            name: this.info.name,
            email: this.info.email,
            password: this.info.password,
            });
            this.openPopup();

            setTimeout(() => {
                window.location.reload();
            }, 2000);
        }catch(e){
            console.log(e);
        }
    },
    openPopup(){
            let popup = this.$refs.popup;
            popup.classList.add("open-popup");
        },
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

a{
    text-decoration: none;
}

header{
    background-color: #FCB506;
    width: 100%;
    height: 140px;
    position: fixed;
    z-index: 3;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
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

.nav1 nav a.home:hover{
        color: #7d48f8;
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


.head{
    width: 100%;
    height: 250px;
    background: black;
    position: relative;
}


.editH{
    width: 100%;
    font-size: 45px;
    color: #fff;
    position: absolute;
    bottom: 0;
    margin-bottom: 25px;
}

.main{
    width: 100%;
    height: 100vh;
    background: black;
    display: flex;
    justify-content: center;
    align-items: center;
}


.info{
    width: 50%;
    height: 500px;
    background: #fff;
    border-radius: 24px;
    padding: 20px;
}

.inp{
    width: 100%;
    padding: 10px;
    height: 45px;
    border-radius: 5px;
    margin-bottom: 30px;
}
.email{
    width: 100%;
    height: 45px;
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 10px;
}
.pass{
    width: 100%;
    height: 45px;
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 10px;
}

.main .info button{
    padding: 15px 150px;
    background: #FCB506;
    color: #fff;
    font-weight: 500;
    font-size: 20px;
    border-radius: 13px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    transition: 0.5s ease;
    position: relative;
    top: 65px;
    border: 0;
}
.main .info button:hover{
    color: black;
}

.checkbox{
    width: 18px;
    height: 18px;
    text-align: left;
    margin-right: 10px;
}



.popup{
    width: 400px;
    background-color: rgb(42, 52, 185);
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    text-align: center;
    padding: 0px 30px 30px;
    color: #333;
    visibility: hidden;
    box-shadow: 0 5px 25px rgba(1 1 1 / 100%);
    transition: transform 0.4s, top 0.4s;
    z-index: 999;
}

.popup img{
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}


.popup h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0px 10px;
    color: white;
}

.popup p{
    color: white;
}

.popup .rout{
    width: 100%;
    margin-top: 80px;
    padding: 10px 50px;
    text-decoration: none;
    background-color: #FB8C00;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.popup .rout:hover{
    background-color: rgb(253, 92, 33);
}

.open-popup{
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
}



</style>