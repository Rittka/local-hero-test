<template>
  <v-data-table
    :headers="headers"
    :items="rows"
    :items-per-page="5"

    class="elevation-1"
  >  <tr>
          <td :colspan="headers.length">
            This is an appended row
          </td>
        </tr></v-data-table>






</template>
<script>
  export default {
    data () {
      return {

        headers: [
            {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
                filterable: true,
            },
            { text: 'Hotel', value: 'Hotel' },
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
                });
        }
    },
     created() {

            this.getData();
    },
     computed: {
        totalHotel () {
        console.log('get current total')
        return this.items.reduce((acc, cur) => acc + Number(cur.Current), 0);
    },
     }

  }

</script>
