<template>
  <div class="px-3 py-5">

<div class="row mt-md-5 py-2 justify-content-around">
<div class="py-4 px-4 text-light rounded shadow-lg bg-dark col-12 col-md-8 col-lg-7">

<h3 class="text-center pb-3">Create Additional Information</h3>

  <form @submit.prevent="validateData" method="POST" :action="'/' + selected + '/' + profileid">
  <input type="hidden" name="_token" :value="csrf">

    <div class="row my-4">

    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Status</span>
    </div>

    <div class="col-12 col-sm-12 col-md-8">
    <select class="form-control" v-model="selected">
      <option value="work">Working/Employed</option>
      <option value="student">Student</option>
    </select>
    </div>

    </div>
    
    <div v-if="selected == 'work' ">

    <div class="row my-4">

    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Profession/Work</span>
    </div>

    <div class="col-12 col-sm-12 col-md-8">
      <input :class="{'is-invalid': data.profession}" class="form-control" type="text" v-model="profession" name="profession" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.profession">
        <small> {{data.profession[0]}}</small>
      </div>
    </div>

  </div>
  
  <div class="row my-4">
    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Workplace</span>
    </div>
    <div class="col-12 col-sm-12 col-md-8">
      <input :class="{'is-invalid': data.workplace}" class="form-control " type="text" v-model="workplace" name="workplace" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.workplace">
        <small> {{data.workplace[0]}}</small>
      </div>
    </div>
  </div>

    </div>
    
    <div class="" v-else-if="selected == 'student'">
      
      <div class="row my-4">
    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Name of School</span>
    </div>
    <div class="col-12 col-sm-12 col-md-8">
      <input :class="{'is-invalid': data.school}"  class="form-control" type="text" name="school" v-model="school" value="" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.school">
        <small> {{data.school[0]}}</small>
      </div>
     
    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Education Level</span>
    </div>
    <div class="col-12 col-sm-12 col-md-8">
      <select @change="year_level = ' '" class="form-control" v-model="educ_level"  name="educ_level" >
        
        <option value="elementary">
          Elementary
        </option>
        
        <option value="highschool">
          High School
        </option>
        
        <option value="college">
          College
        </option>
      </select>
      
      <div class="text-danger" v-if="data.educ_level">
        <small> {{data.educ_level[0]}}</small>
      </div>

    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Year Level</span>
    </div>
    <div class="col-12 col-sm-12 col-md-8">
      
      <div v-if="educ_level == 'elementary'" >
        
      <select class="form-control" v-model="year_level" name="year_level" > 
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in elem">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="educ_level == 'highschool'">
      <select class="form-control" v-model="year_level"  name="year_level" >
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in highschool">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="educ_level == 'college'">
      <select class="form-control" v-model="year_level" name="year_level" >
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in college">{{item}}</option>
    
      </select>
      </div>
      
      <div class="text-danger" v-if="data.year_level">
        <small> {{data.year_level[0]}}</small>
      </div>
      
    </div>
  </div>
  
    </div>
    
  <div class="row my-4">
    <div class="col-12 text-right">
      
      <css-loader :is-loading="loading"></css-loader>
      
    </div>
  </div>
  <div v-if="data">
    <span class="text-danger" role="alert">
      <strong>

  </strong>
  </span>
  
  </div>
  </form>

</div>
</div>
  </div>
</template>

<script>
  export default{
    
    mounted(){
          document.querySelector('.css-loader').classList.add('d-none')
        },
    
    props: ['profileid'],
    
    data(){
      return{
        loading: false,
        
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        profession: '',

        workplace: '',

        school: '',
        
        educ_level: 'elementary',
        
        year_level: ' ',
        
        elem: ['Kinder Garten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6',],
        
        highschool: ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'],
        
        college: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
        
        selected: 'work',
        
        data: ''
      }
    },
    
    methods: {
      selectedFunc(){
        //alert(this.selected)
      },
      
      validateData(){
        this.loading = true
        
        if(this.selected == 'student') {

        axios.post('/student/'+ this.profileid, {
          school: this.school,
          educ_level: this.educ_level,
          year_level: this.year_level
        })
        .then(res => {
        this.loading = false
        this.data = res.data
        if(!this.data.success){
          return false
        }
        else{
          window.location.href = '/profile/' + this.profileid
        }
        
          
        })
        .catch(error => console.log(error))
        
      }
  
      else if(this.selected == 'work'){
      axios.post('/work/'+ this.profileid, {
          profession: this.profession,
          workplace: this.workplace
        })
        .then(res => {
        this.loading = false
        this.data = res.data
        if(!this.data.success){
          return false
        }
        else{
          window.location.href = '/profile/' + this.profileid
        }
        
          
        })
        .catch(error => console.log(error))
        
      }

      }
    },
    
  }
</script>