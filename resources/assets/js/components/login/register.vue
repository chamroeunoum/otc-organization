<template >
    <div class="layout">
        <Layout >
            <Content >
                <Row :gutter="32" >
                    <Col span="12" offset="6" >
                        <Card style="width:100%; margin: 120px 0px 0px; " >
                            <div style="text-align: center;" >
                                <img src="svg/ocmlogo.png" style=" height: 100px; " />
                            </div>
                            <div style="text-align:center">
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto; ">ទីស្ដីការគណៈរដ្ឋមន្ត្រី</h3>
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto;  ">អគ្គនាយកដ្ឋានសម្របសម្រួលកិច្ចការទូទៅ</h3>
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto;  ">ប្រព័ន្ធគ្រប់គ្រងឯកសារអេឡិចត្រូនិច</h3>
                            </div>
                            <div style="text-align:left; margin: 20px auto auto; ">
                                <h3 style="font-size: 0.7rem; ">ចូលជាសមាជិក</h3>
                            </div>
                            <Row >
                                <Divider style="margin: 20px auto" /> 
                            </Row>
                            <Form ref="formInline" :model="formInline" :rules="ruleInline">
                                <Row :gutter="16" >
                                    <Col span="12" >
                                        <FormItem prop="lastname">
                                            <Input type="text" v-model="formInline.lastname" placeholder="ត្រកូល">
                                                <Icon type="ios-person-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                    <Col span="12" >
                                        <FormItem prop="firstname">
                                            <Input type="text" v-model="formInline.firstname" placeholder="ឈ្មោះ">
                                                <Icon type="ios-person-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                </Row>
                                <Row :gutter="16" >
                                    <Col span="12" >
                                        <FormItem prop="phone">
                                            <Input type="text" v-model="formInline.phone" placeholder="លេខទូរសព័្ទ">
                                                <Icon type="ios-call-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                    <Col span="12" >
                                        <FormItem prop="email">
                                            <Input type="text" v-model="formInline.email" placeholder="អ៊ីមែល">
                                                <Icon type="ios-mail-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                </Row>
                                <Row :gutter="16" >
                                    <Col span="12" >
                                        <FormItem prop="password">
                                            <Input type="password" v-model="formInline.password" placeholder="ពាក្យសម្ងាត់">
                                                <Icon type="ios-key-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                    <Col span="12" >
                                        <FormItem prop="password_confirmation">
                                            <Input type="password" v-model="formInline.password_confirmation" placeholder="បញ្ជាក់ពាក្យសម្ងាត់">
                                                <Icon type="ios-key-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                </Row>
                                <Row :gutter="16" >
                                    <Col span="12" >
                                        <FormItem prop="unit">
                                            <Input type="text" v-model="formInline.unit" placeholder="អង្គភាព">
                                                <Icon type="ios-cube-outline" slot="prepend"></Icon>
                                            </Input>
                                        </FormItem>
                                    </Col>
                                </Row>
                                <Row >
                                <Divider style="margin: 20px auto" /> 
                                </Row>
                                <Row :gutter="16" >
                                    <Col span="10" >
                                        <Button type="default" @click="backToLogin" style="width: 100%; float: none; margin: 0px 25%; " icon="ios-log-in" >ចូលប្រើប្រព័ន្ធ</Button>
                                    </Col>
                                    <Col span="10" >
                                        <Button type="primary" :loading="btnSubmitLoading" @click="handleSubmit('formInline')" icon="ios-people-outline" style="width: 100%; float: none; margin: 0px 25%; " >ចូលជាសមាជិក</Button>
                                    </Col>
                                </Row>
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
                    firstname: '' ,
                    lastname: '' ,
                    phone: '',
                    email: '',
                    unit : '' ,
                    password: '',
                    password_comfirmation: '',
                },
                token: null ,
                ruleInline: {
                    email: [
                        { required: true, message: 'សូមបំពេញអសយដ្ឋានសំបុត្រ !', trigger: 'blur' },
                        { type: 'email' , message: 'ទម្រង់នៃ អ៊ីមែល មិនត្រឹមត្រូវ !' }
                    ],
                    firstname: [
                        { required: true, message: 'សូមបំពេញឈ្មោះរបស់អ្នក !' }
                    ],
                    lastname: [
                        { required: true, message: 'សូមបំពេញត្រកូលរបស់អ្នក !' }
                    ],
                    unit: [
                        { required: true, message: 'សូមបំពេញឈ្មោះអង្គភាពដែលអ្នកស្ថិតនៅ !' }
                    ],
                    phone: [
                        { required: true, message: 'សូមបំពេញលេខទូរស័ព្ទរបស់អ្នក !' }
                    ],
                    password: [
                        { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់សម្រាប់ប្រើចូលប្រព័ន្ធ !' }
                    ],
                    password_comfirmation: [
                        { required: true, message: 'សូមបញ្ចូលពាក្យសម្ងាត់សម្រាប់ប្រើចូលប្រព័ន្ធ ម្ដងទៀត !' }
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
                    window.location= '/dashboard'
                }
            },
            backToLogin(){
                window.location= '/login'
            },
            handleSubmit(name) {
                this.$refs[name].validate( (valid) => {
                    if (valid) {
                        this.btnSubmitLoading = true
                        axios({
                            url: `/api/auth/signup`,
                            data: this.formInline ,
                            method: 'post'
                        })
                        .then(response => {
                            if( response.status == 200 ){
                                // អានបានជោគជ័យ
                                this.$Message.success( response.data.message )
                                setTimeout(() => {
                                    window.location= '/login'
                                }, 600);
                            }
                            this.btnSubmitLoading = false
                        })
                        .catch(error => {
                            this.btnSubmitLoading = false
                            if( error.response ){
                                if( error.response.data.errors.hasOwnProperty('email') ){
                                    this.$Message.warning({
                                        content: "អ៊ីមែលនេះមានរួចហើយ !"
                                    })
                                }
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
    .ivu-form-item-error-tip {
        position: relative;
    }
</style>