<template>
    <div class="mainnn">
        {{ setTitle("TeamDetails") }}
        <div class="headerrr">
            <h2>Team Details</h2>
        </div>
        <div class="contenttt">
            <img  :src="details.img" >
        </div>
        <br />
        <div class="detailsss">
                <table border="1">
                    <tr>
                        <td>Name</td>
                        <td><span>{{ details.name }}</span></td>
                    </tr>
                    <tr>
                        <td>FullName</td>
                        <td><span>{{ details.fullName }}</span></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><span>{{ details.Description }}</span></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><span>{{ details.country }}</span></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><span>{{ details.city }}</span></td>
                    </tr>
                    <tr>
                        <td>Ownership</td>
                        <td><span>{{ details.ownership }}</span></td>
                    </tr>
                    <tr>
                        <td>Head Coach</td>
                        <td><span>{{ details.headcoach }}</span></td>
                    </tr>
                    <tr>
                        <td>General Manager</td>
                        <td><span>{{ details.generalmanager }}</span></td>
                    </tr>
                    <tr>
                        <td>Championships</td>
                        <td><span>{{ details.championships }}</span></td>
                    </tr>
                </table>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="backdiv">
            <router-link class="back" :to="{name: 'teams'}">Back</router-link>
        </div>
    </div>
</template>


<script scoped>
import axios from 'axios';

export default{ 
    name: 'TeamDetails',
    data(){
        return {
            details: []
        }
    },
    created(){
        this.getTeamDetails();
    },
    methods:{
        async getTeamDetails(){
        try{
            const response = await axios.get(`http://127.0.0.1:8000/api/teams/${this.$route.params.id}`);
            this.details = response.data.Team;
            console.log(response.data);
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

<style>
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

.mainnn{
    width: 100%;
    height: 320px;
    background-color: black;
}
.contenttt{
    width: 100%;
    height: 200px;
    text-align: center;
}
.contenttt img{
    width: 300px;
    height: 300px;
    border: 7px solid white;
    border-radius: 50%;
}

.headerrr{
    width: 100%;
    height: 100px;
    background-color: black;
    border-bottom-left-radius: 60px;
    border-bottom-right-radius: 60px;
}
.headerrr h2{
    width: 100%;
    text-align: center;
    color: white;
    font-size: 36px;
    padding: 25px;
}

.detailsss{
    width: 100%;
    height: 100%;
    margin-top: 100px;
    color: blue;
}


.detailsss *{
    width: 50%;
    text-align: center;
    color: rgb(18, 135, 231);
}
.detailsss span{
    width: 100%;
    text-align: center;
    color: black;
}
table{
    box-shadow: 0 5px 25px rgba(1 1 1 / 55%);
    text-align: center;
    margin-left: 330px;
}

td{
    padding: 20px;
    text-align: center;
}
tr{
    text-align: center;
    padding: 20px;
}

.backdiv{
    width: 100%;
    height: 100px;
    float: left;
    margin-top: 250px;
}

.back{
    background-color: black;
    border-radius: 20px;
    padding: 20px 200px;
    float: left;
    margin-left: 450px;
    margin-top: 20px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    transition: 0.7s ease;
}

.back:hover{
    text-decoration: none;
    color: #FCB506;
    transform: scale(1.1, 1.1);
}
</style>