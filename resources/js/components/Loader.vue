<template>
<div>

 <button :disabled="isLoading" type="submit" class="btn btn-outline-primary font-weight-bold" > <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submit </button>

</div>
</template>

<script>
  export default{
    
    props: {
      isLoading: Boolean
      
    },
    
    
  }
</script>