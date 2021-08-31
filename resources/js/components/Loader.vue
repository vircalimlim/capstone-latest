<template>
<div>

 <button :disabled="isLoading" type="submit" class="btn btn-md btn-outline-primary font-weight-bold" > <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Save </button>

</div>
</template>

<script>
  export default{
    
    props: {
      isLoading: Boolean
      
    },
    
    
  }
</script>