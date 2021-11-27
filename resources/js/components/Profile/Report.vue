<template>
    <div class="">

<div class="row justify-content-center">
  <div class="col-12 col-md-9 border rounded p-1 px-2 mt-3">

    <div class="row">

      <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Select Report:</label>
      <select @change="report" v-model.number="reportChoice" class="" name="" id="">
        <option value="1" selected="">Added patients</option>
        <option value="2">Released medicine</option>
        
      </select>
    </div>

    <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Timeframe:</label>
      <select @change="report" v-model.number="tfChoice" class="" name="" id="">
        <option value="1">Daily</option>
        <option value="2">Weekly</option>
        <option value="3">Monthly</option>
      </select>
    </div>

    <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Print Report:</label>
      <button :class="{'btn-outline-success': isDisabled }" class="btn-md btn-success" @click="generateReport" :disabled='isDisabled'>Print</button>
    </div>

    </div>

  </div>
</div>

<div v-if="reportChoice == 1" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Last Name</th>
      <th class="p-2">Birthdate</th>
      <th class="p-2">Age</th>
      <th class="p-2">Contact Number</th>
    </tr>
    
    <tr v-for="patients in data" :key="patients.id">
        
        <td class="p-2">{{ patients.firstname }}</td>
        
        <td class="p-2">{{ patients.middlename }}</td>
        
        <td class="p-2">{{ patients.lastname }}</td>

        <td class="p-2">{{ patients.birthdate }}</td>

        <td class="p-2">{{ patients.age }}</td>

        <td class="p-2">0{{ patients.contact }}</td>
        
    </tr>
    
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 2" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Name</th>
      <th class="p-2">Type</th>
      <th class="p-2">Quantity</th>
      <th class="p-2">Date Received</th>
    </tr>
    
    <tr v-for="med in data" :key="med.id">
        
        <td class="p-2">{{ med.med_name }}</td>
        
        <td class="p-2">{{ med.med_type }}</td>
        
        <td class="p-2">{{ med.quantity }}</td>

        <td class="p-2">{{ med.date_received }}</td>
        
    </tr>
   
  </table>
  
    </div>
  </div>


<vue-html2pdf
        :show-layout="false"
        :float-layout="true"
        :enable-download="true"
        :preview-modal="false"
        :paginate-elements-by-height="1400"
        filename="report"
        :pdf-quality="2"
        :manual-pagination="false"
        pdf-format="a4"
        pdf-orientation="portrait"
        pdf-content-width="800px"
 
        
        @hasStartedGeneration="hasStartedGeneration()"
        @hasGenerated="hasGenerated($event)"
        ref="html2Pdf"
    >
        <section slot="pdf-content">
            <div v-html="printHtml"></div>
            
        </section>
    </vue-html2pdf>
    </div>
</template>

<script>

export default {
  mounted(){
    axios.get('/report/patient?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
          })
          //this.printHtml = document.getElementById('printable').innerHTML
          //this.printHtml = this.$refs.printable.innerHTML
          setTimeout( () => {
            this.printHtml = this.$refs.printable.innerHTML
            this.isDisabled = !this.isDisabled
        }, 1500)
  },

  data(){
    return{
      reportChoice: 1,
      tfChoice: 1,
      data: [],
      meds: [],
      printHtml: '',
      isDisabled: true,
    }
  },

  methods: {
    report(){
      
      if(this.reportChoice == 1){
        axios.get('/report/patient?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
          })
        }
      else if(this.reportChoice == 2){
        axios.get('/report/medicine?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
            //alert("2")
          })
        }
      else if(this.reportChoice == 3){
        axios.get('/report/bp?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
          })
        }

        this.isDisabled = 'true'
      setTimeout( () => {
        this.printHtml = this.$refs.printable.innerHTML
        this.isDisabled = !this.isDisabled
        }, 1500)
      },

      printme(){
        this.$refs.printable.generatePdf();
      },

      generateReport() {
            this.$refs.html2Pdf.generatePdf()
        }
      
      },

  
    
    
}
</script>