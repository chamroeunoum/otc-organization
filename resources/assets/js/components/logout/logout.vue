<template>
  <div >
    <Table 
    height="200" 
    :columns="columns" 
    :data="data" 
    :loading="loading"
    ></Table>
  </div>
</template>

<script>
export default {
  data () {
    return {
        data: [] ,
        columns: [] ,
        loading: true
    }
  },
  mounted() {
    this.getUsers()
  },
  methods: {
    getUsers(){
      // console.log( window.token )
        axios.get(`/api/user/list`)
          .then(response => {
              // Buildup the Data Manager
              this.data = response.data.users
              this.loading = false
              // អានបានជោគជ័យ
              this.$Notice.success( {
                title: 'ព័ត៌មានគណនីអ្នកប្រើប្រាស់' ,
                desc: response.data.message ,
                position: 'top-right'
              })
          })
          .catch(error => {
              console.log( error )
              this.$Notice.error( error )
          })
    }
  }
}
</script>