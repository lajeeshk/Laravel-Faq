<template>
  <div>
    <h1>Create A Faq</h1>
    <form @submit.prevent="addFaq">
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
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          faq:{},
          lang:document.documentElement.lang,
        }
    },
    methods: {
      addFaq(){
        console.log(this.faq);
        let uri = '/api/faq/create';
        this.axios.post(uri, this.faq).then((response) => {
        window.location.href = `/${this.lang}/admin/faq`;;
    }).catch(error => console.log(error.response));
      }
    }
  }
</script>