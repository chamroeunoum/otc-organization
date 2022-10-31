<template>
<div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="main-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="2" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                      <Tabs value="profileInformation">
                          <TabPane label="ព័ត៌មានផ្ទាល់ខ្លួន" name="profileInformation">
                            <Row :gutter="32" >
                              <Col span="24" >
                                <!-- Start Form -->
                                <Form :model="form.create.data" ref="form.create.data" :rules="form.create.rule">
                                  <Row type="flex" justify="start" align="top" class="code-row-bg" :gutter="32" >
                                      <Col span="8" offset="1">
                                          <h6 style="margin: 10px auto 20px auto; " >ព័ត៌មានអ្នកប្រើប្រាស់</h6>
                                          <FormItem label="គោត្តនាម (ត្រកូល)" label-position="top" prop="lastname" >
                                              <Input v-model="form.create.data.lastname" placeholder="គោត្តនាម (ត្រកូល)" >
                                                <Icon type="md-person" slot="prepend"></Icon>
                                              </Input>
                                          </FormItem>
                                          <FormItem label="នាម (ឈ្មោះ)" label-position="top" prop="firstname" >
                                              <Input v-model="form.create.data.firstname" placeholder="នាម (ឈ្មោះ)" >
                                                <Icon type="md-person" slot="prepend"></Icon>
                                              </Input>
                                          </FormItem>
                                          <FormItem label="អសយដ្ឋានសំបុត្រ" label-position="top" prop="email" >
                                              <Input v-model="form.create.data.email" placeholder="អសយដ្ឋានសំបុត្រ">
                                                  <Icon type="ios-mail" slot="prepend"></Icon>
                                              </Input>
                                          </FormItem>
                                          <!-- <FormItem v-if="form.create.data.role==1" label="ស្ថានភាពគណនី បន្ទាប់ពីបង្កើត បើក ឬ បិទ " label-position="top">
                                              <i-switch v-model="form.create.data.active" size="large" >
                                                  <span slot="open"><Icon type="ios-checkmark-circle-outline" ></Icon></span>
                                                  <span slot="close"><Icon type="ios-remove-circle-outline" class='text-danger' ></Icon></span>
                                              </i-switch>
                                          </FormItem>
                                          <FormItem v-if="form.create.data.role==1" label="ប្រភេទនៃគណនី" label-position="top">
                                              <i-switch v-model="form.create.data.role" size="large" >
                                                  <span slot="open"><Icon type="ios-contact" ></Icon></span>
                                                  <span slot="close"><Icon type="ios-remove-circle-outline" class="text-danger" ></Icon></span>
                                              </i-switch>
                                          </FormItem> -->
                                      </Col>
                                      <Col span="8" >
                                        <h6 style="margin: 10px auto 20px auto; " >រូបភាពអ្នកប្រើប្រាស់</h6>
                                        <div class="photo_preview" style="border: 1px solid #AAA; height: 140px; width: 120px; line-height: 140px; border-radius: 2px; background: #FFF; " >
                                          <img v-if=" form.create.data.avatar_url != false " :src="form.create.data.avatar_url" />
                                          <Icon v-if=" form.create.data.avatar_url == false " type="ios-person-outline" style="font-size: 7.5rem; color: #F3F3F3; " ></Icon>
                                        </div>
                                          <Upload
                                            :format="['jpg','jpeg','png']"
                                            :max-size="2048"
                                            :on-format-error="handleFormatError"
                                            :on-exceeded-size="handleMaxSize"
                                            :before-upload="handleBeforeUpload"
                                            type="drag"
                                            action="//jsonplaceholder.typicode.com/posts/"
                                            style="display: inline-block;width: 120px; margin: 10px auto auto; ">
                                            <div style="width: 120px;height:58px;line-height: 29px; ">
                                                <Icon type="ios-images-outline" size="20"></Icon><br/>
                                                សូមជ្រើសរើសរូបភាព 
                                            </div>
                                          </Upload>
                                      </Col>
                                  </Row>
                                </Form>
                                <Row type="flex" justify="start" align="top" class="code-row-bg" :gutter="32" >
                                  <Col span="8" offset='1' >
                                    <Button type="primary" :loading="form.create.btnProfileLoading" icon="md-checkmark" @click="updateAuthUser">រក្សាទុក</Button>
                                  </Col>
                                </Row>
                                <!-- End Form -->
                              </Col>
                            </Row>
                          </TabPane>
                          <TabPane label="ព័ត៌មានអង្គភាព" name="unitInformation">
                            <Row :gutter="32" >
                              <Col span="24" >

                              </Col>
                            </Row>
                          </TabPane>
                          <TabPane label="ប្ដូពាក្យសម្ងាត់" name="changePassword">
                            <Row :gutter="32" >
                              <Col span="24" >
                                <!-- Change Password -->
                                <Form :model="form.create.password" ref="form.create.password" :rules="form.create.password_rule">
                                  <Row type="flex" justify="start" align="top" class="code-row-bg" :gutter="32" >
                                    <Col span="8" offset='1' >
                                      <h6 style="margin: 30px auto 20px auto; " >ប្ដូរពាក្យសម្ងាត់</h6>
                                      <FormItem label="ពាក្យសម្ងាត់បច្ចុប្បន្ន (ចាស់)" label-position="top" prop="password" >
                                          <Input type="password" v-model="form.create.password.current" placeholder="ពាក្យសម្ងាត់បច្ចុប្បន្ន (ចាស់)" >
                                            <Icon type="md-lock" slot="prepend"></Icon>
                                          </Input>
                                      </FormItem>
                                      <FormItem label="ពាក្យសម្ងាត់ថ្មី" label-position="top" prop="password" >
                                          <Input type="password" v-model="form.create.password.password" placeholder="ពាក្យសម្ងាត់ថ្មី" >
                                            <Icon type="md-lock" slot="prepend"></Icon>
                                          </Input>
                                      </FormItem>
                                      <FormItem label="បញ្ជាក់ពាក្យសម្ងាត់ថ្មី" label-position="top" prop="password_confirmation" >
                                          <Input type="password" v-model="form.create.password.confirmation" placeholder="បញ្ជាក់ពាក្យសម្ងាត់ថ្មី">
                                              <Icon type="md-lock" slot="prepend"></Icon>
                                          </Input>
                                      </FormItem>
                                    </Col>
                                  </Row>
                                </Form>
                                <Row type="flex" justify="start" align="top" class="code-row-bg" :gutter="32" >
                                  <Col span="8" offset='1' >
                                    <Button type="primary" :loading="form.create.btnPasswordChangeLoading" icon="md-checkmark" @click="updateAuthPassword">ប្ដរពាក្យសម្ងាត់</Button>
                                  </Col>
                                </Row>
                                <!-- End Change Password -->
                              </Col>
                            </Row>
                          </TabPane>
                      </Tabs>
                    </Content>
                </Layout>
            </Layout>
        </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        create: {
            btnProfileLoading: false ,
            btnPasswordChangeLoading: false ,
            data: {
              id: 0 ,
              firstname: '',
              lastname: '',
              role: false ,
              email: '',
              email_verified_at: "" ,
              avatar: '',
              avatar_url: false ,
              active: false,
              created_at: "" ,
              deleted_at: "" ,
              updated_at: ""
            },
            password: {
              current: '' ,
              password: '' ,
              confirmation: ''
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
            },
            password_rule: {
              current: [
                  { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់ ដែលអ្នកកំពុងប្រើ !', trigger: 'blur' },
                  { type: 'string', min: 6, message: 'ពាក្យសម្ងាត់ត្រូវយ៉ាងហោចមានចំនួន ៦ តួ', trigger: 'blur' }
              ],
              password: [
                  { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់ ថ្មីដែលអ្នកចង់បាន !', trigger: 'blur' },
                  { type: 'string', min: 6, message: 'ពាក្យសម្ងាត់ត្រូវយ៉ាងហោចមានចំនួន ៦ តួ', trigger: 'blur' }
              ],
              confirmation: [
                { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់ ថ្មីដែលអ្នកចង់បានម្ដងទៀត ដើម្បីបញ្ចាក់ !', trigger: 'blur' },
              ]
            }
        }
      }
    }
  },
  mounted() {
    this.checkTokenString()
    this.getAuthUser()
  },
  methods: {
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
    handleMaxSize(){

    },
    handleFormatError(){

    },
    handleBeforeUpload(file){
      this.checkTokenString()
      const msg = this.$Message.info({
        content: "កំពុងបញ្ជូនរូបភាពអ្នកប្រើប្រាស់ទៅរក្សាទុក !" ,
        duration: 1200 ,
        closable: true
      })
      /**
     * Initialize the form data
     */
      let formData = new FormData();
      /**
       * Iteate over any file sent over appending the files
       * to the form data.
       */
      formData.append('files[0]', file )

      axios.post( '/api/profile/picture/upload',
        formData,
        {
          headers: {
              'Content-Type': 'multipart/form-data' ,
              'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token     
          }
        }
      ).then(response => {
        switch(response.status){
          case 200:
            localStorage.setItem( 'user' , JSON.stringify( 
                response.data.user
            ))
            this.form.create.data.avatar_url = response.data.user.avatar_url
            this.$Message.success( {
              content: response.data.message 
            })
          break;
          case 201:
            this.form.profile_picture = false
            this.$Message.error( {
              content: response.data.message 
            })
          break;
        }
        this.$Message.destroy()
      })
      .catch( (error) => {
        this.$Message.destroy()
        console.log( error )
        this.$Message.error( {
          content: "បរាជ័យក្នុងការបញ្ជូនឯកសារទៅម៉ាស៊ីនមេ !" 
        })
      })
      return false ;
    },
    getAuthUser () {
      this.checkTokenString()
      axios({
        url: `/api/profile/getAuthUser`,
        method: 'get',
        headers: {
          'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token
        }
      })
      .then(response => {
        this.form.create.data = {
          id: response.data.user.id ,
          firstname: response.data.user.firstname ,
          lastname: response.data.user.lastname ,
          role: response.data.user.role ? true : false ,
          email: response.data.user.email ,
          email_verified_at: response.data.user.email_verified_at ,
          avatar: response.data.user.avatar ,
          avatar_url: response.data.user.avatar_url ,
          active: response.data.user.active ? true : false ,
          created_at: response.data.user.created_at ,
          deleted_at: response.data.user.deleted_at ,
          updated_at: response.data.user.updated_at
        }
      })
      .catch(error => {
        this.btnProfileLoadnig = false
        console.log( error )
      })
    },
    updateAuthUser () {
      this.checkTokenString()
      this.btnProfileLoadnig = true 
      axios({
        url: `/api/profile/updateAuthUser`, 
        data: this.form.create.data ,
        method: 'put' ,
        headers: {
          'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token     
        }
      })
      .then(response => {
        this.btnProfileLoadnig = false
        this.$Message.success({
          content: response.data.message
        })
      })
      .catch(error => {
        this.btnProfileLoadnig = false
        console.log( error )
      })
    },
    updateAuthPassword() {
      this.checkTokenString()
      this.btnPasswordChangeLoading = true
      if( this.form.create.password.current == "" || this.form.create.password.password == "" || this.form.create.password.confirmation == "" ){
        this.$Message.warning({
          content: 'សូមបំពេញព័ត៌មានអោយបានពេញលេញមុន ផ្លាស់ប្ដូរពាក្យសម្ងាត់ !'
        })
        return false
      }
      if( this.form.create.password.password == this.form.create.password.confirmation ){
        axios({
          url: `/api/profile/updateAuthUserPassword`, 
          data: this.form.create.password ,
          method: 'put' ,
          headers: {
            'Authorization': JSON.parse( localStorage.getItem('token') ).token_type +' '+ JSON.parse( localStorage.getItem('token') ).access_token     
          }
        })
        .then(response => {
          this.btnPasswordChangeLoading = false
          switch( response.status ){
            case 200:
              this.$Message.success({
                content: response.data.message
              })
            break;
            case 201:
              this.$Message.success({
                content: response.data.message
              })
            break;
          }
          
          this.form.create.password.current = '' 
          this.form.create.password.password = '' 
          this.form.create.password.confirmation = '' 
        })
        .catch(error => {
          this.btnPasswordChangeLoading = false
          console.log( error )
        })
      }else{
        this.$Message.warning({
          content: 'ពាក្យសម្ងាត់ និង បញ្ជាក់ពាក្យសម្ងាត់ មិនផ្ទៀងផ្ទាត់ !'
        })
        this.btnPasswordChangeLoading = false
      }
    }
  }
}
</script>
<style type="text/css" >
  .ivu-layout-content {
    padding: auto auto 100px auto;
  }
  .photo_preview img {
    display: block;
    width: 100%;
    height: 100%;
  }
  .ivu-layout-content {
    background: #FFF;
  }

</style>