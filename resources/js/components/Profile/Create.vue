<template>
    <div class="px-3 pdy-5">

<div class="row mt-md-5 py-2 justify-content-around">
<div class="py-4 px-4 text-secondary rounded shadow-lg bg-white font-weight-light col-12 col-md-8 col-lg-7">
  
<h3 class="text-center">Create Profile</h3>

<form method="POST" action="/profile" @submit.prevent="submit">
  <input type="hidden" name="_token" :value="csrf">
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Household Number</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="House Number" v-model="houseNum" class="form-control" type="text" name="houseNum" autocomplete="houseNum"/>
    <div class="text-danger" v-if="status.houseNum">
        <small> {{status.houseNum[0]}}</small>
    </div>
  </div>
  
</div>
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="First Name" v-model="firstname" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
    <div class="text-danger" v-if="status.firstname">
        <small> {{status.firstname[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Middle Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Middle Name" v-model="middlename" class="form-control" type="text" name="middlename" autocomplete="middlename"/>
    <div class="text-danger" v-if="status.middlename">
        <small> {{status.middlename[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Last Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Last Name" v-model="lastname" class="form-control" type="text" name="lastname" autocomplete="lastname"/>
    <div class="text-danger" v-if="status.lastname">
        <small> {{status.lastname[0]}}</small>
    </div>
  </div>
  
</div>




<div class="row">
  <div class="col text-right">
  
  <css-loader :is-loading="loading"></css-loader>
  
  </div>
</div>

</form>

</div>
</div>

    </div>
</template>

<script>
export default {
    mounted(){
          document.querySelector('.css-loader').classList.add('d-none')
        },
        
    data() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        houseNum: '',
        firstname: '',
        middlename: '',
        lastname: '',
        status: '',
        loading: false,
    }
},
    methods: {
        submit(){
          
            this.loading = true;
            
            axios.post('/profile', {
                houseNum: this.houseNum,
                firstname: this.firstname,
                middlename: this.middlename,
                lastname: this.lastname,
            })
            .then(response =>  {
                console.log(this.status = response.data)
                this.loading = false
                if(!this.status.success){
                    return false
                }
                else{
                    this.houseNum = ''
                    this.firstname = ''
                    this.middlename = ''
                    this.lastname = ''
                }
            })
            .catch(error => console.log(error))
        },
        

    }


}
</script>
