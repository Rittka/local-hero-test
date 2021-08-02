<template>
  <v-data-table
    :headers="headers"
    :items="rows"
    :items-per-page="5"

    class="elevation-1"
>  <template

        v-slot:body.append="{ headers }"
      >
        <tr>
          <td>
                Summary
          </td>
           <td>
                {{ totalHotel }}
          </td>
           <td>
                {{ totalGym }}
          </td>
           <td>
                {{ totalArtz }}
          </td>
           <td >
                {{ totalRestaurant }}
          </td>
           <td>
                {{ totalHospital}}
          </td>
           <td>
              {{ totalSchool}}
          </td>
        </tr>
      </template></v-data-table>






</template>
<script>
  export default {
    data () {
      return {
           slots: [ 'body.append'],


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

        return this.rows.reduce((acc, cur) => acc + Number(cur.Hotel), 0);
    },
        totalGym () {

        return this.rows.reduce((acc, cur) => acc + Number(cur.Gym), 0);
    },
        totalArtz () {

        return this.rows.reduce((acc, cur) => acc + Number(cur.Artz), 0);
    },
        totalRestaurant () {

        return this.rows.reduce((acc, cur) => acc + Number(cur.Restaurant), 0);
    },
       totalHospital () {

        return this.rows.reduce((acc, cur) => acc + Number(cur.Hospital), 0);
    },
       totalSchool () {

        return this.rows.reduce((acc, cur) => acc + Number(cur.School), 0);
    },


     }
  }

</script>
