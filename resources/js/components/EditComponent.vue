<template>
  <div>
    <h1>Update Faq</h1>
    <form @submit.prevent="updateFaq">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Question:</label>
            <input type="text" class="form-control" v-model="faq.question">
          </div>
        </div>
        </div>
       <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Answer:</label>
              <textarea class="form-control" v-model="faq.answer" rows="5"></textarea>
            </div>
          </div>
        </div>        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Publish:</label>
              <select class="form-control" v-model="faq.published">
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
              </select>
            </div>
          </div>
        </div>
<br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        props:['faqid'],
        data(){
        return {
          faq:{},
          // props:['faqid'],
          lang:document.documentElement.lang,
        }
    },
    created() {
      console.log(this.faqid);
      let uri = `/api/faq/${this.faqid}/edit`;
      this.axios.get(uri).then((response) => {
          this.faq = response.data;
          this.faq.published ? this.faq.published =1 :this.faq.published =0
      });
      },
    methods: {
      updateFaq(){
        console.log(this.faq);
        let uri = `/api/faq/${this.faqid}/update`;
        this.axios.post(uri, this.faq).then((response) => {
        window.location = `/${this.lang}/admin/faq`;;

    }).catch(error => console.log(error));
      }
    }
  }
</script>