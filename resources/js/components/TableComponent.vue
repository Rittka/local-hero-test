<template>
  <v-data-table
    :headers="headers"
    :items="rows"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>



</template>
<script>
  export default {
    data () {
      return {

        headers: [
            {
                text: 'Hotel',
                align: 'start',
                sortable: false,
                value: 'Hotel',
            },

            { text: 'Gym', value: 'Gym' },
            { text: 'Artz', value: 'Artz' },
            { text: 'Restaurant', value: 'Restaurant' },
            { text: 'Hospital', value: 'Hospital' },
            { text: 'School', value: 'School' },
        ],
        rows: [],
      }
    },
    methods:{
        getData(){
axios.get('/get-data')
    .then((response)=> {
        // handle success

        this.rows = response.data;


    })
    .catch(function(error) {
        // handle error
        console.log(error);
    })
    .then(function() {
        // always executed
    });
        }
    },
     created() {
         console.log(this.rows);
this.getData()
        },

  }

</script>
