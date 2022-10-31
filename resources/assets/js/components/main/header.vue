<template >
    <div>
        <Menu mode="horizontal" theme="light" active-name="1">
            <Submenu name="3">
                <template slot="title">
                    <Icon v-if=" user == null " type="md-contact" />
                    <Avatar v-if=" user != null " :src="user.avatar_url" />
                    ចាកចេញ
                </template>
                <MenuItem name="3-1">
                    <Icon v-if=" user == null " type="md-contact" />
                    <Avatar v-if=" user != null " :src="user.avatar_url" />
                    <a href="/profile">ព័ត៌មានគណនី</a>
                </MenuItem>
                <MenuItem name="3-2" @click.native="logout" >
                    <Icon type="md-power" />
                    ចាកចេញ
                </MenuItem>
            </Submenu>
            <!-- <MenuItem name="1">
                <Icon type="md-contract" />
                <Icon type="md-expand" />
                ពេញអេក្រង់
            </MenuItem> -->
        </Menu>
    </div>
</template>
<script>
export default {
    name: 'main_menu' ,
    data() {
        return {
            user: null
        }
    },
    computed: {
        
    },
    mounted() {
        this.user = localStorage.getItem('user') ? JSON.parse( localStorage.getItem('user') ) : null
    },
    methods: {
        logout(){
            localStorage.clear();
            window.location='login'
        }
    },
}
</script>
<style>
    .ivu-layout-header .ivu-menu-item, .ivu-layout-header .ivu-menu-submenu {
        float: right !important;
    }
    .project_logo_h {
        /* padding: 0 !important; */
    }
</style>