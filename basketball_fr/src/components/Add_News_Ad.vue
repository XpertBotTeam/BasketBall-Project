<template>
    <div>
        {{ setTitle("Add News") }}
        <Header_Ad />
        <h1 class="head">Add News</h1>
        <form>
            <div id="img" class="form-group">
                <label>Img Link</label>
                <input type="name"  class="form-control" placeholder="Enter img link.." v-model="img">
            </div>
            <br />
            <div id="title" class="form-group">
                <label>Title</label>
                <input type="name"  class="form-control" placeholder="Enter Title.." v-model="title">
            </div>
            <br />
            <div id="content" class="form-group">
                <label>Content</label>
                <input type="name" class="form-control" placeholder="Enter Content.." v-model="content">
            </div>
            <br />
            <div id="content" class="form-group">
                <label>Info Link</label>
                <input type="name" class="form-control" placeholder="Enter Info link.." v-model="info">
            </div>
            <br />
            <button type="submit" class="btn btn-primary" @click="saveNews()">Save</button>
        </form>
    </div>
</template>

<script>
import Header_Ad from './Header_Ad.vue'
import axios from 'axios';

export default{

name: 'Add_News_Ad',
    components:{
        Header_Ad
},
data(){
    return {
        img : '',
        title: '',
        content: '',
        info: '',
    }
  },
methods: {
        setTitle(name){
            document.title = name;
        },
        async saveNews(){
        try{
            await axios.post("http://127.0.0.1:8000/api/news",
            {
            img: this.img,
            title: this.title,
            content: this.content,
            info: this.info,
            }
            );
            this.img = '';
            this.title = '';
            this.content = '';
            this.info = '';
        }catch(e){
            console.log(e);
        }
    }
    }
}
</script>


<style scoped>
.head{
  background-color: black;
  color: white;
  border-bottom: 2px solid black;
  border-bottom-right-radius: 30px;
  border-bottom-left-radius: 30px;
  font-size: 35px;
  padding: 10px;
}

#img{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#title{
  width: 500px;
  text-align: center;
  display: inline-block;
}
#content{
  width: 500px;
  text-align: center;
  display: inline-block;
}

</style>