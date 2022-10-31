<template>
  <div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="account-list-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="6" ></sidebar>
                </Sider>
                <Layout>
                    <Header>
                    </Header>
                    <Content>
                      របាយការណ៍
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
      /** Variable of the Table */
       
    }
  },
  mounted() {
  
  },
  methods: {

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