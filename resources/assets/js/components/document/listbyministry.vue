<template>
  <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="account-list-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="5" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                      <Row :gutter="32" style="margin: auto auto 0px auto; " >
                        <Col span="6" style="text-align: left; margin: 10px 0px; ">
                          <Tooltip placement="right" content="ឈ្មោះនៃតារាង"  >
                            <div style="font-family: Khmer OS Muol; font-size: 0.8rem;" >តម្រៀបឯកសារគតិយុត្ត តាមប្រភទ ៖</div>
                          </Tooltip>
                        </Col>
                      </Row>
                      <Row :gutter="32" style="margin: auto 0px !important; " >
                        <Col span="24" style="padding: auto 20px !important; " >
                          <Tree :data="tree.data" :render="renderContent" ></Tree>
                        </Col>
                      </Row>
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
      selectedMinistryId: 0 ,
      selectedDocumentTypeId: 0 ,
      selectedDocumentYear: 0 ,
      selectedDocumentMonth: 0 ,
      /** Variable for Modal */
      pdfModal: {
        show: false ,
        title: 'ឯកសារយោង' ,
        file: null
      },
      tree: {
        data : [] 
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
        loading: true ,
        pagination: {
          perPage: 20 ,
          totalRecords: 0 ,
          current: 1 ,
          optionsPerpage: [ 5 , 10 , 20 , 30 , 40 , 50 , 100 ]
        }
      },
      types: [],
      ministries: [],
      selectedTypes: [],
      selectedYearMon: '' ,
      inputDocumentId: ''
    }
  },
  mounted() {
    this.checkTokenString()
    this.getDocumentTypes()
    this.getDocumentMinistry()
    // this.getRecords()
  },
  methods: {
    renderContent (h, { root, node, data }) {
        return h('span', {
            style: {
                display: 'inline-block',
                width: '100%'
            }
        }, [
            h('span', [
                h('Icon', {
                    props: {
                        type: (
                          node.parent == 0 ? 'ios-paper-outline' : ( node.parent == 1 ? 'md-clock' : ( node.parent == 2 ? 'ios-clock' : 'ios-document-outline' ) )
                        )
                    },
                    style: {
                        marginRight: '8px'
                    }
                }),
                h('span', data.title)
            ]),
            h('span', {
                style: {
                    display: 'inline-block',
                    float: 'right',
                    marginRight: '32px'
                }
            }, [
                h('Button', {
                    props: Object.assign({}, this.buttonProps, {
                        icon: 'ios-git-network'
                    }),
                    style: {
                        marginRight: '8px'
                    },
                    on: {
                        click: () => { 
                          this.append(data,node) 
                        }
                    }
                }),
                // h('Button', {
                //     props: Object.assign({}, this.buttonProps, {
                //         icon: 'ios-remove'
                //     }),
                //     on: {
                //         click: () => { this.remove(root, node, data) }
                //     }
                // })
            ])
        ]);
    },
    append (data, node) {
      const children = data.children || [];
      console.log( data )
        switch( node.nodeKey ){
          case 0 : 
            // get all document type(s) that document does exists
            for(let i in this.types ){
              children.push({
                  title: this.types[i].name ,
                  expand: true
              });
            }
            break;
          case 1 :
            // get all year
            
            break;
          case 2 :
          // let records = this.getDocumentMonths()
            break;
          default : 
          // list all matched document(s) of the above criteria
            break;
        }
        this.$set(data, 'children', children);
    },
    remove (root, node, data) {
        const parentKey = root.find(el => el === node).parent;
        const parent = root.find(el => el.nodeKey === parentKey).node;
        const index = parent.children.indexOf(data);
        parent.children.splice(index, 1);
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
    getDocumentMinistry(){
      this.checkTokenString()
          axios({
            url: `/api/ministry/list`,
            method: 'get',
            headers: {
              'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
            }
          })
          .then(response => {
              // Buildup the Data Manager
              this.ministries = response.data.records
              for(let index in this.ministries ){
                this.tree.data.push(
                  {
                      title: this.ministries[ index ].name ,
                      loading: false,
                      children: [] ,
                      expand:false ,
                      render: (h, { root, node, data }) => {
                        return h('span', {
                            style: {
                                display: 'inline-block',
                                width: '100%'
                            },
                            on: {
                              click: () => {
                                node.node.expand = !node.node.expand
                                if ( node.node.children.length <= 0 ) {
                                  // Read the document type that has the documents under ministry
                                  console.log( node.node.title )
                                  this.append(data,node) 
                                }
                              }
                            }
                        }, [
                            h('span', [
                                h('Icon', {
                                    props: {
                                        type: 'ios-folder-outline'
                                    },
                                    style: {
                                        marginRight: '8px'
                                    }
                                }),
                                h('span', data.title)
                            ])
                          ]);
                      }
                  }
                )
              }
              // អានបានជោគជ័យ
              this.$Message.success( {
                content: "អានឈ្មោះ ក្រសួង និង ស្ថាប័ន បានជោគជ័យ !"
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
    getDocumentTypeInMinistry(){
      this.checkTokenString()
    },
    getYears(){
      this.checkTokenString()
      this.list.loading = true 
        axios({
          url: `/api/search/get/document/year`,
          method: 'put',
          data: {
            'ministry_id' : '' ,
            'document_type_id' : ''
          },
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
    getDocumentByMinistry(){
      this.checkTokenString()
      this.list.loading = true 
        axios({
          url: `/api/document/list?document_type=`+this.selectedTypes,
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
                      params.row.document_year + '/' + this.types[ params.row.document_type ].format + '/' + params.row.fid
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
                            content: 'បើកឯកសារយោង ៖ ' + this.types[ params.row.document_type ].format + '/' + params.row.fid
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
                                this.pdfModal.title = params.row.document_type+'/'+params.row.document_year+'/'+params.row.fid
                                this.pdfModal.file = params.row.pdf
                                this.pdfModal.show = true
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