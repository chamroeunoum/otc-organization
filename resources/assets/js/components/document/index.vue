<template>
  <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="account-list-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="6" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                      <Row :gutter="32" style="margin: auto auto 0px auto; " >
                        <Col span="6" style="text-align: left; margin: 10px 0px; ">
                          <Tooltip placement="right" content="ឈ្មោះនៃតារាង"  >
                            <div style="font-family: Khmer OS Muol; font-size: 0.8rem;" >គ្រប់គ្រងឯកសារគតិយុត្ត</div>
                          </Tooltip>
                        </Col>
                      </Row>
                      <Row :gutter="32" style="margin: auto auto 10px auto; " >
                        <Col span="16" style="margin: 5px auto; ">
                          <Tooltip placement="top" content="វាយបញ្ចូលពាក្យគន្លឹះ ដើម្បីស្វែងរកឯកសារគតិយុត្ត ..." >
                            <Input suffix="ios-search" placeholder="ស្វែងរក ..." style="width: 500px;" v-model="list.searchValue" @on-keydown="keydownToSearch" />
                          </Tooltip>
                          <Button type="primary" shape="circle" icon="ios-search" @click="clickToSearch" >ស្វែងរក</Button>
                        </Col>
                        <Col span="4" style="margin: 5px auto; ">
                        </Col>
                      </Row>
                      <Row :gutter="32" style="margin: auto auto 10px auto; " >
                        <Col span="24" >
                          <Tooltip placement="bottom" content="ប្រអប់ជ្រើសរើសប្រភេទឯកសារ ដើម្បីជាលក្ខណស្វែងរក !" >
                            <Select v-model="selectedTypes" multiple style="width:260px" placeholder="សូមជ្រើសរើសប្រភេទឯកសារ !" @on-change="documentTypeSearch" >
                              <Option v-for="type in types" :value="type.id" :key="type.id">
                                <span>{{ type.name }}</span>
                                <span style="float:right;color:#ccc">{{ type.format }}</span>
                              </Option>
                            </Select>
                          </Tooltip>
                          <Tooltip placement="bottom" content="ប្រអប់ជ្រើសរើស ឆ្នាំ និង ខែ ចុះឯកសារ ដើម្បីជាលក្ខណស្វែងរក !" >
                            <DatePicker type="month" v-model="selectedYearMon" placeholder="សូមជ្រើសរើស ឆ្នាំ និង ខែ ឯកសារចុះ !" style="width: 200px" @on-change="documentYearSearch" ></DatePicker>
                          </Tooltip>
                          <Tooltip placement="bottom" content="ប្រអប់បញ្ចូលលេខចុះនៃឯកសារ ដើម្បីស្វែងរក !" >
                            <Input v-model="inputDocumentId" placeholder="សូមបញ្ចូលលេខចុះ !" style="width: 200px" @on-change="documentRegisterationSearch" />
                          </Tooltip>
                          <!-- <Button shape="circle" icon="ios-refresh-circle">ស្វែងរកឡើងវិញ !</Button> -->
                        </Col>
                      </Row>
                      <Row :gutter="32" style="margin: auto 0px !important; " >
                        <Col span="24" style="padding: auto 20px !important; " >
                          <Table 
                            ref="table"
                            height="605" 
                            :columns="list.columns" 
                            :data="list.visibleData"
                            :loading="list.loading" 
                            size="small"
                            no-data-text="មិនមានទិន្នន័យ !"
                            ></Table>
                        </Col>
                      </Row>
                      <Page 
                        :current="list.pagination.first" 
                        :total="list.pagination.totalRecords"  
                        show-elevator show-sizer show-total 
                        :page-size-opts="list.pagination.optionsPerpage" 
                        @on-change="updateCurrentPage"
                        :page-size="list.pagination.perPage"
                        @on-page-size-change="updatePageSize" />
                    </Content>
                </Layout>
            </Layout>
        </div>
        <Modal v-model="pdfModal.show" fullscreen :title="pdfModal.title" >
            <object height="100%" width="100%" type="application/pdf" :data="pdfModal.file">
              <p>កម្មវិធីរបស់អ្នកមិនអាចទ្រទ្រង់ការបង្ហាញ ឯកសារប្រភេទជា PDF បានទេ ! មិនថ្វីឡើយ ! <a :href="pdfModal.file">ចុចទីនេះ</a> ដើម្បីទាញយកឯកសារនេះ !</p>
            </object>
        </Modal>
    </div>
</template>

<script>
export default {
  data () {
    return {
      /** Variable for Modal */
      pdfModal: {
        show: false ,
        title: 'ឯកសារយោង' ,
        file: null
      },
      /** Variable of the Table */
      list: {
        searchValue: '' ,
        columns: [] ,
        visibleColumns: [] ,
        data: [],
        filter: {
          ids: [] ,
          data: []
        },
        visibleData: [] ,
        loading: false ,
        pagination: {
          perPage: 20 ,
          totalRecords: 0 ,
          current: 1 ,
          optionsPerpage: [ 5 , 10 , 20 , 30 , 40 , 50 , 100 ]
        }
      },
      types: [],
      selectedTypes: [],
      selectedYearMon: '' ,
      inputDocumentId: ''
    }
  },
  mounted() {
    this.checkTokenString()
    this.getDocumentTypes()
    // this.getRecords()
  },
  methods: {
    documentYearSearch(){
      let options = {
        year: 'numeric', day: '2-digit', month: '2-digit',
        hour: 'numeric', minute: 'numeric', second: 'numeric',
        hour12: false,
        hourCycle: 'h24' ,
        timeZone: 'Asia/Phnom_Penh' 
      }
      if( this.selectedYearMon != "" ){
        let stringDateTime = new Intl.DateTimeFormat('khmr', options).format( this.selectedYearMon ).toString().split(', ')
        let arrayDate = stringDateTime[0].split('/')
        let documentYear = new Array() 
        documentYear.push( arrayDate[2] ) // Add Year to first array element
        documentYear.push( arrayDate[0] ) // Add Month to first array element
        // documentYear.push( arrayDate[1] ) // Add Day to first array element
        // console.log( documentYear )
        // console.log( documentYear.join('-') )
        this.selectedYearMon = documentYear.join('-')
        this.getRecords()
      }
    },
    checkTokenString() {
        if( localStorage.getItem('token') == null || localStorage.getItem('token') == '' ) {
            this.$Message.error( {
                content: 'សូមចូលប្រើប្រាស់ប្រព័ន្ធម្ដង់ទៀត' ,
                duration: 0 ,
                closable: true
                })
            setTimeout(() => {
                window.location= '/login'
            }, 1200);
            return false ;
        }
    },
    deleteRecordFromDataManager(record){
      for(let index in this.list.data ){
        if( this.list.data[ index ].id == record.id ){
          this.list.data.splice( index , 1 )
        }
      }
      if( this.list.filter.data.length ){
        for(let index in this.list.filter.data ){
          if( this.list.filter.data[ index ].id == record.id ){
            this.list.filter.data.splice( index , 1 )
          }
        }
      }
    },
    exportOriginalDataToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell !" )
      this.$refs.table.exportCsv({ filename: 'បញ្ជីគណនីអ្នកប្រើប្រាស់ប្រព័ន្ធ PFMM' })
    },
    exportSortedDataToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell !" )
      this.$refs.table.exportCsv({ filename: 'បញ្ជីគណនីអ្នកប្រើប្រាស់ប្រព័ន្ធ PFMM (បានតម្រៀប)' , original: false })
    },
    exportAllToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell ។ ទិន្នន័យសរុបមានចំនួន " + this.list.data.length )
      this.$refs.table.exportCsv({
          filename: 'Custom data',
          columns: this.list.columns ,
          data: this.list.data
      })
    },
    keydownToSearch(e){
      if(e.keyCode==13){
        this.getRecords()
      }
    },
    documentTypeSearch(){
      let cache = setTimeout( this.getRecords() , 3600 )
      cache = null
    },
    documentRegisterationSearch(){
      let cache = setTimeout( this.getRecords() , 3600 )
      cache = null
    },
    clickToSearch(e){
      this.getRecords()
    },
    /** Search data with in table */
    search(e){
      this.list.filter.ids = []
      this.list.filter.data = []
      this.list.visibleData = []
      if( this.list.searchValue != "" ){
        /** exclude columns from searching */
        let excludedColumns = ['document_type','publish','approved_by','pdf','title','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by']
        this.list.filter.data = []
        for(let index in this.list.data ){
          for(let field in this.list.data[ index ] ){
            // console.log ( this.list.data[ index ][ field ] )
            if( this.list.data[ index ][ field ] != null && this.list.data[ index ][ field ] != "" && _.includes( this.list.data[ index ][ field ], this.list.searchValue ) ) {
              if( 
                // There is no item added to filtered list yet
                this.list.filter.ids.length == 0 || 
                // There are some items in the filtered list and need to ignore if it have already added
                ( this.list.filter.ids.indexOf( this.list.data[ index ].id ) < 0 )
              ){
                this.list.filter.ids.push( this.list.data[ index ].id )
                this.list.filter.data.push( this.list.data[ index ] )
              }
              else if( 
                // There are some items in the filtered list and need to format the matched test
                this.list.filter.ids.indexOf( this.list.data[ index ].id )  > -1  
                ){
                  // Code of format the matched string go here 
                }
            }
          }
        }
        this.list.pagination.totalRecords = this.list.filter.data.length
        this.list.pagination.current = 1 
        this.list.visibleData = this.list.filter.data.slice(0,this.list.pagination.perPage)
      }else{
        this.list.pagination.totalRecords = this.list.data.length 
        this.list.pagination.current = 1 
        this.list.visibleData = this.list.data.slice(0,this.list.pagination.perPage)
      }
    },
    /** Pagination */
    updateCurrentPage(page){
      this.list.visibleData = []
      this.list.pagination.current = page
      this.list.visibleData = this.list.filter.data.length > 0 ? 
        this.list.filter.data.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) + 1 ) , page * this.list.pagination.perPage ) :
        this.list.data.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) + 1 ) , page * this.list.pagination.perPage )
    },
    updatePageSize(pageSize){
      this.$Message.info( "រៀបចំតារាងឡើងវិញ ដោយដាក់ទិន្នន័យក្នុងមួយទំព័រ " + pageSize )
      this.list.pagination.perPage = pageSize
      this.updateCurrentPage(1)
    },
    getDocumentTypes(){
      this.checkTokenString()
      axios({
        url: `/api/type/list`,
        method: 'get',
        headers: {
          'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
        }
      })
      .then(response => {
          // Buildup the Data Manager
          this.types = response.data.records
          // អានបានជោគជ័យ
          this.$Message.success( {
            content: "អានប្រភេទឯកសារបានជោគជ័យ !"
          })
      })
      .catch(error => {
        console.log( error )
        this.$Message.error({
          content: error.response.data.message ,
          duration: 0,
          closable: true
        })
      })
    },
    getRecords(){
      this.checkTokenString()
      this.list.loading = true 
        axios({
          url: `/api/search/list?search=`+this.list.searchValue+'&document_type='+this.selectedTypes+'&document_year='+this.selectedYearMon+'&fid='+this.inputDocumentId,
          method: 'get',
          headers: {
            'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
          }
        })
        .then(response => {
            // Buildup the Data Manager
            this.list.data = []
            this.list.data = response.data.records
            this.list.loading = false
            this.getTableHeaders()
            // អានបានជោគជ័យ
            this.$Message.success( {
              content: response.data.message
            })
        })
        .catch(error => {
            console.log( error )
                  this.$Message.error({
                                  content: error.response.data.message ,
                                  duration: 0,
                                  closable: true
                              })
        })
    },
    getTableHeaders(){
      this.list.columns = []
      if( this.list.data != undefined && this.list.data.length ){
        for( let field in this.list.data[0] ){
          if( ['document_type','publish','approved_by','pdf','title','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'].indexOf( field ) < 0 ){
            if( field == 'id' ){
              this.list.columns.push({
                title: "ល.រ" ,
                key: field ,
                minWidth: 50 ,
                maxWidth: 100 ,
                sortable: true ,
                tooltip: true 
              })
            }else if( field == 'fid' ){
              this.list.columns.push({
                title: "លេខចុះ" ,
                key: field ,
                minWidth: 50 ,
                maxWidth: 200 ,
                sortable: true ,
                tooltip: true ,
                render: (h, params) => {
                  return h('div',[
                      params.row.document_year + '/' + (this.types[ params.row.document_type ] != undefined ? this.types[ params.row.document_type ].format + '/' : params.row.document_type + '/' ) + params.row.fid
                    ]
                  )
                }
              })
            }else if( field == 'objective' ){
              this.list.columns.push({
                title: "កម្មវត្ថុ" ,
                key: field ,
                minWidth: 150 ,
                minWidth: 350 ,
                sortable: true ,
                tooltip: true ,
                render: (h, params) => {
                  return h('div',[
                      params.row.objective
                    ]
                  )
                }
              })
            }else if( field == 'document_year' ){
              this.list.columns.push({
                title: "កាលបរិច្ឆែកចុះ" ,
                key: field ,
                minWidth: 50 ,
                maxWidth: 150 ,
                sortable: true ,
                tooltip: true 
              })
            }
          }
        }

        this.list.columns.push(
          {
            title: 'ប្រតិបត្តិការ',
            key: 'action',
            width: 150,
            align: 'center',
            render: (h, params) => {
                return h('div', [
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: 'បើកឯកសារយោង ៖ ' + ( this.types[ params.row.document_type ] != undefined ? this.types[ params.row.document_type ].format + '/' : params.row.document_type + '/' ) + params.row.fid
                        }
                    },[
                      h('Button', {
                        props: {
                            icon: 'ios-document-outline' ,
                            size: 'small' ,
                            shape: 'circle'
                        },
                        class: 'text-danger' ,
                        style: {
                            marginRight: '5px',
                            color: "#007bff"
                        },
                        on: {
                            click: () => {
                              this.checkTokenString()
                              axios({
                                url: `/api/search/pdf`,
                                method: 'put',
                                data: {
                                  id : params.row.id
                                },
                                headers: {
                                  'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
                                }
                              })
                              .then(response => {
                                  // Buildup the Data Manager
                                  this.pdfModal.title = params.row.document_type+'/'+params.row.document_year+'/'+params.row.fid
                                  // this.pdfModal.file = params.row.pdf
                                  this.pdfModal.file = response.data
                                  // អានបានជោគជ័យ
                                  this.$Message.success( {
                                    content: "អានឯកសារយោងបានជោគជ័យ !"
                                  })
                                  this.pdfModal.show = true
                              })
                              .catch(error => {
                                console.log( error )
                                this.$Message.error({
                                  content: error.response.data.message ,
                                  duration: 0,
                                  closable: true
                                })
                              })
                            }
                        }
                      })
                    ])
                ]);
            }
          }
        )

        this.list.pagination.totalRecords = this.list.data.length 
        this.list.pagination.perPage = 20 
        this.list.pagination.current = 1 
        this.list.visibleData = this.list.data.slice(0,this.list.pagination.perPage)
      }
    }
  }
}
</script>
<style >
  .ivu-drawer-header {
    height: auto !important;
    line-height: 25px !important;
  }
  .ivu-drawer-header-inner {
    height: auto !important;
    line-height: 25px !important;
    font-family: Khmer OS Muol;
    font-size: 0.8rem;
    font-weight: normal;
  }
  .ivu-page {
    position: absolute;
    bottom: 0;
    right: 0;
    background: #FAFAFA;
    border-radius: 3px 0px 0px 0px;
    padding: 5px;
    border: 1px solid #AAA;
    border-right: none;
    border-bottom: none;
  }
  .ivu-tooltip-inner {
    max-width: 500px !important;
  }
</style>