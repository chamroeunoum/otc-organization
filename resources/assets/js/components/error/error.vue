<template >
    <div class="layout">
        <Layout >
            <Content>
                <router-view/>
            </Content>
            <Footer>
                <div class="col-md-12 text-center" >Power by: VCodeBest</div>
            </Footer>
        </Layout>
    </div>
</template>
<script>
export default {
    name: 'login_page'
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