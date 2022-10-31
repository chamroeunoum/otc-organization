<template >
  <div class="table-container" >
    <table id="ppfm" class="table" >
      <thead>
      <!-- Build the group of Framework, Benchmark, Regulator -->
      <!-- Array of Columns Headers -->
          <template >
            <tr >
              <th v-for="(header , index) in tableHeaderGroups" :colspan="header.totalChilds" :rowspan="(header.totalChilds<=0?2:'')" >{{ header.title }}</th>
            </tr>
            <tr >
              <th v-for="(header , index) in tableHeaders" :colspan="header.totalChilds" >{{ header.title }}</th>
            </tr>
          </template>
        </thead>
        <tbody>
          <template >
            
          </template>
        </tbody>
      </table>
  </div>
</template>

<script>
export default {
  data:()=>({
    selected:[],
    tableData:[],
    tableHeaders:[],
    tableHeaderGroups:[]
  }),
  mounted() {
    this.getColumnHeaders()
  },
  methods:{
    handleSelected(tr) {
      this.$vs.notify({
        title:`Selected ${tr.username}`,
        text:`Email: ${tr.email}`
      })
    },
    // Get Column Header
    getColumnHeaders (){
      axios.get(`/api/cdfbr/get_column_headers`)
      .then(response => {
        this.tableHeaderGroups = response.data[0]
        this.tableHeaders = response.data[1]
        for(let i in this.tableHeaders.length ){
          
        }
      })
      .catch(error => {
        this.errors = error.response.data.errors
      })
    },
    getTableData (){
      axios.get(`/api/cdfbr/get_table_data`)
      .then(response => {
        this.tableHeaderGroups = response.data[0]
        this.tableHeaders = response.data[1]
      })
      .catch(error => {
        this.errors = error.response.data.errors
      })
    }
  }
}
</script>
<style type="text/css" >
  .table-container {
    overflow: auto;
    width: 100%; 
    height: 800px; 
    padding: 2px;
  }
  table {
    border: none;
  }
  .table thead th {
      vertical-align: bottom;
      border: 1px solid #dee2e6;
  }
</style>