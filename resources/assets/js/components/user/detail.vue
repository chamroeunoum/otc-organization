<template>
    <div>
        
    </div>
</template>
<script>
export default {
    data() {
        return {
            visible: false,
            styles: {
                height: 'calc(100% - 55px)',
                overflow: 'auto',
                paddingBottom: '53px',
                position: 'static'
            },
            formData: {
                name: '',
                url: '',
                owner: '',
                type: '',
                approver: '',
                date: '',
                desc: ''
            },
        }
    },
    computed: {
        
    },
    mounted() {
        this.$Message.info( "Detail page : " + this.visible )
    },
    methods: {
        
    },
}
</script>
