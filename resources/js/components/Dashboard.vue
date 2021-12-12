<template>
  <div>
    <apexchart width="350" type="donut" :options="options" :series="options.series"></apexchart>
  </div>
</template>

<script>
  export default{
    props: ['male', 'female'],

    data() {
    return {
      total: 5,
      options: {
        legend: {
          fontSize: '12px',
          fontFamily: 'Helvetica, Arial',
          fontWeight: 400,
          itemMargin: {
            vertical: 10
          },
          
        },
        dataLabels: {
          enabled: true,
        },

        labels: ['Male', 'Female'],
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                name: {
                  show: true,
                  fontSize: '22px',
                  fontFamily: 'Rubik',
                  color: '#dfsda',
                  offsetY: -10
                },
                value: {
                  show: true,
                  fontSize: '16px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  color: undefined,
                  offsetY: 16,
                  formatter: function (val) {
                    return val
                  }
                },
                total: {
                  show: true,
                  label: 'Total Patients',
                  color: '#373d3f',
                  formatter: function (w) {
                    return w.globals.seriesTotals.reduce((a, b) => {
                      return a + b
                    }, 0)
                    }
                  }
                }
              }
            }
          },
      series: [this.male, this.female],
      
    }
    }
  },
    
  }
</script>
