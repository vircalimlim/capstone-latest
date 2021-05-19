<template>

  <div class="row  text-break justify-content-center">
    <div class=" p-2 ">

      <slot></slot>
    </div>
  </div>

</template>

<script>
  export default {
    mounted() {
      document.querySelector('.css-loader').classList.add('d-none')

      document.querySelector('.table').classList.add('d-block')
    }
  }
  </script>