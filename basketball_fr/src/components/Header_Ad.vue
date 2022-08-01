<template>
    <div class="header">
        <div class="img">
            <img  src="../assets/Logo_BP.png">
        </div>
        <nav class="nav">
        <router-link to="/">Users</router-link> |
        <router-link to="/about">Add Teams</router-link>
        </nav>
        <div class="adminL">
            <img  src="../assets/admin-logo.png">
        </div>
    </div>
</template>


<script>
export default {
  name: 'Header_Ad',
}
</script>


<style>

*{
    margin: 0;
    padding: 0;
}

.header{
    width: 100%;
    height: 100px;
    background-color: #D35400;
}
.img {
    width: 30%;
    height: 100%;
    float: left;
}
.img img {
    width: 180px;
    height: 170px;
    float: left;
    position:relative;
    left: 20px;
    bottom: 15px;
}
.nav{
    width: 40%;
    height: 100%;
    float: left;
    padding: 30px;
}

.nav a {
   font-size: 20px;
   margin: 0px 50px 0px 50px;
   color: white;
   text-decoration: none;
   
}
.nav a:hover {
   color: #DDDD2E;
   text-decoration: none;
}

nav a.router-link-exact-active {
  color: #DDDD2E;
}

.adminL{
    float: right;
}
.adminL img {
    width: 80px;
    height: 80px;
    margin: 10px;
}
</style>