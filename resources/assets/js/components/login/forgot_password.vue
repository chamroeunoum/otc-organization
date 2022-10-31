<template >
    <div class="layout">
        <Layout >
            <Content>
                <Row :gutter="32" >
                    <Col span="10" offset="6" >
                            <div style="text-align: center;" >
                                <img src="svg/ocmlogo.png" style=" height: 100px; " />
                            </div>
                            <div style="text-align:center">
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto; ">ទីស្ដីការគណៈរដ្ឋមន្ត្រី</h3>
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto;  ">អគ្គនាយកដ្ឋានសម្របសម្រួលកិច្ចការទូទៅ</h3>
                                <h3 style="font-family: Khmer OS Muol; font-size: 0.8rem; margin: 5px auto;  ">ប្រព័ន្ធគ្រប់គ្រងឯកសារអេឡិចត្រូនិច</h3>
                            </div>
                            <Col span="24" >
                                <div style="text-align:left; margin: 20px auto auto; ">
                                    <h3 style="font-size: 1rem; ">ស្នើរសុំពាក្យសម្ងាត់បណ្ដោះអាសន្ន</h3>
                                </div>
                            </Col>
                            <Col span="24" >
                                <Divider style="margin: 5px auto 20px auto; " />
                            </Col>
                            <!-- Form Confirmation of Email -->
                            <Form v-if="visibleEmail" ref="formInline" :model="formInline" :rules="ruleInline">
                                <Col span="24" >
                                    <FormItem prop="email">
                                        <Input type="email" v-model="formInline.email" placeholder="អសយដ្ឋានសំបុត្រ">
                                            <Icon type="ios-mail-outline" slot="prepend"></Icon>
                                        </Input>
                                    </FormItem>
                                </Col>
                                <Col span="24" >
                                    <Divider style="margin: 5px auto 20px auto; background: #FFF;  " />
                                </Col>
                                <Col span="24" >
                                    <FormItem>
                                        <Button type="primary" :loading="btnSubmitLoading" @click="handleConfirmEmail('formInline')" icon="ios-refresh" style="width: 50%; float: none; margin: 0px 25%; " >ស្នើរសុំកំណត់ពាក្យសម្ងាត់</Button>
                                    </FormItem>
                                </Col>
                            </Form>
                            <!-- END Form Confirmation of Email -->
                            <!-- Form Confirmation Code -->
                            <Form v-if='visibleConfirmationCode' ref="formInline" :model="formInline" :rules="ruleInline">
                                <Col span="24" >
                                    <FormItem prop="confirmation_code">
                                        <Input type="text" v-model="formInline.confirmation_code" placeholder="កូតកំណត់ពាក្យសម្ងាត់ឡើងវិញ">
                                            <Icon type="ios-grid-outline" slot="prepend"></Icon>
                                        </Input>
                                    </FormItem>
                                </Col>
                                <Col span="24" >
                                    <Divider style="margin: 5px auto 20px auto; background: #FFF;  " />
                                </Col>
                                <FormItem>
                                    <Button type="primary" :loading="btnSubmitLoading" @click="handleConfirmCode('formInline')" style="width: 50%; float: none; margin: 0px 25%; " >ចូល</Button>
                                </FormItem>
                            </Form>
                            <!-- END Form Confirmation Code -->
                            <!-- Form Filling Password & Password Confirmation -->
                            <Form v-if='visiblePasswordAndConfirmation' ref="formInline" :model="formInline" :rules="ruleInline">
                                <Col span="24" >
                                    <FormItem prop="password" >
                                        <Input type="password" v-model="formInline.password" placeholder="ពាក្យសម្ងាត់ថ្មី">
                                            <Icon type="ios-key-outline" slot="prepend"></Icon>
                                        </Input>
                                    </FormItem>
                                    <FormItem prop="password_confirmation" >
                                        <Input type="password" v-model="formInline.password_confirmation" placeholder="បញ្ជាក់ពាក្យសម្ងាត់ថ្មី">
                                            <Icon type="ios-key-outline" slot="prepend"></Icon>
                                        </Input>
                                    </FormItem>
                                </Col>
                                <Col span="24" >
                                    <Divider style="margin: 5px auto 20px auto; background: #FFF;  " />
                                </Col>
                                <FormItem>
                                    <Button type="primary" :loading="btnSubmitLoading" @click="handleResetPassword('formInline')" style="width: 50%; float: none; margin: 0px 25%; " >ចូល</Button>
                                </FormItem>
                            </Form>
                            <!-- END Form Filling Password & Password Confirmation -->
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
                visibleEmail : true ,
                visibleConfirmationCode : false ,
                visiblePasswordAndConfirmation : false ,
                formInline: {
                    email: '',
                    confirmation_code : '' ,
                    password: '' ,
                    password_confirmation: '' ,
                },
                token: null ,
                ruleInline: {
                    email: [
                        { required: true, message: 'សូមបំពេញអសយដ្ឋានសំបុត្រ !' }
                    ],
                    confirmation_code: [
                        { required: true, message: 'សូមបំពេញ កូតដែលប្រើដើម្បីកំណត់ពាក្យសម្ងាត់ឡើងវិញ !' }
                    ],
                    password: [
                        { required: true, message: 'សូមបំពេញ ពាក្យសម្ងាត់ថ្មី !' }
                    ],
                    password_confirmation: [
                        { required: true, message: 'សូមបំពេញ ពាក្យសម្ងាត់ថ្មី ដើម្បីបញ្ជាក់  !' }
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
            handleConfirmEmail(name) {
                this.$refs[name].validate( (valid) => {
                    if (valid) {
                        this.btnSubmitLoading = true
                        axios({
                            url: `/api/user/forgot_password`,
                            data: {
                                "email" : this.formInline.email
                            },
                            method: 'put'
                        })
                        .then(response => {
                        // Buildup the Data Manager
                            switch( response.status ){
                                case 200:
                                    this.visibleEmail = false
                                    this.visibleConfirmationCode = true 
                                    let record = response.data.record
                                    this.$Message.success( 'សូមស្វាគមន៍ ' + response.data.message )
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
            },
            handleConfirmCode(name) {
                this.$refs[name].validate( (valid) => {
                    if (valid) {
                        this.btnSubmitLoading = true
                        axios({
                            url: `/api/user/check_confirm_code`,
                            data: {
                                "email" : this.formInline.email ,
                                "code" : this.formInline.confirmation_code
                            },
                            method: 'put'
                        })
                        .then(response => {
                        // Buildup the Data Manager
                            switch( response.status ){
                                case 200:
                                    this.visibleEmail = false
                                    this.visibleConfirmationCode = false
                                    this.visiblePasswordAndConfirmation = true 
                                    let record = response.data.record
                                    this.$Message.success( 'សូមស្វាគមន៍ ' + response.data.message )
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
            },
            handleResetPassword(name) {
                this.$refs[name].validate( (valid) => {
                    if (valid) {
                        this.btnSubmitLoading = true
                        axios({
                            url: `/api/user/passwordreset`,
                            data: {
                                "email" : this.formInline.email ,
                                "code" : this.formInline.confirmation_code ,
                                "password": this.formInline.password
                            },
                            method: 'put'
                        })
                        .then(response => {
                        // Buildup the Data Manager
                            switch( response.status ){
                                case 200:
                                    this.visibleEmail = false
                                    this.visibleConfirmationCode = false
                                    this.visiblePasswordAndConfirmation = true 
                                    let record = response.data.record
                                    this.$Message.success( 'សូមស្វាគមន៍ ' + response.data.message )
                                    this.$Message.info( 'សូមចូលប្រើប្រាស់ គណនីរបស់អ្នកជាមួយ ពាក្យសម្ងាត់ថ្មី របស់អ្នក !' )
                                    setTimeout(() => {
                                        window.location= '/login'
                                    }, 1200);
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
            },
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