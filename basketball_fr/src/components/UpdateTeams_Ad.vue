<template>
    <div class="updBg">
        {{ setTitle("Edit Teams") }}
        <div class="infoUs">
            <form>
            <div class="form-group">
                <label>Name</label>
                <input type="text"  class="form-control" placeholder="Enter name.."  v-model="name">
            </div>
            <div class="form-group">
                <label>FullName</label>
                <input type="text"  class="form-control" placeholder="Enter fullname.."  v-model="fullName">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea rows="5" cols="50"  class="form-control" placeholder="Enter description.."  v-model="description" />
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text"  class="form-control" placeholder="Enter country.."  v-model="country">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text"  class="form-control" placeholder="Enter city.."  v-model="city">
            </div>
            <br />
            <div class="form-group">
                <label>Img</label>
                <textarea rows="4" cols="50"  class="form-control" placeholder="Enter img.." v-model="img" />
            </div>
            <br />
            <div class="form-group">
                <label>Ownership</label>
                <input type="text" class="form-control" placeholder="Enter ownership.." v-model="ownership">
            </div>
            <div class="form-group">
                <label>Head Coach</label>
                <input type="text" class="form-control" placeholder="Enter Head Coach.." v-model="headcoach">
            </div>
            <div class="form-group">
                <label>General Manager</label>
                <input type="text" class="form-control" placeholder="Enter General Manager.." v-model="generalmanager">
            </div>
            <div class="form-group">
                <label>Championships</label>
                <input type="text" class="form-control" placeholder="Enter Championships.." v-model="championships">
            </div>
            <br />
            <button type="button" class="btnn" @click="saveTeams()">Save</button>
            <br />
        </form>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

export default{
    name: 'UpdateTeams_Ad',
    data(){
        return {
            name: '',
            fullName: '',
            description: '',
            country: '',
            city: '',
            img: '',
            ownership: '',
            headcoach: '',
            generalmanager: '',
            championships: '',
        }
    },
    created(){
        this.getTeamsDetails();
    },
    methods:{
        async getTeamsDetails(){
        try{
            const response = await axios.get(`http://127.0.0.1:8000/api/teams/${this.$route.params.id}`);
            this.name = response.data.Team.name;
            this.fullName = response.data.Team.fullName;
            this.description = response.data.Team.Description;
            this.country = response.data.Team.country;
            this.city = response.data.Team.city;
            this.img = response.data.Team.img;
            this.ownership = response.data.Team.ownership;
            this.headcoach = response.data.Team.headcoach;
            this.generalmanager = response.data.Team.generalmanager;
            this.championships = response.data.Team.championships;
        }catch(e){
            console.log(e);
        }
    },
    async saveTeams(){
        try{
            await axios.put(`http://127.0.0.1:8000/api/teams/${this.$route.params.id}`,
            {
            name: this.name,
            fullName: this.fullName,
            Description: this.description,
            country: this.country,
            city: this.city,
            img: this.img,
            ownership: this.ownership,
            headcoach: this.headcoach,
            generalmanager: this.generalmanager,
            championships: this.championships,
            });
            this.name = '';
            this.fullName = '';
            this.description = '';
            this.country = '';
            this.city = '';
            this.ownership = '';
            this.headcoach = '';     
            this.generalmanager = '';     
            this.championships = '';     
            this.$router.push({ name: 'admin' });
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

.updBg{
    width: 100%;
    height: 100%;
    background-color: black;
    display: flex;
    justify-content: center;
}

.infoUs{
    width: 50%;
    height: 100%;
    margin: 35px;
    background-color: rgba(255, 255, 255, 0.801);
    border-radius: 10px;
    padding: 50px;
}

.btnn{
    background-color: black;
    border-radius: 10px;
    color: white;
    padding: 15px 50px;
    margin: 20px;
    transition: 0.7s ease;
}

.btnn:hover{
    color: #FCB506;
}
</style>