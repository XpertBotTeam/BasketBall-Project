<template>
    <div class="main">
        {{ setTitle("Choose Login") }}
        <div class="choose">
            <router-link class="userdiv" :to="{name: 'login'}">
            <div>
                <img class="img1" src="../assets/userlogin.png" /><br />
                <label class="user">User</label>
            </div>
            </router-link>
            <div class="line">

                </div>
            <router-link class="admindiv" :to="{name: 'loginAdmin'}">
                <div>
                <img class="img2" src="../assets/adminlogin.png" /> <br />
                <label class="admin">Admin</label>
                </div>
            </router-link>
        </div>
    </div>
</template>


<script>
export default {
    name: 'chooseLogin',
    methods:{
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


.main{
    width: 100%;
    height: 100vh;
    background: #FCB506;
    display: flex;
    justify-content:center;
    align-items: center;
}

.choose{
    width: 50%;
    height: 250px;
    background: #fff;
    border-radius: 15px;
    display: flex;
    justify-content: space-around;
    box-shadow: 0 5px 25px rgba(1 1 1 / 50%);
}

.userdiv{
    width: 45%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 25px;
    transition: 0.5s ease;
}
.userdiv:hover{
    transform: scale(1.1, 1.1);
    border: 0px;
    cursor: pointer;
}
.line{
    width: 2px;
    height: 200px;
    background: black;
    margin-top: 15px;
}
.admindiv{
    width: 45%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 
    margin-top: 25px;
    transition: 0.5s ease;
}
.admindiv:hover{
    transform: scale(1.1, 1.1);
    border: 0px;
    cursor: pointer;
}

.img1{
    width: 150px;
    height: 150px;
}

.img2{
    width: 160px;
    height: 160px;
    margin-left: 35px;
    transition: 0.5s ease;
}


.user{
    color: black;
    font-size: 20px;
    font-weight: 400;
    margin-top: 10px;
    cursor: pointer;
}

.admin{
    color: black;
    font-size: 20px;
    font-weight: 400;
    cursor: pointer;
}
</style>