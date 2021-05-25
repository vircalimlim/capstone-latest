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
    <div class="text-danger" v-if="response_status.houseNum">
        <small> {{response_status.houseNum[0]}}</small>
    </div>
  </div>
  
</div>
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="First Name" v-model="firstname" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
    <div class="text-danger" v-if="response_status.firstname">
        <small> {{response_status.firstname[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Middle Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Middle Name" v-model="middlename" class="form-control" type="text" name="middlename" autocomplete="middlename"/>
    <div class="text-danger" v-if="response_status.middlename">
        <small> {{response_status.middlename[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Last Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Last Name" v-model="lastname" class="form-control" type="text" name="lastname" autocomplete="lastname"/>
    <div class="text-danger" v-if="response_status.lastname">
        <small> {{response_status.lastname[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Age</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Age" v-model="age" class="form-control" type="text" name="age" autocomplete="age"/>
    <div class="text-danger" v-if="response_status.age">
        <small> {{response_status.age[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Student/Employed Status</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <select v-model="status" class="form-control" name="status">
    <option value="0">None</option>
    <option value="1">Student</option>
    <option value="2">Employed</option>
  </select>
    <div class="text-danger" v-if="response_status.status">
        <small> {{response_status.status[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4 ">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Gender</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  
      <div class="custom-control custom-radio mr-sm-2">
        <input v-model="gender" type="radio" name="gender" value="Male" class="custom-control-input" id="male">
        <label class="custom-control-label" for="male">Male</label>
      </div>
      
      <div class="custom-control custom-radio mr-sm-2">
        <input v-model="gender" type="radio" name="gender" value="Female" class="custom-control-input" id="female">
        <label class="custom-control-label" for="female">Female</label>
      </div>

  
    <div class="text-danger" v-if="response_status.gender">
        <small> {{response_status.gender[0]}}</small>
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
        age: '',
        gender: '',
        status: '0',
        response_status: '',
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
                age: this.age,
                status: this.status,
                gender: this.gender
            })
            .then(response =>  {
                console.log(this.response_status = response.data)
                this.loading = false
                if(!this.response_status.success){
                    return false
                }
                else{
                    this.houseNum = ''
                    this.firstname = ''
                    this.middlename = ''
                    this.lastname = '',
                    this.age = '',
                    this.gender = ''
                }
            })
            .catch(error => console.log(error))
        },
        
        

    }


}
</script>
