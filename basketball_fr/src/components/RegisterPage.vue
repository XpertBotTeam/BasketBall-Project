<template>
    <div class="cont" ref="blur">
        {{ setTitle("Register") }}
        <div class="popup" ref="popup" id="noblur">
                <img src="../assets/verifypopup.png">
                <h2>Done !</h2>
                <p>Your account has been created successfully</p>
                <button @click="closePopup()" type="button">Ok</button>
        </div>
        <div class="popup2" ref="popup2">
                <img src="../assets/error.png">
                <h2>Error!</h2>
                <p>Your Account has registered before</p>
                <button @click="closePopup2()" type="button">Ok</button>
        </div>
        <div class="login">
            <div class="input-icons">
                <div class="name">
                    <span><img src='../assets/name.png'></span>
                    <input class="input-field" placeholder="Enter your name..." type="text" v-model="form.name">
                </div>
                <div class="email">
                    <span><img src='../assets/email2.png'></span>
                    <input class="input-field" placeholder="Enter your email..." type="email" v-model="form.email">
                </div>
                <div class="password">
                    <span><img src='../assets/lock.png'></span>
                    <input class="input-field" ref="myInput"  placeholder="Enter your password..." type="password" v-model="form.password">
                </div>
                <div class="chechD">
                <input class="checkbox" type="checkbox" @click="showPassword()"> Show Password
                </div>
                <div class="regD">
                    <button type="submit" class="btn btn-primary" @click="saveUser()">Register</button>
                </div>
                <div class="logD">
                        <router-link :to="{name: 'login'}">back</router-link>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default{
    name: 'RegisterPage',
    data(){
        return{
            form: {
                name: '',
                email: '',
                password: '',
            },
        }
    },
    methods:{
      async saveUser(){
            await axios.post("http://127.0.0.1:8000/api/user/register", this.form).then(()=>{
                        this.name = '';
                        this.email = '';
                        this.password = '';
                        this.openPopup();
            }).catch((e)=>{
                console.log(e);
                this.openPopup2();
            })
    },
        showPassword() {
                var x = this.$refs.myInput;
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
        },
        openPopup(){
            let popup = this.$refs.popup;
            popup.classList.add("open-popup");
        },
        openPopup2(){
            let popup2 = this.$refs.popup2;
            popup2.classList.add("open-popup");
        },
        closePopup(){
            let popup = this.$refs.popup;
            popup.classList.remove("open-popup");
            this.$router.push({name: "login"});
        },
        closePopup2(){
            let popup2 = this.$refs.popup2;
            popup2.classList.remove("open-popup");
        },
         setTitle(name){
                document.title = name;
            }
    }
}
</script>


<style scoped>
html{
    margin: 0;
    padding: 0;
}

.cont{
    width: 100%;
    height: 666px;
    margin: 0px;
    background: url(../assets/cover_nba.jpg) no-repeat;
    background-size: cover;
    background-position: center center;
    display: flex;
    justify-content: left;
    padding: 120px;
    filter: blur(0px);
}

.login{
    width: 400px;
    height: 500px;
    background-color: #FCB506;
    border: 2px solid #FCB506;
    box-shadow: 0 5px 25px rgba(1 1 1 / 30%);
    border-radius: 15px;
    display: flex;
    justify-content: center;
}

.input-icons span img {
    width: 30px;
    height: 30px;
}
.input-icons span {
    padding: 8px;
    position: absolute;
}

.input-icons {
    width: 80%;
    margin: 50px;
}


.input-field {
    width: 100%;
    padding: 10px;
    text-align: center;
    background-color: white;
    border: 2px solid white;
    border-radius: 12px;
}
.input-field:focus {
    box-shadow: 0 5px 25px rgba(255, 255, 255, 1);
    border-radius: 12px;
}

input {
border: none;
background-color: transparent;
resize: none;
outline: none;
}

.name{
    margin-bottom: 20px;
}
.email{
    margin-bottom: 20px;
}

.password{
    margin-bottom: 20px;
}

.checkbox{
    width: 18px;
    height: 18px;
    text-align: left;
    margin-right: 10px;
}
.chechD{
    width: 100%;
    padding-left: 10px;
    display: flex;
    justify-content: left;
}

.logD{
    display: flex;
    justify-content: left;
    margin: 50px 20px 5px 0px;
}

.logD a{
    width: 40%;
    text-decoration: none;
    color: white;
    background-color: black;
    border: 2px solid black;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: bold;
    transition: 0.7s ease;
}

.logD a:hover{
    color: #FCB506;
    transform: scale(1.1, 1.1);
}

.regD{
    display: flex;
    justify-content: center;
    margin: 50px 0px 5px 0px;
}

.regD button{
    width: 90%;
    text-decoration: none;
    color: white;
    background-color: rgb(42, 52, 185);
    border: 2px solid rgb(42, 52, 185);
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: bold;
    transition: 0.7s ease;
}

.regD a:hover{
    color: #FCB506;
    transform: scale(1.1, 1.1);
}
.regD button:hover{
    color: #FCB506;
    transform: scale(1.1, 1.1);
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
.popup2{
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
.popup2 img{
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
.popup2 h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0px 10px;
    color: white;
}
.popup p{
    color: white;
}
.popup2 p{
    color: white;
}

.popup button{
    width: 100%;
    margin-top: 50px;
    padding: 10px 0px;
    background-color: #FB8C00;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.popup2 button{
    width: 100%;
    margin-top: 50px;
    padding: 10px 0px;
    background-color: red;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.popup button:hover{
    background-color: rgb(253, 92, 33);
}
.popup2 button:hover{
    background-color: rgb(243, 61, 61);
}

.open-popup{
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
}


</style>