<template>

<div class="row px-2 py-4 justify-content-center">
<div class="col-12 col-md-10 shadow-sm bg-white p-4 rounded text-dark">
  
  <slot></slot>
  
</div>
</div>

</template>

<script>
  export default{
    mounted(){
      document.querySelector('.css-loader').classList.add('d-none')
      
      document.querySelector('.info-wrapper').classList.add('d-block')
    }
  }
</script>