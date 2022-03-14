<template>
    <div class="">

<div v-if="objUser.name == 'admin'" class="row  text-break justify-content-center">
    <div class="pd-2 col-12 pt-3 col-md-9">

  <div class="row px-1">
    <div class="px-0 pb-2 col-6 text-rigdht">
      <a class="btn btn-outline-success" href="/profile/create">Add patient</a>
    </div>
    <div class="px-0 pb-2 col-6 text-right">
      <a class="btn btn-primary" href="/importExportView">Import</a>
      <a class="btn btn-outline-secondary" href="/export">Export</a>
    </div>
  </div>

</div>
</div>

<div :class="{'pt-4': objUser.name !== 'admin'}" class="row justify-content-center">
  <div class="col-12 col-md-9 border rounded p-1 px-2" style="backgrodund: gray;">
    <div class="row">

      <div class="col-6 col-sm text-secondary">
      <label for="">Number of rows:</label>
      <select class="" @change="sort" v-model.number="perPage" name="" id="">
        <option value="5" selected="">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="30">30</option>
      </select>
    </div>

    <div class="col-6 col-sm text-secondary">
      <label for="">Sort by:</label>
      <select v-model="sortChoice" name="" id="" @change="sort">
        <option value="1">Latest</option>
        <option value="2">Name(asc)</option>
        <option value="3">Name(desc)</option>
        <option value="4">Age(asc)</option>
        <option value="5">Age(desc)</option>
      </select>
    </div>

    <div class="col-12 col-sm text-secondary">
        <div class="input-group input-group-sm">
          <input type="text" v-model="searchData" placeholder="Search by Lastname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          <div class="input-group-append">
          <button @click="search" class="btn btn-outline-primary" type="button">Search</button>
        </div>
        </div>
    </div>

    </div>

  </div>
</div>

<div class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primary text-light">
      <th class="p-2">Id</th>

      <th class="p-2">Street</th>

      <th class="p-2">Barangay</th>

      <th class="p-2">Last Name</th>

      <th class="p-2">First Name</th>

      <th class="p-2">Middle Name</th>

      <th class="p-2">Age</th>
      
      <th class="p-2">Action</th>
    </tr>
    
      

      <tr v-for="profile in pageOfItems" :key="profile.id">

        <td class="p-2 text-capitalize">{{ profile.id }}{{ formattedDate(profile.created_at) }}</td>
        
        <td class="p-2 text-capitalize">{{ profile.street }}</td>
        
        <td class="p-2 text-capitalize">{{ profile.barangay }}</td>
        
        <td class="p-2 text-capitalize">{{ profile.lastname }}</td>
        
        <td class="p-2 text-capitalize">{{ profile.firstname }}</td>
        
        <td class="p-2 text-capitalize">{{ profile.middlename }}</td>

        <td class="p-2 text-capitalize">{{ profile.age }}</td>
        
        <td class="p-2 text-capitalize">
        <small>
          <a :href="'/profile/' + profile.id ">
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"> <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/> </svg>
          View</a>
          </small>
          </td>
      </tr>

      <caption v-if="pageOfItems == ''" class="py-4">
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
import moment from 'moment';
export default {

    props: ['objProfiles', 'objUser'],

   /* mounted(){
      axios.get('/profile/paginate').then(res => {
          this.dataProfile = res.data
        })
        document.querySelector('.wrap').classList.add('d-block')
    },*/

    data(){
      return{
        //exampleItems,
        pageOfItems: [],
        perPage: 5,
        dataProfile: this.objProfiles,
        sortChoice: 1,
        sortData: [],
        searchData: ''
      }
    },

    
    methods: {
      formattedDate(date) {
        return moment(date).format('YYYYMMDD');
      },

      onChangePage(pageOfItems) {
            // update page of items
            this.pageOfItems = pageOfItems;
        },


      sort(){
        axios.get('/profile/sort?perPage=' + this.perPage + '&sort=' + this.sortChoice).then(res => {
          this.dataProfile = res.data
          //alert(this.sortData);
        })
      },

      paginate(){
        this.perPage
        axios.get('/profile/paginate').then(res => {
          this.dataProfile = res.data
        })
        this.sort();
      },

      search(){
        axios.get('/profile/search?search=' + this.searchData).then(res => {
          this.dataProfile = res.data
        })
      }
    }
}
</script>