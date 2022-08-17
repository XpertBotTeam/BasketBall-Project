<template>
    <div class="updBg">
        {{ setTitle("Edit News") }}
        <div class="infoUs">
            <form>
            <div class="form-group">
                <label>Img</label>
                <input type="name"  class="form-control" placeholder="Enter Img.."  v-model="img">
            </div>
            <br />
            <div class="form-group">
                <label>Title</label>
                <input type="email"  class="form-control" placeholder="Enter title.." v-model="title">
            </div>
            <br />
            <div class="form-group">
                <label>Content</label>
                <input type="email"  class="form-control" placeholder="Enter content.." v-model="content">
            </div>
            <br />
            <div class="form-group">
                <label>Info</label>
                <input type="name" class="form-control" placeholder="Enter info.." v-model="info">
            </div>
            <br />
            <button type="button" class="btnn" @click="saveNews()">Save</button>
            <br />
        </form>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

export default{
    name: 'UpdateNews_Ad',
    data(){
        return {
            img: '',
            title: '',
            content: '',
            info: '',
        }
    },
    created(){
        this.getNewsDetails();
    },
    methods:{
        async getNewsDetails(){
        try{
            const response = await axios.get(`http://127.0.0.1:8000/api/news/${this.$route.params.id}`);
            this.img = response.data.message[0].img;
            this.title = response.data.message[0].title;
            this.content = response.data.message[0].content;
            this.info = response.data.message[0].info;
        }catch(e){
            console.log(e);
        }
    },
    async saveNews(){
        try{
            await axios.put(`http://127.0.0.1:8000/api/news/${this.$route.params.id}`,
            {
            img: this.img,
            title: this.title,
            content: this.content,
            info: this.info,
            });
            this.img = '';
            this.title = '';
            this.content = '';
            this.info = '';
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