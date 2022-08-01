<template>
  <div class="home">
    <Header_Ad />
    <Users_Ad />
  </div>
</template>

<script>
// @ is an alias to /src
import Header_Ad from '@/components/Header_Ad.vue';
import Users_Ad from '@/components/Users_Ad.vue';

export default {
  name: 'HomeView',
  components: {
    Header_Ad,
    Users_Ad
  }
}
</script>
