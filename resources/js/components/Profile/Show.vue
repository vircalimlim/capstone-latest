<template>

<div class="row mt-md-5 justify-content-center d-none wrapper">
<div class="py-4 px-4 text-secondary rounded shadow-lg bg-white col-12 col-md-8 col-lg-7">

<h3 class="text-center">Additional Information</h3>

  <form class="" @submit.prevent="validateData" method="POST" :action="'/' + selected + '/' + profile">
  <input type="hidden" name="_token" :value="csrf">

    <div class="row my-4">

    <div class="col-12 col-sm-12 col-md-4 my-2">
      <span>Status</span>
    </div>

    <div class="col-12 col-sm-12 col-md-8">
    <select class="form-control" v-model="selected">
      <option value="2">Working/Employed</option>
      <option value="1">Student</option>
      <option value="0">None</option>
    </select>
    </div>

    </div>
    
    <div v-if="selected == 2 ">

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
    
    <div class="" v-else-if="selected == 1 ">
      
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
    
  <div class="row" v-if="work || student ? false : true">
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


</template>

<script>
  export default{
    
    mounted(){
          document.querySelector('.css-loader').classList.add('d-none')
          
          document.querySelector('.wrapper').classList.add('d-block')
          
console.log(this.work, this.student)
        },
    
    props: ['objProfile', 'work', 'student'],
    
    /*computed: {
      parseWork(){
        return JSON.parse(this.work)
      }
    },*/
    
    data(){
      return{
        loading: false,
        
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        
        profile: JSON.parse(this.objProfile),

        profession: this.work ? JSON.parse(this.work).profession : '',

        workplace: this.work ? JSON.parse(this.work).workplace : '',

        school: this.student ? JSON.parse(this.student).school : '',
        
        educ_level: this.student ? JSON.parse(this.student).educ_level : 'elementary',
        
        year_level: this.student ? JSON.parse(this.student).year_level : ' ',
        
        elem: ['Kinder Garten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6',],
        
        highschool: ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'],
        
        college: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
        
        selected: JSON.parse(this.objProfile).status,
        
        data: ''
      }
    },
    
    methods: {
      
      selectedFunc(){
        //alert(this.selected)
      },
      
      validateData(){
        this.loading = true
        
        if(this.selected == 1) {

        axios.post('/student/'+ this.profile.id, {
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
          window.location.href = '/profile/' + this.profile.id
        }
        
          
        })
        .catch(error => console.log(error))
        
      }
  
      else if(this.selected == 2){
      axios.post('/work/'+ this.profile.id, {
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
          window.location.href = '/profile/' + this.profile.id
        }
        
          
        })
        .catch(error => console.log(error))
        
      }

      }
    },
    
  }
</script>