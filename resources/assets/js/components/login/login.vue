<template >
    <div class="layout">
        <Layout >
            <Content>
                <Row>
                    <Col span="12" offset="9" >
                        <Card style="width:350px; margin: 120px 0px 0px; " >
                            <div style="text-align: center;" >
                                <img src="svg/ocmlogo.png" style=" height: 100px; " />
                            </div>
                            <div style="text-align:center">
                                <h3 style="font-family: KHMUOL; font-size: 0.8rem; margin: 5px auto; ">ទីស្ដីការគណៈរដ្ឋមន្ត្រី</h3>
                                <h3 style="font-family: KHMUOL; font-size: 0.8rem; margin: 5px auto;  ">អគ្គនាយកដ្ឋានសម្របសម្រួលកិច្ចការទូទៅ</h3>
                                <h3 style="font-family: KHMUOL; font-size: 0.8rem; margin: 5px auto;  ">ប្រព័ន្ធគ្រប់គ្រងឯកសារអេឡិចត្រូនិច</h3>
                            </div>
                            <div style="text-align:left; margin: 20px auto auto; ">
                                <h3 style="font-size: 0.7rem; ">ចូលប្រើប្រព័ន្ធ</h3>
                            </div>
                            <Divider style="margin: 10px auto" /> 
                            <Form ref="formInline" :model="formInline" :rules="ruleInline">
                                <FormItem prop="user">
                                    <Input type="text" v-model="formInline.email" placeholder="អសយដ្ឋានសំបុត្រ">
                                        <Icon type="ios-person-outline" slot="prepend"></Icon>
                                    </Input>
                                </FormItem>
                                <FormItem prop="password">
                                    <Input type="password" v-model="formInline.password" placeholder="ពាក្យសម្ងាត់">
                                        <Icon type="ios-lock-outline" slot="prepend"></Icon>
                                    </Input>
                                </FormItem>
                                <FormItem prop="rememberMe" label="សូមចងចាំខ្ញុំ" >
                                    <Checkbox label="សូមចងចាំខ្ញុំ" v-model="formInline.rememberMe" ></Checkbox>
                                </FormItem>
                                <FormItem>
                                    <Button type="primary" :loading="btnSubmitLoading" icon="ios-log-in" @click="handleSubmit('formInline')" style="width: 50%; float: none; margin: 0px 25%; " >ចូល</Button>
                                </FormItem>
                                <Divider/>
                                <FormItem >
                                    <Col span="10" offset="2" >
                                        <a href="/register" >
                                            <Icon type="ios-people-outline" size="24" /> ចូលជាសមាជិក !
                                        </a>
                                    </Col>
                                    <Col span="10" offset="2" >
                                        <a href="/forgot_password" >
                                            <Icon type="ios-key-outline" size="24" /> ភ្លេចពាក្យសម្ងាត់ ?
                                        </a>
                                    </Col>
                                </FormItem>
                            </Form>
                        </Card>
                    </Col>
                </Row>
            </Content>
            <Footer class="text-center col-md-12" style="color: #666; font-size: 0.7rem; line-height: 50px; " >អភិវឌ្ឍន៍ដោយ ៖ នាយកដ្ឋាន ឯកសារអេឡិចត្រូនិច និង ព័ត៌មានវិទ្យា</Footer>
        </Layout>
    </div>
</template>
<script>
export default {
    name: 'login_page' ,
    data () {
            return {
                user: null ,
                btnSubmitLoading: false ,
                formInline: {
                    email: '',
                    password: '' ,
                    rememberMe: false
                },
                token: null ,
                ruleInline: {
                    email: [
                        { required: true, message: 'សូមបំពេញអសយដ្ឋានសំបុត្រ !', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: 'សូមបំពេញពាក្យសម្ងាត់ !', trigger: 'blur' },
                        { type: 'string', min: 6, message: 'ពាក្យសម្ងាត់យ៉ាងហោចណាស់ ៦ ខ្ទង់ !', trigger: 'blur' }
                    ]
                }
            }
        },
        computed: {
            
        },
        mounted() {
            this.checkTokenString()
        },
        methods: {
            checkTokenString() {
                this.user = JSON.parse( localStorage.getItem( 'user' ) )
                if( this.user !== null ) {
                    window.location= '/search'
                }
            },
            handleSubmit(name) {
                this.$refs[name].validate( (valid) => {
                    if (valid) {
                        this.btnSubmitLoading = true
                        axios({
                            url: `/api/auth/login`,
                            data: {
                                "email" : this.formInline.email ,
                                "password" : this.formInline.password ,
                                "remember_me" : this.formInline.rememberMe
                            },
                            method: 'post'
                        })
                        .then(response => {
                        // Buildup the Data Manager
                            switch( response.status ){
                                case 200:
                                    this.user = response.data.user
                                    localStorage.setItem( 'token' , JSON.stringify ( response.data.token ) )
                                    localStorage.setItem( 'user' , JSON.stringify( this.user ) )
                                    // អានបានជោគជ័យ
                                    this.$Message.success( 'សូមស្វាគមន៍ ' + this.user.lastname + ' ' + this.user.firstname  )
                                    setTimeout(() => {
                                        window.location= '/search'
                                    }, 1200);
                                break;
                                case 201 :
                                    this.$Message.warning( {
                                        content: response.data.message
                                    })
                                break;
                            }
                            this.btnSubmitLoading = false
                        })
                        .catch(error => {
                            this.btnSubmitLoading = false
                            if( error.response ){
                                this.$Message.warning({
                                    content: error.response.data.message ,
                                    duration: 0,
                                    closable: true
                                })
                            }
                        })
                    } else {
                        this.btnSubmitLoading = false
                        this.$Message.error('បរាជ័យ !');
                    }
                })
            }
        }
}
</script>
<style >
    #app {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    .layout {
        height: 100%;
        width: 100%;
    }
    .ivu-layout {
        height: 100%;
    }
    .ivu-layout-footer {
        background: #f5f7f9;
        padding: 12px 50px;
        color: #515a6e;
        font-size: 14px;
        position: absolute;
        bottom: 0px;
        width: 100%;
    }
    .ivu-form-item {
        margin: auto auto 10px auto;
    }
</style>