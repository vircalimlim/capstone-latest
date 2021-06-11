<template>
<div>
  <div class="navbar bg-primary">

    <span @click="toggleMenu">
    <transition name="nav">
    <div v-if="!show">
    <svg  xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-list" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/> </svg>
    </div>
    
    <div v-else>
    <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-x" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
    </div>
    </transition>
    </span>

  </div>
  
  <transition name="fade">
  <nav v-if="show" class="bg-light">
          d
  </nav>
  </transition>
  
</div>
</template>

<script>
  export default{
    data(){
      return{
        show: false,
      }
    },
    
    methods:{
      toggleMenu(){
        this.show = !this.show
      }
    }
  }
</script>

<style>
  body{
    font-size: 12px;
  }
  nav{
    height: 100vh;
    width: 40%;
    position: fixed;
    top: 3rem;
    left: 0;
    z-index: 99;
  }
  
  .navbar{
    height: 3rem;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
  }
  

  
.fade-enter-from, .fade-leave-to {
  opacity: .5;
  transform: translateX(-50px);
  
  
} 

.fade-enter-active, .fade-leave-active /* .fade-leave-active below version 2.1.8 */ { 

  transition: all .3s ease;
  
}

    .nav-enter-from{
      opacity: 0;
      transform: rotate(180deg);
    }
    
    .nav-enter-active{
      transition: all .5s ease;
    }
</style>