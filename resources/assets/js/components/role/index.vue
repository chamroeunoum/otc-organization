<template>
  <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="account-list-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="5" ></sidebar>
                </Sider>
                <Layout>
                    <Header>
                        <menu-header></menu-header>
                    </Header>
                    <Content>
                      <Breadcrumb separator=">" >
                        <BreadcrumbItem to="/dashboard">ព័ត៌មានសង្ខេប</BreadcrumbItem>
                        <BreadcrumbItem>សិទ្ធិ</BreadcrumbItem>
                        <Button size="small" shape='circle' @click="showCreate = true" icon="md-add" style="color: #007bff; " >បញ្ចូល</Button>
                      </Breadcrumb>
                      <Row :gutter="32" >
                        <Col span="6" style="text-align: left;margin: 10px auto; padding-left: 25px; ">
                          <Tooltip placement="right" content="ឈ្មោះនៃតារាង"  >
                            <div style="font-family: Khmer OS Muol; font-size: 0.8rem;" >បញ្ជីគណនីអ្នកប្រើប្រាស់</div>
                          </Tooltip>
                        </Col>
                        <Col span="18" style="text-align: right; margin: 10px auto ;">
                          <Tooltip placement="top" content="យកទិន្នន័យទាំងអស់ចេញទៅ Excel" >
                            <Icon type="md-cloud-done" size="24" @click="exportAllToExcel" />
                          </Tooltip>
                          <Tooltip placement="top" content="យកទិន្នន័យដើមនៃតារាងទៅ Excel" >
                            <Icon type="md-cloud-download" size="24" @click="exportOriginalDataToExcel" />
                          </Tooltip>
                          <Tooltip placement="top" content="យកទិន្នន័យបន្ទាប់ពីបានតម្រៀបរួចពីតារាងទៅ Excel" >
                            <Icon type="ios-cloud-download-outline" size="24" @click="exportSortedDataToExcel"  />
                          </Tooltip>
                          <Tooltip placement="top" content="ស្វែងរកព័ត៌មានក្នុងតារាង ..." >
                            <Input suffix="ios-search" placeholder="ស្វែងរក ..." style="width: auto; margin: auto auto auto 10px; " v-model="list.searchValue" @on-keydown="search" />
                          </Tooltip>
                        </Col>
                      </Row>
                      <Table 
                      ref="table"
                      height="605" 
                      :columns="list.columns" 
                      :data="list.visibleData"
                      :loading="list.loading" 
                      size="small"
                      no-data-text="មិនមានទិន្នន័យ !"
                      ></Table>
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
            title="បែបបទបង្កើតគណនី (សម្រាប់អ្នកគ្រប់គ្រងប្រព័ន្ធ)"
            v-model="showCreate"
            width="400"
            :mask-closable="false"
            :styles="styles"
        >
            <Form :model="form.create.data" ref="form.create.data" :rules="form.create.rule">
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="គោត្តនាម (ត្រកូល)" label-position="top" prop="lastname" >
                            <Input v-model="form.create.data.lastname" placeholder="គោត្តនាម (ត្រកូល)" >
                              <Icon type="md-person" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                    <Col span="24">
                        <FormItem label="នាម (ឈ្មោះ)" label-position="top" prop="firstname" >
                            <Input v-model="form.create.data.firstname" placeholder="នាម (ឈ្មោះ)" >
                              <Icon type="md-person" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                    <Col span="24">
                        <FormItem label="អសយដ្ឋានសំបុត្រ" label-position="top" prop="email" >
                            <Input v-model="form.create.data.email" placeholder="អសយដ្ឋានសំបុត្រ">
                                <Icon type="ios-mail" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                </Row>
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="ពាក្យសម្ងាត់" label-position="top" prop="password" >
                            <Input type="password" v-model="form.create.data.password" placeholder="ពាក្យសម្ងាត់" >
                              <Icon type="md-lock" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                    <Col span="24">
                        <FormItem label="បញ្ជាក់ពាក្យសម្ងាត់" label-position="top" prop="password_confirmation" >
                            <Input type="password" v-model="form.create.data.password_confirmation" placeholder="បញ្ជាក់ពាក្យសម្ងាត់">
                                <Icon type="md-lock" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                </Row>
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="ស្ថានភាពគណនី បន្ទាប់ពីបង្កើត បើក ឬ បិទ " label-position="top">
                            <i-switch v-model="form.create.data.active" size="large" >
                                <span slot="open">បើក</span>
                                <span slot="close">បិទ</span>
                            </i-switch>
                        </FormItem>
                    </Col>
                </Row>
            </Form>
            <div class="demo-drawer-footer">
                <Button style="margin-right: 8px" icon="ios-arrow-back" @click="closeCreationForm">បដិសេធ៍</Button>
                <Button type="primary" icon="md-checkmark" @click="createAccount('form.create.data')">រក្សាទុក</Button>
            </div>
        </Drawer>
        <!-- End New Record -->
        <!-- Edit Record -->
        <Drawer
            title="បែបបទកែប្រែគណនី (សម្រាប់អ្នកគ្រប់គ្រងប្រព័ន្ធ)"
            v-model="showEdit"
            width="400"
            :mask-closable="false"
            :styles="styles"
        >
            <Form :model="form.edit.data" ref="form.edit.data" :rules="form.edit.rule">
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="គោត្តនាម (ត្រកូល)" label-position="top" prop="lastname" >
                            <Input v-model="form.edit.data.lastname" placeholder="គោត្តនាម (ត្រកូល)" >
                              <Icon type="md-person" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                    <Col span="24">
                        <FormItem label="នាម (ឈ្មោះ)" label-position="top" prop="firstname" >
                            <Input v-model="form.edit.data.firstname" placeholder="នាម (ឈ្មោះ)" >
                              <Icon type="md-person" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                    <Col span="24">
                        <FormItem label="អសយដ្ឋានសំបុត្រ" label-position="top" prop="email" >
                            <Input v-model="form.edit.data.email" placeholder="អសយដ្ឋានសំបុត្រ">
                                <Icon type="ios-mail" slot="prepend"></Icon>
                            </Input>
                        </FormItem>
                    </Col>
                </Row>
                <Row :gutter="32">
                    <Col span="24">
                        <FormItem label="ស្ថានភាពគណនី បន្ទាប់ពីបង្កើត បើក ឬ បិទ " label-position="top">
                            <i-switch v-model="form.edit.data.active" size="large" >
                                <span slot="open">បើក</span>
                                <span slot="close">បិទ</span>
                            </i-switch>
                        </FormItem>
                    </Col>
                </Row>
            </Form>
            <div class="demo-drawer-footer">
                <Button style="margin-right: 8px" icon="ios-arrow-back" @click="showEdit = false">បដិសេធ៍</Button>
                <Button type="primary" icon="md-checkmark" @click="editAccount('form.edit.data')">រក្សាទុក</Button>
            </div>
        </Drawer>
        <!-- End Edit Record -->
        <!-- View Detail -->
        <Drawer :closable="false" width="400" v-model="showDetail">
          <div class="demo-drawer-profile">
            <Row>
                <Col span="12">
                    គោត្តនាម ៖ {{ form.view.data.lastname }}
                </Col>
                <Col span="12">
                    នាម ៖ {{ form.view.data.firstname }}
                </Col>
            </Row>
            <Divider />
            <Row>
                <Col span="12">
                    អ៊ីមែល ៖ {{ form.view.data.email }}
                </Col>
            </Row>
            <Divider />
            <Row>
                <Col span="12">
                    ស្ថានភាពគណនី ៖ 
                    <Tooltip v-if="form.view.data.active == true" content="គណនីដំណើរការធម្មតា" >
                      <Icon type="md-checkmark-circle" style="color: blue; " size="24" />
                    </Tooltip>
                    <Tooltip v-if="form.view.data.active == false" content="គណនីមិនដំណើរការ" >
                      <Icon type="md-remove-circle" style="color: red;" size="24" />
                    </Tooltip>
                </Col>
            </Row>
          </div>
        </Drawer>
        <!-- End View Detail -->
    </div>
</template>

<script>
export default {
  data () {
    return {
      /** Variable of the Table */
      list: {
        searchValue: '' ,
        columns: [] ,
        visibleColumns: [] ,
        data: [],
        filterData: [],
        visibleData: [] ,
        loading: true ,
        pagination: {
          perPage: 20 ,
          totalRecords: 0 ,
          current: 1 ,
          optionsPerpage: [ 5 , 10 , 20 , 30 , 40 , 50 , 100 ]
        }
      },
      /** Variable of the Drawer */
      showCreate: false ,
      showEdit: false ,
      showDetail: false ,
      /** Show form create */
      styles: {
          height: 'calc(100% - 55px)',
          overflow: 'auto',
          paddingBottom: '53px',
          position: 'static'
      },
      form: {
        create: {
          data: {
            firstname: '',
            lastname: '',
            email: '',
            avatar: '',
            active: true,
            password: '' ,
            password_confirmation: ''
          } ,
          rule: {
            lastname: [
                { required: true, message: 'សូមបញ្ចូល គោត្តនាម (ត្រកូល) !', trigger: 'blur' }
            ],
            firstname: [
                { required: true, message: 'សូមបញ្ចូលនាម (ឈ្មោះ) !', trigger: 'blur' }
            ],
            email: [
                { required: true, message: 'សូមបញ្ចូល អ៊ីមែលរបស់អ្នក !', trigger: 'blur' },
                { type: 'email', message: 'អ៊ីមែលមានទម្រង់មិនត្រូវត្រូវ', trigger: 'blur' }
            ],
            password: [
                { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់ !', trigger: 'blur' },
                { type: 'string', min: 6, message: 'ពាក្យសម្ងាត់ត្រូវយ៉ាងហោចមានចំនួន ៦ តួ', trigger: 'blur' }
            ],
            password_confirmation: [
              { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់ដើម្បីបញ្ចាក់ !', trigger: 'blur' },
            ]
          }
        },
        edit: {
          data: {
            firstname: '',
            lastname: '',
            email: '',
            active: true
          } ,
          rule: {
            lastname: [
                { required: true, message: 'សូមបញ្ចូល គោត្តនាម (ត្រកូល) !', trigger: 'blur' }
            ],
            firstname: [
                { required: true, message: 'សូមបញ្ចូលនាម (ឈ្មោះ) !', trigger: 'blur' }
            ],
            email: [
                { required: true, message: 'សូមបញ្ចូល អ៊ីមែលរបស់អ្នក !', trigger: 'blur' },
                { type: 'email', message: 'អ៊ីមែលមានទម្រង់មិនត្រូវត្រូវ', trigger: 'blur' }
            ]
          }
        },
        view: {
          data: {
            firstname: '',
            lastname: '',
            email: '',
            active: true
          }
        }
      }
    }
  },
  mounted() {
    this.getUsers()
  },
  methods: {
    deleteRecordFromDataManager(record){
      for(let index in this.list.data ){
        if( this.list.data[ index ].id == record.id ){
          this.list.data.splice( index , 1 )
        }
      }
      if( this.list.filterData.length ){
        for(let index in this.list.filterData ){
          if( this.list.filterData[ index ].id == record.id ){
            this.list.filterData.splice( index , 1 )
          }
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
      if( this.list.filterData.length ){
        for(let index in this.list.filterData ){
          if( this.list.filterData[ index ].id == record.id ){
            this.list.filterData[ index ].firstname = record.firstname 
            this.list.filterData[ index ].lastname = record.lastname
            this.list.filterData[ index ].email = record.email
            this.list.filterData[ index ].active = record.active ? 1 : 0 
          }
        }
      }
    },
    closeCreationForm(){
      this.showCreate = false
      this.form.create.data = {
            firstname: '',
            lastname: '',
            email: '',
            avatar: '',
            active: true,
            password: '' ,
            password_confirmation: ''
          }
    },
    showCreationForm(){
      this.showCreate = false
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
    /** Search data with in table */
    search(e){
      this.filterData = []
      this.list.visibleData = []
      if( this.list.searchValue != "" ){
        /** exclude columns from searching */
        let excludedColumns = ['created_at','updated_at','deleted_at']
        this.list.filterData = []
        for(let index in this.list.data ){
          for(let field in this.list.data[ index ] ){
            // console.log ( this.list.data[ index ][ field ] )
            if( this.list.data[ index ][ field ] != null && this.list.data[ index ][ field ] != "" && _.includes( this.list.data[ index ][ field ], this.list.searchValue ) ) {
              this.list.filterData.push( this.list.data[ index ] )
              continue
            }
          }
        }
        this.list.pagination.totalRecords = this.list.filterData.length
        this.list.pagination.current = 1 
        this.list.visibleData = this.list.filterData.slice(0,this.list.pagination.perPage)
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
      this.list.visibleData = this.list.filterData.length > 0 ? 
        this.list.filterData.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) + 1 ) , page * this.list.pagination.perPage ) :
        this.list.data.slice( ( ( ( page - 1 ) * this.list.pagination.perPage ) + 1 ) , page * this.list.pagination.perPage )
    },
    updatePageSize(pageSize){
      this.$Message.info( "រៀបចំតារាងឡើងវិញ ដោយដាក់ទិន្នន័យក្នុងមួយទំព័រ " + pageSize )
      this.list.pagination.perPage = pageSize
      this.updateCurrentPage(1)
    },
    createAccount(formData){
      this.$refs[formData].validate((valid) => {
          if (valid) {
              if( this.form.create.data.password != this.form.create.data.password_confirmation ){
                this.$Modal.error('ពាក្យសម្ងាត់ និង បញ្ជាក់ពាក្យសម្ងាត់ មិនផ្ទៀងផ្ទាត់ ។ សូមពិនិត្យអោយបានត្រឹមត្រូវ !');
              }else{
                axios.post(`/api/user/store`, this.form.create.data )
                .then(response => {
                  switch( response.status ){
                    case 200:
                      // បង្កើតគណនីបានជោគជ័យ
                      this.list.data.push( response.data.user )
                      this.$Message.info( response.data.message )
                      this.closeCreationForm()
                    break;
                    case 201:
                      // មានបញ្ហាក្នុងការបង្កើតគណនី
                      this.$Message.info( response.data.message )
                    break;
                  }
                  
                  // this.showCreate = false
                })
                .catch(error => {
                    console.log( error )
                    this.$Modal.error( error )
                })
              }
          } else {
              this.$Modal.error('ខ្វះខាតព័ត៌មានដែលតម្រូវអោយមាន ។ សូមពិនិត្យបែបបទបំពេញព័ត៌មានឡើងវិញ !');
          }
      })

    },
    editAccount(formData){
      this.$refs[formData].validate((valid) => {
          if (valid) {
                axios.post(`/api/user/update`, this.form.edit.data )
                .then(response => {
                  switch( response.status ){
                    case 200:
                      // កែប្រែព័ត៌មានបានជោគជ័យ
                      this.updateDataManager( response.data.user )
                      // this.updateFilterData( response.data.user )
                      // បង្ហាញសារជាដំណឹងជូន អ្នកប្រើប្រាស់
                      this.$Message.info( {
                        content: response.data.message 
                      })
                    break;
                    case 201:
                      // មានបញ្ហាក្នុងការបង្កើតគណនី
                      this.$Message.info( {
                        content: response.data.message 
                      })
                    break;
                  }
                  this.showEdit = false
                })
                .catch(error => {
                    console.log( error )
                    this.$Modal.error( {
                      content: error 
                    })
                })
          } else {
              this.$Modal.error('ខ្វះខាតព័ត៌មានដែលតម្រូវអោយមាន ។ សូមពិនិត្យបែបបទបំពេញព័ត៌មានឡើងវិញ !');
          }
      })
    },
    deleteAccount(formData){

    },
    getUsers(){
        axios.get(`/api/user/list`)
          .then(response => {
              // Buildup the Data Manager
              this.list.data = response.data.users
              this.list.loading = false
              this.getTableHeaders()
              // អានបានជោគជ័យ
              this.$Message.success( {
                content: 'ព័ត៌មានគណនីអ្នកប្រើប្រាស់'
              })
          })
          .catch(error => {
              console.log( error )
              this.$Modal.error( {
                content: error 
              })
          })
    },
    getTableHeaders(){
      if( this.list.data.length ){
        for( let field in this.list.data[0] ){
          if( ['created_at','updated_at','deleted_at','email_verified_at','avatar','avatar_url'].indexOf( field ) < 0 ){
            if( field == 'active' ){
              this.list.columns.push({
                title: field.replace( '_' , ' ' ).ucfirst() ,
                key: field ,
                minWidth: 50 ,
                sortable: true ,
                tooltip: true ,
                render: (h, params) => {
                  return h('i-switch',{
                    // slot: 'content'
                    props: {
                      value: params.row.active == 1 ? true : false
                    },
                    on: {
                      click: () => {
                        this.$Message.info({
                          content: 'me'
                        })
                      }
                    }
                  },[
                    h('span',{
                      props: {
                        slot: 'open'
                      }
                    },'បើក'),
                    h('span',{
                      props: {
                        slot: 'close'
                      }
                    },'បិទ')
                  ])
                }
              })
            }else{
              this.list.columns.push({
                title: field.replace( '_' , ' ' ).ucfirst() ,
                key: field ,
                minWidth: 50 ,
                sortable: true ,
                tooltip: true 
              })
            }
          }
        }

        this.list.columns.push(
          {
            title: 'Action',
            key: 'action',
            width: 150,
            align: 'center',
            render: (h, params) => {
                return h('div', [
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: 'កែប្រែទិន្នន័យ ៖ ' + params.row.email
                        }
                    },[
                      h('Button', {
                        props: {
                            shape: 'circle' ,
                            icon: 'md-create' ,
                            size: 'small'
                        },
                        style: {
                            marginRight: '5px' ,
                            color: '#007bff'
                        },
                        on: {
                            click: () => {
                                // console.log( params.index )
                                this.form.edit.data.lastname = params.row.lastname 
                                this.form.edit.data.firstname = params.row.firstname 
                                this.form.edit.data.email = params.row.email 
                                this.form.edit.data.active = params.row.active ? true : false
                                this.showEdit = true
                            }
                        }
                      })
                    ]),
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: 'លុបទិន្នន័យដែលមានលេខសម្គាល់ ៖ ' + params.row.id
                        }
                    },[
                      h('Button', {
                        props: {
                            icon: 'ios-trash' ,
                            size: 'small' ,
                            shape: 'circle'
                        },
                        style: {
                            marginRight: '5px' ,
                            color: '#dc3545'
                        },
                        on: {
                            click: () => {
                                this.$Modal.confirm({
                                  title: 'លុបព័ត៌មាន' ,
                                  content: 'តើអ្នកពិតជាចង់លុយព័ត៌មាននេះមែនទេ ?' ,
                                  okText: 'បាទ' ,
                                  cancelText: 'ទេ' ,
                                  loading: true ,
                                  onOk: () => {
                                    axios.put(`/api/user/destroy/`+ params.row.id )
                                    .then(response => {
                                      switch( response.status ){
                                        case 200:
                                          // អានបានជោគជ័យ
                                          this.deleteRecordFromDataManager( response.data.user )
                                          this.updateCurrentPage(1)
                                          this.$Message.success( response.data.message )
                                        break;
                                        case 201:
                                          this.$Message.warning( response.data.message )
                                        break;
                                      } 
                                      this.$Modal.remove()
                                    })
                                    .catch(error => {
                                        console.log( error )
                                        this.$Modal.error( error )
                                    })
                                    
                                  },
                                  onCancel: () => {
                                  }
                                })
                            }
                        }
                      })
                    ]),
                    h('Tooltip', {
                        props: {
                            placement: 'left' ,
                            content: 'មើលទិន្នន័យដែលមានលេខសម្គាល់ ៖ ' + params.row.id
                        }
                    },[
                      h('Button', {
                        props: {
                            icon: 'ios-eye' ,
                            size: 'small' ,
                            shape: 'circle'
                        },
                        style: {
                            marginRight: '5px',
                            color: "#007bff"
                        },
                        on: {
                            click: () => {
                                this.form.view.data.firstname = params.row.firstname
                                this.form.view.data.lastname = params.row.lastname
                                this.form.view.data.email = params.row.email
                                this.form.view.data.active = params.row.active
                                this.showDetail = true
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
</style>