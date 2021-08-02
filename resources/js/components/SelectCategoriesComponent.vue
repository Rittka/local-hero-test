<template>

     <v-select multiple  v-model="selected" :options="['Ross','Rachel' ,'Joye' ,'Chandller','Pheobe' ,'Monica' ,'Suzan' ,'Ben']" />

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
         data () {
      return {
          selected:[]
      }}
    }
</script>
