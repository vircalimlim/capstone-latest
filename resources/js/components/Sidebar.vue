<template>
<div>
<div @click.self="toggleMenu" :class="{overlay: show}">
  <div class="navbar bg-primary">

    <span class="navbar-button" @click="toggleMenu">
    <!-- if you are dealing with condition use key to activate the transition -->
    <transition name="nav" appear>
    <div v-if="!show" key="open">
    <svg  xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-list" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/> </svg>
    </div>
    
    <div v-else key="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-x" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
    </div>
    </transition>
    </span>
    
    <div class="text-light">
      <form method="POST" action="/logout">
        <input type="hidden" name="_token" :value="csrf">
        <button class="logout bg-primary" type="submit">Logout</button>
      </form>
    </div>

  </div>
  
  <transition name="fade">
  <nav v-if="show" class="overflow-auto pb-6">
    <div class="d-flex align-items-center py-1 px-2 text-light ">
      <img class="d-none d-sm-block" alt="image"/>
     <h4 class=" dm-1">Barangay Health Record</h4>
    </div>
    <hr class="">
    <div class="list">
      
    <div class="px-2 border-bottom d-flex align-items-center">
       <a href="/" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class=" bi bi-speedometer2" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/> <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/> </svg> &nbsp;
    Dashboard</a>
  </div>
  
  <div @click="dropdown" class="dropdown px-2 pb-2 border-bottom d-flex align-items-center">
    
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"> <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/> </svg> &nbsp;
    <a role="button" class="my-1 pl-1 text-light pointer">
    Residents
    </a> 
    <div class="flex-grow-1 caret  text-right">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" :class="{'caret-bottom': drop}" class="text-right bi bi-caret-right" viewBox="0 0 16 16"> <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/> </svg>
    
    </div>
    
  </div>

<transition name="dropdown">
<div v-if="drop" class="dropdown-list">
  
  <div class="pl-4 py-2  border-bottom">
  <a href="/profile/create" class="text-light">
    <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/> <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/> </svg>
      Add Resident
    </a>
    </div>
    
  <div class="pl-4 py-2 border-bottom">
  <a href="/profile" class="text-light">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/> </svg>
    Show Resident
  </a>
  </div>
  
</div>
</transition>

    <div class="px-2 border-bottom d-flex align-items-center">
       <a href="/bp" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/> <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/> </svg> &nbsp;
    Patients Blood Pressure</a>
  </div>
  
    <div class="px-2 border-bottom d-flex align-items-center">
       <a href="/medicine" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/> <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/> </svg> &nbsp;
    Add Medicine</a>
  </div>
  
    <div class="px-2 border-bottom d-flex align-items-center">
       <a href="/releasemed" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/> <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/> </svg> &nbsp;
    Release Medicine</a>
  </div>

    </div>
  </nav>
  </transition>
  
</div>
</div>
</template>

<script>
  export default{
    mounted(){
          document.querySelector('.css-loader').classList.add('d-none')
    },
    
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        show: false,
        drop: false
      }
    },
    
    methods:{
      toggleMenu(){
        this.show = !this.show
      },
      
      dropdown(){
        this.drop = !this.drop
      }
    }
  }
</script>

<style>
  body{
    font-size: 12px;
    height: 100vh;
  }
  .pointer{
    cursor: pointer;
  }
  .logout{
    outline: none;
    font-size: 1.3rem;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
  }
  
  nav{
    height: 100vh;
    min-width: 40%;
    max-width: 60%;
    position: fixed;
    top: 3.5rem;
    left: 0;
    z-index: 99;
    background: #70baff;
    padding: 5px 5px 100px 5px;
  }
  
  .overlay{
    position: absolute;
    width: 100%;
    height: 100vh;
    z-index: 999;
  }
  
  .navbar-button{
    opacity: .7;
  }

  .navbar-button:hover{
    opacity: 1;
    cursor: pointer;
  }
  
  .navbar{
    height: 3.5rem;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
  }
  
  .list{
    font-size: 1.2rem;
    color: #f6f6f6;
  }
  
  a{
    padding: 10px 5px;
    text-decoration: none !important;
    
  }
  
  .caret-bottom{
    transform: rotate(90deg);
    transition: all .3s ease;
  }
  
  .dropdown-list{
    font-size: 1.1rem;
color: #f6f6f6;
  }
  
  


.nav-enter{
  opacity: .5;
  transform: rotate(90deg);
      
}
    
.nav-enter-active{
  transition: all .3s ease;
}

    
.fade-enter-active, .fade-leave-active {
  transition: all .5s ease; 
  
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0; 
  transform: translateX(-50px);
  
}


.dropdown-enter-active, .dropdown-leave-active {
  transition: all .5s ease; 
  
}
.dropdown-enter, .dropdown-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0; 
  transform: translateY(-20px);
  
}

    
    
</style>