<template>
  <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="account-list-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="3" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                      <Row :gutter="32" style="margin: auto auto 0px auto; " >
                        <Col span="6" style="text-align: left; margin: 10px 0px; ">
                          <div style="font-family: Khmer OS Muol; font-size: 0.8rem;" >កម្រងឯកសាររក្សាទុក</div>
                        </Col>
                        <Col span="16" style="margin: 5px auto; ">
                          <Tooltip placement="top" content="វាយបញ្ចូលពាក្យគន្លឹះ ដើម្បីស្វែងរកឯកសារគតិយុត្ត ..." >
                            <Input suffix="ios-search" placeholder="ស្វែងរក ..." style="width: 500px;" v-model="list.searchValue" @on-keydown="search" />
                          </Tooltip>
                          <Button type="primary" shape="circle" icon="md-add" @click="showCreationForm" >បញ្ចូលកម្រងឯកសារ</Button>
                        </Col>
                        <Col span="4" style="margin: 5px auto; ">
                        </Col>
                      </Row>
                      <Row :gutter="32" style="margin: auto 0px !important; " >
                        <Col span="24" style="padding: auto 20px !important; " >
                          <Table 
                            ref="table"
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
        <!-- New Record -->
        <Drawer
            title=""
            v-model="showCreate"
            width="400"
            :mask-closable="false"
            :styles="styles"
        >
            <Form :model="form.create.data" ref="form.create.data" :rules="form.create.rule" @on-submit="addFolder('form.create.data')" >
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="ឈ្មោះកម្រងឯកសារ" label-position="top" prop="name" >
                            <Input v-model="form.create.data.name" placeholder="ឈ្មោះកម្រងឯកសារ" >
                              <Icon type="md-folder" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                </Row>
            </Form>
            <div class="demo-drawer-footer">
                <Button style="margin-right: 8px" icon="ios-arrow-back" @click="closeCreationForm">បដិសេធ៍</Button>
                <Button type="primary" icon="md-checkmark" @click="addFolder('form.create.data')">រក្សាទុក</Button>
            </div>
        </Drawer>
        <!-- End New Record -->
        <!-- View Document within Folder -->
        <Drawer
            title=""
            v-model="showDocuments"
            width="50%"
            :mask-closable="false"
            :styles="styles"
        >
            <Row :gutter="32" style="font-size: 1rem; " >
                <Col span="24">ឯកសារ នៃ កម្រងឯកសារ !</Col>
            </Row>
            <Divider/>
          <Row :gutter="32">
              <Col span="24">
                  <List v-if="documentsWithinFolder.length" header="" footer="" border size="small">
                      <ListItem v-for="documentFolder in documentsWithinFolder" :value="documentFolder.document.id" :key="documentFolder.document.id" >
                        <ListItemMeta :title="documentFolder.document.type.format + '/' + documentFolder.document.document_year + '/' + documentFolder.document.fid" :description="documentFolder.document.objective"/>
                        <template slot="action">
                            <li>
                              <Tooltip content="មើលឯកសារយោង !" >
                                <Icon v-if="documentFolder.document.pdf !== null" type="ios-document" style="color: #ff0055; " @click="showPDFFile(documentFolder.document)" />
                              </Tooltip>
                            </li>
                        </template>
                      </ListItem>
                  </List>
              </Col>
          </Row>
          <Divider/>
            <Row :gutter="32">
              <Col span="24">
                <div class="demo-drawer-footer">
                  <Button style="margin-right: 8px" icon="ios-arrow-back" @click="closeDocumentsForm">បកក្រោយ</Button>
                </div>
              </Col>
            </Row>
        </Drawer>
        <!-- End View Document within Folder -->
        <!-- View PDF document -->
        <Modal v-model="pdfModal.show" fullscreen :title="pdfModal.title" >
            <object height="100%" width="100%" type="application/pdf" :data="pdfModal.file">
              <p>កម្មវិធីរបស់អ្នកមិនអាចទ្រទ្រង់ការបង្ហាញ ឯកសារប្រភេទជា PDF បានទេ ! មិនថ្វីឡើយ ! <a :href="pdfModal.file">ចុចទីនេះ</a> ដើម្បីទាញយកឯកសារនេះ !</p>
            </object>
            <div slot="footer">
                <Button type="error" size="large" long @click="closePDFForm">បិទ</Button>
            </div>
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
      // Documents within Folder
      documentsWithinFolder: [] ,
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
      /** Variable of the Drawer */
      showDocuments: false ,
      showCreate: false ,
      showEdit: false ,
      showDetail: false ,
      /** Show form create */
      styles: {
          height: 'calc(100% - 55px)',
          overflow: 'auto',
          padding: ' 20px !important',
          position: 'static'
      },
      form: {
        create: {
          data: {
            name: ''
          } ,
          rule: {
            name: [
                { required: true, message: 'សូមបញ្ចូល ឈ្មោះកម្រងឯកសារ!', trigger: 'blur' }
            ]
          }
        },
        edit: {
          data: {
            name: ''
          } ,
          rule: {
            name: [
                { required: true, message: 'សូមបញ្ចូល ឈ្មោះកម្រងឯកសារ!', trigger: 'blur' }
            ]
          }
        },
        view: {
          data: {
            name: ''
          }
        }
      }
    }
  },
  mounted() {
    this.getRecords()
  },
  methods: {
    deleteFolder(folderId){
      /** Process of delete document without asking */
      axios({
      url: `/api/folder/delete`,
      method: 'put',
      data: {
        id : folderId
      },
      headers: {
        'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
      }
      })
      .then(response => {
        switch(response.status){
          case 200:
            this.deleteRecordFromDataManager( response.data.record )
            this.updateCurrentPage(1)
          break;
        }
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
      // End process of delete the folder
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
    showPDFFile(document){
      this.checkTokenString()
      if( document.pdf == null ) return false 
      axios({
        url: `/api/search/pdf`,
        method: 'put',
        data: {
          id : document.id
        },
        headers: {
          'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
        }
      })
      .then(response => {
        switch(response.status){
          case 200:
            // Buildup the Data Manager
            this.pdfModal.title = document.document_type+'/'+document.document_year+'/'+document.fid
            this.pdfModal.file = response.data.pdf
            // អានបានជោគជ័យ
            this.$Notice.success( {
              desc: response.data.message
            })
            this.pdfModal.show = true
          break;
          default:
            this.$Notice.warning( {
              desc: response.data.message
            })
          break;
        }
      })
      .catch(error => {
        console.log( error )
        this.$Notice.error({
          desc: error.response.data.message ,
          duration: 0,
          closable: true
        })
      })
    },
    closePDFForm(){
      this.pdfModal.file = ""
      this.pdfModal.show = false
    },
    getRecords(){
      this.checkTokenString()
      // if( !this.checkSearchValue() ) {
      //   this.$Message.info('សូមបំពេញលក្ខណដើម្បីស្វែងរក ...')
      //   return false
      // }
      this.list.loading = true 
        axios({
          url: `/api/folder/user?search=`+ this.list.searchValue ,
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
          if( ['created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'].indexOf( field ) < 0 ){
            if( field == 'id' ){
              this.list.columns.push({
                title: "ល.រ" ,
                key: field ,
                minWidth: 50 ,
                maxWidth: 100 ,
                sortable: true ,
                tooltip: true 
              })
            }else if( field == 'name' ){
              this.list.columns.push({
                title: "ឈ្មោះកម្រងឯកសារ" ,
                key: field ,
                minWidth: 150 ,
                minWidth: 350 ,
                sortable: true ,
                tooltip: true ,
                render: (h, params) => {
                  return h('div',[
                      params.row.name
                    ]
                  )
                }
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
                    // START BUTTON DOCUMENT
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: params.row.documents.length < 1 ? "មិនមានឯកសារយោង !" : "មានឯកសារចំនួន " + params.row.documents.length + " ក្នុងកម្រងឯកសារនេះ !" 
                        }
                    },[
                      h('Button', {
                        props: {
                            icon: params.row.documents.length > 0 ? 'ios-folder' : 'ios-folder-outline' ,
                            size: 'small' ,
                            shape: 'circle'
                        },
                        style: {
                            marginRight: '5px',
                            color: params.row.documents.length > 0 ? "#ff0055" : "#798897"
                        },
                        on: {
                            click: () => {
                                this.checkTokenString()
                                if( params.row.documents.length > 0 ) {
                                  this.documentsWithinFolder = params.row.documents 
                                  this.showDocumentsForm()
                                  console.log( this.documentsWithinFolder )
                                //   axios({
                                //   url: `/api/search/pdf`,
                                //   method: 'put',
                                //   data: {
                                //     id : params.row.id
                                //   },
                                //   headers: {
                                //     'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
                                //   }
                                //   })
                                //   .then(response => {
                                //       // Buildup the Data Manager
                                //       this.pdfModal.title = params.row.document_type+'/'+params.row.document_year+'/'+params.row.fid
                                //       // this.pdfModal.file = params.row.pdf
                                //       this.pdfModal.file = response.data.pdf
                                //       // អានបានជោគជ័យ
                                //       this.$Message.success( {
                                //         content: "អានឯកសារយោងបានជោគជ័យ !"
                                //       })
                                //       this.pdfModal.show = true
                                //   })
                                //   .catch(error => {
                                //     console.log( error )
                                //     this.$Message.error({
                                //       content: error.response.data.message ,
                                //       duration: 0,
                                //       closable: true
                                //     })
                                //   })
                                }
                            }
                        }
                      })
                    ]),
                    // END BUTTON DOCUMENT
                    // START BUTTON EXPORT
                    // h('Tooltip', {
                    //     props: {
                    //         placement: 'left' ,
                    //         content: params.row.documents.length < 1 ? "មិនមានឯកសារយោង !" : "មានឯកសារចំនួន " + params.row.documents.length + " ក្នុងកម្រងឯកសារនេះ !" 
                    //     }
                    // },[
                    //   h('Button', {
                    //     props: {
                    //         icon: params.row.documents.length > 0 ? 'ios-cloud-download' : 'ios-cloud-download-outline' ,
                    //         size: 'small' ,
                    //         shape: 'circle'
                    //     },
                    //     style: {
                    //         marginRight: '5px',
                    //         color: params.row.documents.length > 0 ? "#ff0055" : "#798897"
                    //     },
                    //     on: {
                    //         click: () => {
                    //             this.checkTokenString()
                    //             if( params.row.documents.length > 0 ) {
                    //               // Down all the documents into a zip file
                    //               axios({
                    //               url: `/api/search/pdf`,
                    //               method: 'put',
                    //               data: {
                    //                 id : params.row.id
                    //               },
                    //               headers: {
                    //                 'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
                    //               }
                    //               })
                    //               .then(response => {
                    //                   // Buildup the Data Manager
                    //                   this.pdfModal.title = params.row.document_type+'/'+params.row.document_year+'/'+params.row.fid
                    //                   // this.pdfModal.file = params.row.pdf
                    //                   this.pdfModal.file = response.data.pdf
                    //                   this.pdfModal.show = true
                    //               })
                    //               .catch(error => {
                    //                 console.log( error )
                    //                 this.$Message.error({
                    //                   content: error.response.data.message ,
                    //                   duration: 0,
                    //                   closable: true
                    //                 })
                    //               })
                    //             }
                    //         }
                    //     }
                    //   })
                    // ]),
                    // END BUTTON EXPORT
                    // START BUTTON DELETE
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: "លុបកម្រងឯកសារ !"
                        }
                    },[
                      h('Button', {
                        props: {
                            icon: 'ios-trash' ,
                            size: 'small' ,
                            shape: 'circle'
                        },
                        style: {
                            marginRight: '5px',
                            color: "#ff0055"
                        },
                        on: {
                            click: () => {
                                this.checkTokenString()
                                if( params.row.id > 0 ) {
                                  // Check the document within the folder first before delete it
                                  axios({
                                  url: `/api/folder/checkdocument`,
                                  method: 'put',
                                  data: {
                                    id : params.row.id
                                  },
                                  headers: {
                                    'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
                                  }
                                  })
                                  .then(response => {
                                    switch(response.status){
                                      case 200:
                                        this.$Modal.confirm({
                                          title: 'លុបកម្រងឯកសារ !',
                                          content: response.data.message ,
                                          okText: "លុបទាំងអស់ !" ,
                                          cancelText: "មិនលុបទេ !" ,
                                          onOk: () => {
                                              this.deleteFolder(params.row.id)
                                          },
                                          onCancel: () => {
                                              
                                          }
                                      });
                                      break;
                                      case 201:
                                        if( response.data.folder !== null ){
                                          this.deleteFolder( params.row.id )
                                        }
                                      break;
                                    }
                                  })
                                  .catch(error => {
                                    console.log( error )
                                    this.$Message.error({
                                      content: error.response.data.message ,
                                      duration: 0,
                                      closable: true
                                    })
                                  })
                                  // End of process check document within folder
                                }
                            }
                        }
                      })
                    ]),
                    // END BUTTON DELETE
                ]);
            }
          }
        )

        this.list.pagination.totalRecords = this.list.data.length 
        this.list.pagination.perPage = 20 
        this.list.pagination.current = 1 
        this.list.visibleData = this.list.data.slice(0,this.list.pagination.perPage)
      }
    },
    deleteRecordFromDataManager(record){
      for(let index in this.list.data ){
        if( this.list.data[ index ].id == record.id ){
          this.list.data.splice( index , 1 )
        }
      }
    },
    updateDataManager( record ){
      for(let index in this.list.data ){
        if( this.list.data[ index ].id == record.id ){
          this.list.data[ index ].firstname = record.firstname 
          this.list.data[ index ].lastname = record.lastname
          this.list.data[ index ].email = record.email
          this.list.data[ index ].active = record.active ? 1 : 0 
        }
      }
      if( this.list.filter.data.length ){
        for(let index in this.list.filter.data ){
          if( this.list.filter.data[ index ].id == record.id ){
            this.list.filter.data[ index ].firstname = record.firstname 
            this.list.filter.data[ index ].lastname = record.lastname
            this.list.filter.data[ index ].email = record.email
            this.list.filter.data[ index ].active = record.active ? 1 : 0 
          }
        }
      }
    },
    closeCreationForm(){
      this.showCreate = false
      this.form.create.data = {
            name: ''
          }
    },
    showCreationForm(){
      this.showCreate = true
    },
    closeDocumentsForm(){
      this.showDocuments = false
    },
    showDocumentsForm(){
      this.showDocuments = true
    },
    exportOriginalDataToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell !" )
      this.$refs.table.exportCsv({ filename: 'បញ្ជីគណនីអ្នកប្រើប្រាស់ប្រព័ន្ធ PFMM' })
    },
    exportSortedDataToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell !" )
      this.$refs.table.exportCsv({ filename: 'បញ្ជីគណនីអ្នកប្រើប្រាស់ប្រព័ន្ធ E-Doc (បានតម្រៀប)' , original: false })
    },
    exportAllToExcel(){
      this.$Message.info( "កំពុងយកទិន្នន័យចេញពីប្រព័ន្ធទៅ Excell ។ ទិន្នន័យសរុបមានចំនួន " + this.list.data.length )
      this.$refs.table.exportCsv({
          filename: 'Custom data',
          columns: this.list.columns ,
          data: this.list.data
      })
    },
    /** Search data with in table */
    search(e){
      this.list.filter.ids = []
      this.list.filter.data = []
      this.list.visibleData = []
      if( this.list.searchValue != "" ){
        /** exclude columns from searching */
        let excludedColumns = ['created_at','updated_at','deleted_at']
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
        this.list.filter.data.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) ) , page * this.list.pagination.perPage ) :
        this.list.data.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) ) , page * this.list.pagination.perPage )
    },
    updatePageSize(pageSize){
      this.$Message.info( "រៀបចំតារាងឡើងវិញ ដោយដាក់ទិន្នន័យក្នុងមួយទំព័រ " + pageSize )
      this.list.pagination.perPage = pageSize
      this.updateCurrentPage(1)
    },
    checkSearchValue(){
      return this.list.searchValue != '' 
    },
    // ADD FOLDER
    addFolder(data){
      axios({
          url: `/api/folder/store`,
          method: 'post',
          data: {
            name : this.form.create.data.name
          },
          headers: {
            'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
          }
      })
      .then(response => {
        switch( response.status ){
          case 200:
            // អានបានជោគជ័យ
            this.list.data.push( response.data.record )
            this.updateCurrentPage(1)
          break;
          case 201:
          break;
        }
        
        this.$Message.success( {
          content: response.data.message
        })
        this.closeCreationForm()

      })
      .catch(error => {
        console.log( error )
        this.$Message.error({
          content: error.response.message ,
          duration: 0,
          closable: true
        })
      })
    },
    // END ADD FOLDER
    keydownToSearch(){

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
  .ivu-list-items .ivu-list-item-meta-content .ivu-list-item-meta-title , .ivu-list-items .ivu-list-item-meta-content .ivu-list-item-meta-description {
    font-size: 0.8rem;
  }
</style>