<template>
    <div>
<div class="row justify-content-center mt-3">
  <div class="col-12 col-md-9 border rounded p-1 px-2" style="backgrodund: gray;">
    <label for="">Number of rows:</label>
    <select class="" @change="paginate" v-model.number="perPage" name="" id="">
      <option value="6" selected="">6</option>
      <option value="8">8</option>
      <option value="12">12</option>
    </select>
  </div>
</div>

<div class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primary text-light">
      <th class="p-2">First Name</th>

      <th class="p-2">Middle Name</th>

      <th class="p-2">Last Name</th>
      
      <th class="p-2">Action</th>
    </tr>
    
    
    <tr v-if="objProfiles" v-for="profile in pageOfItems" :key="profile.id">
      
      <td class="p-2">{{ profile.firstname }}</td>
      
      <td class="p-2">{{ profile.middlename }}</td>
      
      <td class="p-2">{{ profile.lastname }}</td>
      
      <td class="p-2">
      <small>
        <a :href="'/profile/' + profile.id ">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"> <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/> </svg>
        View</a>
        </small>
        </td>
    </tr>

    <caption v-else caption class="py-4">
      <div class="text-center py-4">
      <h3 class="py-1 text-center text-secondary">
        Empty result
      </h3>
      <a href="/profile/create" role="button" class="btn btn-outline-primary">Create new record</a>
      </div>
    </caption>
   
    
  </table>

  <div class="row justify-content-center">
    <jw-pagination :pageSize="perPage" :maxPages="7" :items="dataProfile" @changePage="onChangePage"></jw-pagination>
  </div>
  
    </div>
  </div>


    </div>
</template>

<script>
export default {

    props: ['objProfiles'],

    data(){
      return{
        //exampleItems,
        pageOfItems: [],
        perPage: 5,
        dataProfile: this.objProfiles,
      }
    },

    
    methods: {
      onChangePage(pageOfItems) {
            // update page of items
            this.pageOfItems = pageOfItems;
        },

      
      paginate(){
        this.perPage
        axios.get('/profile/paginate').then(res => {
          this.dataProfile = res.data
        })
      }
    }
}
</script>