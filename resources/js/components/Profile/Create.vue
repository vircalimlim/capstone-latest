<template>
    <div class="px-3 pdy-5">

<div class="row mt-md-3 py-2 justify-content-around">
<div class="py-4 px-4 text-secondary rounded shadow-sm bg-white font-weight-light col-12 col-md-11 col-lg-9">
  
<h3 class="text-center pb-4">Create Profile</h3>

<form method="POST" action="/profile" @submit.prevent="submit">
  <input type="hidden" name="_token" :value="csrf">
  
<div class="row myd-4">
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class=" font-weight-bold">
    <label>Household Number</label>
  </div>
  <input placeholder="House Number" v-model="houseNum" class="form-control" type="text" name="houseNum" autocomplete="houseNum"/>
    <div class="text-danger" v-if="response_status.houseNum">
        <small> {{response_status.houseNum[0]}}</small>
    </div>
  </div>
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class=" font-weight-bold">
    <label>Street Name</label>
  </div>
  <input placeholder="Street Name ex. Sitio or Purok" v-model="street" class="form-control" type="text" name="street" autocomplete="street"/>
    <div class="text-danger" v-if="response_status.street">
        <small> {{response_status.street[0]}}</small>
    </div>
  </div>
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Barangay</label>
  </div>
  <input placeholder="Barangay" v-model="barangay" class="form-control" type="text" name="barangay" autocomplete="barangay"/>
    <div class="text-danger" v-if="response_status.barangay">
        <small> {{response_status.barangay[0]}}</small>
    </div>
  </div>
  
</div>

  
<div class="row myd-4">
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>First Name</label>
  </div>
  <input placeholder="First Name" v-model="firstname" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
    <div class="text-danger" v-if="response_status.firstname">
        <small> {{response_status.firstname[0]}}</small>
    </div>
  </div>
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Middle Name</label>
  </div>
  <input placeholder="Middle Name" v-model="middlename" class="form-control" type="text" name="middlename" autocomplete="middlename"/>
    <div class="text-danger" v-if="response_status.middlename">
        <small> {{response_status.middlename[0]}}</small>
    </div>
  </div>
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Last Name</label>
  </div>
  <input placeholder="Last Name" v-model="lastname" class="form-control" type="text" name="lastname" autocomplete="lastname"/>
    <div class="text-danger" v-if="response_status.lastname">
        <small> {{response_status.lastname[0]}}</small>
    </div>
  </div>
 
</div>


<div class="row">
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Age</label>
  </div>
  <input placeholder="Age" v-model="age" class="form-control" type="text" name="age" autocomplete="age"/>
    <div class="text-danger" v-if="response_status.age">
        <small> {{response_status.age[0]}}</small>
    </div>
  </div>

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Contact Number</label>
  </div>
  <input placeholder="Contact number ex. 09876543210" v-model="contact" class="form-control" type="text" name="contact" autocomplete="contact"/>
    <div class="text-danger" v-if="response_status.contact">
        <small> {{response_status.contact[0]}}</small>
    </div>
  </div>

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Gender</label>
  </div>

    <div class="row px-3">

    <div class="col-1dfd">
      <div class="custom-control custom-radio mr-sm-2">
        <input v-model="gender" type="radio" name="gender" value="Male" class="custom-control-input" id="male">
        <label class="custom-control-label" for="male">Male</label>
      </div>
      <div class="text-danger" v-if="response_status.gender">
        <small> {{response_status.gender[0]}}</small>
    </div>
    </div>
     
    <div class="col-1dfd">
      <div class="custom-control custom-radio mr-sm-2">
        <input v-model="gender" type="radio" name="gender" value="Female" class="custom-control-input" id="female">
        <label class="custom-control-label" for="female">Female</label>
      </div>
    </div>

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
        barangay: '',
        street: '',
        contact: '',
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
                gender: this.gender,
                barangay: this.barangay,
                street: this.street,
                contact: this.contact,
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
                    this.barangay = ''
                    this.street = ''
                    this.contact = ''
                    
                     toast.fire({
                      type: 'success',
                      title: 'Added successfully'
                    })
                }
            })
            .catch(error => console.log(error))
        },
        
        

    }


}
</script>
