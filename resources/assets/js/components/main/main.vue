<template >
    <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="main-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar></sidebar>
                </Sider>
                <Layout>
                    <Header>
                        <menu-header></menu-header>
                    </Header>
                    <Content>
                        <router-view></router-view>
                    </Content>
                </Layout>
                <Footer>
                    <div style="float: right;" >Power by: VCodeBest</div>
                </Footer>
            </Layout>
        </div>
    </div>
</template>
<script>
export default {
    name: 'main_page',
    data() {
        return {
            
        }
    },
    computed: {
        
    },
    mounted() {
        // this.checkTokenString()
    },
    methods: {
        checkTokenString() {
            /** ពីនិត្យមើលការចូលប្រព័ន្ធតាមរយៈអថេរ token */
            if (localStorage.accessToken != '') {
                /** ការចូលប្រើប្រព័ន្ធបានផុត បញ្ជូនដំណឹងអោយអ្នកប្រើប្រាស់ ចូលម្ដងទៀត ដើម្បីទទួលបាល access_token សម្រាប់ទំនាក់ទំនងជាមួយ ម៉ាស៊ីនមេ */
                this.$Message.warning('រយៈពេលនៃការប្រើប្រព័ន្ធបានផុត ។ សូមចូលប្រព័ន្ធ ម្ថងទៀត !')
            }else {
                this.$Message.warning('សួស្ដី, '+localStorage.user.lastname +' '+localStorage.user.firstname)
            }
        }
    },
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
</style>