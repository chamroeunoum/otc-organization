<template >
    <div class="layout" >
        <div class="dashboard-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="1" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                    </Content>
                </Layout>
            </Layout>
        </div>
    </div>
</template>
<script>
export default {
    name: 'dashboard_page' ,
    data() {
        return {
            
        }
    },
    computed: {

    },
    mounted() {
        this.checkTokenString()
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
        }
    }
}
</script>
<style>
    .ivu-layout-header .ivu-menu-item, .ivu-layout-header .ivu-menu-submenu {
        float: right !important;
    }
</style>