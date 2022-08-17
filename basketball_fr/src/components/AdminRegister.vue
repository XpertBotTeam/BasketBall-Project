<template>
    <div>
        <div class="popup" ref="popup" id="noblur">
                <img src="../assets/verifypopup.png">
                <h2>Success !</h2>
                <p>Admin account has been created successfully</p>
                <button class="rout" @click="closePopup()" type="button">Ok</button>
        </div>
        <Header_Ad />
        {{ setTitle("Create Admins") }}
        <section class="head">
        <h2 class="editH">Create Admins</h2>
        </section>
        <section class="main">
            <div class="info">
                    Name <input v-model="adminInfo.name" class="inp" type="text" placeholder="Enter Admin name...." ><br/>
                    Email <input v-model="adminInfo.email" class="email" type="email" placeholder="Enter Admin email...." ><br/>
                    Password <input ref="myInput" v-model="adminInfo.password" class="pass" type="password" showPassword="true" placeholder="Enter Admin password...." ><br/>
                    <input class="checkbox" type="checkbox" @click="showPassword()"> Show Password <br />
                    <button type="button" @click="saveAdmin()">Save</button>
            </div>
    </section>
    </div>
</template>


<script>
import Header_Ad from './Header_Ad.vue';
import axios from 'axios';



export default {
    name: 'AdminRegister',
    components:{
    Header_Ad
  },
  data(){
    return {
        adminInfo: {
            name: '',
            email: '',
            password: '',
        }
    }
  },
  methods:{
    setTitle(name){
        document.title = name;
    },
    async saveAdmin(){
            await axios.post("http://127.0.0.1:8000/api/admin/register", this.adminInfo).then(()=>{
                        this.adminInfo.name = '';
                        this.adminInfo.email = '';
                        this.adminInfo.password = '';
                        window.scrollTo(0, 0);
                        this.openPopup();
            }).catch((e)=>{
                console.log(e);
                this.openPopup2();
            })
    },
    openPopup(){
            let popup = this.$refs.popup;
            popup.classList.add("open-popup");
        },
    closePopup(){
            let popup = this.$refs.popup;
            popup.classList.remove("open-popup");
            
  },
  showPassword() {
                var x = this.$refs.myInput;
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
        },
}
}
</script>


<style scoped>
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
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0px 8px 16px 0px white;
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