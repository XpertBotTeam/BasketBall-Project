<template>
        <div class="cont">
            {{ setTitle("Not Found") }}
            <div class="NF">
                <h2>NOT FOUND</h2>
                {{ autoHome() }}
            </div>
        </div>
</template>


<script>
export default{
    name: 'notFound',
    methods:{
        autoHome(){
            setTimeout(() => {
                this.$router.push({name: "home"})
            }, 2000);
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
    filter: blur(1.5px);
}

.NF{
    margin: 130px 0px 0px 0px;
    width: 40%;
    height: 100px;
    background-color: #FCB506;
    border: 2px solid #FCB506;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(1 1 1 / 60%);
    display: flex;
    justify-content: center;
    text-align: center;
    padding: 24px;
}

.NF h2{
    font-family: "Helvetica",sans-serif;
    font-weight: 500;
    font-size: 38px;
    text-align: center;
    color: white;
}
</style>