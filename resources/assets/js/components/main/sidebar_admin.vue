<template >
    <div >
        <div class='project_logo_h' >
            <Tooltip content="ប្រព័ន្ធឯកសារអេឡិចត្រូនិច" placement="right" >
                <img src="/svg/ocmlogo.png" class="project_logo" />
            </Tooltip>
        </div>
        <!-- Admin Menu -->
        <Menu v-if=" true " theme="light" :active-name="activeMenu" style="width: 60px; ">
            <MenuItem name="1" >
                <Tooltip content="ព័ត៌មានសង្ខេប" placement="right" >
                    <a href="/dashboard" >
                        <Icon type="md-speedometer" />
                    </a>
                </Tooltip>    
            </MenuItem>
            <MenuItem name="2" >
                <Tooltip content="គណនីផ្ទាល់ខ្លួន" placement="right" >
                    <a href="/profile" >
                        <Icon type="md-contact" />
                    </a>
                </Tooltip>    
            </MenuItem>
            
            <MenuItem name="3" >
                <Tooltip content="កម្រងឯកសាររក្សាទុក" placement="right" >
                    <a href="/folder" >
                        <Icon type="md-folder" />
                    </a>
                </Tooltip>
            </MenuItem>
            <MenuItem name="4" >
                <Tooltip content="ស្វែងរកឯកសារគតិយុត្ត" placement="right" >
                    <a href="/search" >
                        <Icon type="md-search" />
                    </a>
                </Tooltip>
            </MenuItem>
            <MenuItem name="5" >
                <Tooltip content="ឯកសារគតិយុត្តតាមក្រសួង" placement="right" >
                    <a href="/document/byministry" >
                        <Icon type="ios-git-network" />
                    </a>
                </Tooltip>
            </MenuItem>
            <MenuItem name="6" >
                <Submenu name="6-1">
                    <template slot="title">
                        <Icon type="md-cog" />
                    </template>
                    <MenuItem name="6-1-1">
                        <Tooltip content="គណនីអ្នកប្រើប្រាស់" placement="right" >
                            <a href="/account" >
                                <Icon type="ios-contacts-outline" />
                            </a>
                        </Tooltip>
                    </MenuItem>
                    <MenuItem name="6-1-2">
                        <Tooltip content="ឯកសារគតិយុត្ត" placement="right" >
                            <a href="/document" >
                                <Icon type="md-document" />
                            </a>
                        </Tooltip>
                    </MenuItem>
                    <MenuItem name="6-1-3">
                        <Tooltip content="របាយការណ៍" placement="right" >
                            <a href="/report" >
                                <Icon type="md-clipboard" />
                            </a>
                        </Tooltip>
                    </MenuItem>
                </Submenu>
            </MenuItem>
            <MenuItem name="7" >
                <Tooltip content="អំពីយើងខ្ញុំ" placement="right" >
                    <a href="/about" >
                        <Icon type="md-information-circle" />
                    </a>
                </Tooltip>
            </MenuItem>
            <MenuItem name="8" @click.native="logout" >
                <Tooltip content="ចាកចេញពីប្រព័ន្ធ" placement="right" >
                    <a @click.native="logout" >
                        <Icon type="md-power" />
                    </a>
                </Tooltip>
            </MenuItem>
        </Menu>        
    </div>
</template>
<script>
export default {
    name: 'sidebar' ,
    props: [
        'active'
    ],
    data() {
        return {
            user: null ,
            role: false ,
            show: false ,
            activeMenu: this.active
        }
    },
    computed: {
    },
    mounted() {
        this.user = localStorage.getItem( 'user' ) ? JSON.parse( localStorage.getItem( 'user' ) ) : null
        if( this.user != null ){
            this.role = this.user.role ? true : false
        }
    },
    methods: {
        logout(){
            this.$Modal.confirm({
                title: "ចេញពីប្រព័ន្ធ" ,
                content: "តើអ្នកពិតជាចង់ចេញពីប្រព័ន្ធមែនទេ ?" ,
                okText: 'បាទ / ចាស់' ,
                cancelText: 'ទេ' ,
                onOk: () => {
                    localStorage.clear()
                    window.location='login'
                }
            })
        }
    },
}
</script>
<style >
    .ivu-layout-sider {
        transition: all .2s ease-in-out;
        position: relative;
        background: #515a6e;
        min-width: 60px !important;
        width: 60px !important;
        max-width: 60px !important;
    }
    .ivu-layout-sider {
        background: #FFF;
    }
    div.project_logo_h {
        width: 100%;
        height: 60px;
        padding: 11px 10px ;
    }
    .project_logo {
        display: inline-block;
        width: 100%;
    }
    div.project_title {
        display: inline-block;
        height: 50px;
        line-height: 40px;
        text-align: center;
        font-size: 1.2rem;
    }    
    .ivu-menu-vertical li.ivu-menu-item {
        padding: 0px;
        height: 40px;
        display: block;
        line-height: 40px;
        text-align: center;
    }
    .ivu-menu-vertical li.ivu-menu-item .ivu-menu-submenu-title {
        padding: 0px;
        height: 40px;
        display: block;
        line-height: 40px;
        text-align: center;
        
    }
    .ivu-menu-vertical li.ivu-menu-item .ivu-menu-submenu-title>i {
        margin: 0px;
    }
    .ivu-menu-vertical li.ivu-menu-item ul li {
        background: #FFF;
    }
    .ivu-menu-submenu-title-icon {
        display: none;
    }
    .ivu-menu-vertical li a {
        color: #333;
        height: 40px;
        display: block;
        line-height: 40px;
    }
    .ivu-menu-vertical li.ivu-menu-item .ivu-tooltip {
        width: 100%;
    }
    .ivu-layout-footer {
        padding: 0px !important;
        background: #FFF !important;
        height: 50px;
    }
    .ivu-drawer-body {
        padding: 0px !important;
    }
    .ivu-layout-sider-children {
        border-right: 1px solid #CCC; 
    }
    .ivu-menu-submenu .ivu-menu {
        margin-left: 59px;
        width: 60px;
        margin-top: -40px;
        border: solid 1px #DDD;
        border-radius: 0px 2px 2px 2px;
    }
    .ivu-menu-vertical .ivu-menu-submenu .ivu-menu-item {
        padding: 0px !important;
    }
</style>