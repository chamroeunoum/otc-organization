<template>
<div class="layout" >
        <!-- ទំព័រសំខាន់បន្ទាប់ពីបានចូលប្រព័ន្ធបានជោគជ័យ -->
        <div class="main-page" >
            <Layout >
                <Sider hide-trigger>
                    <sidebar active="9" ></sidebar>
                </Sider>
                <Layout>
                    <Header></Header>
                    <Content>
                      <div class="row" style='margin: 10px auto auto; text-align: center; color: #000; '>
                        <div class="col-md-6" style="display: inline-block; float: none;" >
                          <div class="box-header" style='height: auto;'>
                              <div class="box-title" style='width: 100%; '>
                                <div class="logo"><img src="svg/ocmlogo.png" alt="Logo" style="width: 100px;"></div>
                                <div class="logo_title" style="font-family: KHMUOL; margin: 10px auto; " >ទីស្ដីការគណៈរដ្ឋមន្ត្រី</div>
                                <div class="logo_title" style="font-family: 'Khmer OS Muol Light','KHMUOL', arial; font-size: 15px;" >អគ្គនាយកដ្ឋានសម្របសម្រួលកិច្ចការទូទៅ</div>
                                <div class="logo_title" style="font-family: 'Khmer OS Muol Light','KHMUOL', arial; font-size: 15px;" >នាយកដ្ឋានឯកសារអេឡិចត្រូនិច</div>
                                <span class="hts" >6</span>
                              </div>
                          </div>

 ​​                         <span class="label label-default" style="text-decoration: underline; font-size: 1rem;" >ព័ត៌មានទំនាកទំនង</span>
                          <br/><br/>                          
                          <!-- Electricity has cut off -->
                          <br/><br/><br/><br/>
                          <span class="label label-default" style="font-family: Khmer OS Muol;  font-size: 1rem;" >០៧ មករា ២០១៦</span>

                        </div>
                      </div>

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
      
    }
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
<style type="text/css" >
  .ivu-layout-content {
    padding: auto auto 100px auto;
  }
  .photo_preview img {
    display: block;
    width: 100%;
    height: 100%;
  }
  .ivu-layout-content {
    background: #FFF;
  }

    .tactieng-6 {
      font-size: 5em; color: #000;
    }
    /*.navbar-nav li a {
      display: none;
    }*/

    .logo_title {
        color: #000 !important;
        
      }
    
    .label-default {
      background: #FAFAFA;
      font-size: 1.5rem;
      font-weight: plain;
    }

    @media (max-width: 1140px){
      .logo {
        text-align: center;
        width: 100%;
        height: 60px;
        position: relative;
        text-align: center;
      }
      .logo img {
        margin: 5px auto;
      }
      .logo_title {
        text-align: center;
        line-height: 20px;
        font-size: 0.7em;
        font-family: 'Khmer OS Muol Light','KHMUOL', arial;
        /*color: #fbd140;*/
        color: #000 !important;
        display: block;
        padding: 5px 0px 5px;
        margin: auto auto 0px auto;
      }
      .content .col-xs-12 {
        font-size: 0.8em;
      }
      .tactieng-6 {
        margin: auto auto 0px auto;
        font-size: 4em ;
      }
      
    }
    
</style>