<template>
  <div>
      <h1>Faq</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <a :href="`/${lang}/admin/faq/create`" class="btn btn-primary">Create Faq</a>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="faq in faqs" :key="faq.id">
                    <!-- let url = "/admin/task/edit'+post.id"; -->
                    <td>{{ faq.id }}</td>
                    <td>{{ faq.question }}</td>
                    <td>{{ faq.answer }}</td>
                    <td v-if="faq.published">Published</td>
                    <td v-else>UnPublished</td>
                    <td><a :href= "`/${lang}/admin/faq/${faq.id}/edit`" class="btn btn-primary">Edit</a> <button class="btn btn-danger" @click.prevent="deleteFaq(faq.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          faqs: [],
          lang:document.documentElement.lang,
          user:[]
        }
      },
      created() {
      let uri = '/api/faqs';
      this.axios.get(uri).then(response => {
        this.faqs = response.data;
        console.log(response.data);
      }).catch(error => console.log(error));
    },
    methods: {
      deleteFaq(id)
      {
        let uri = `/api/faq/${id}/delete/`;
        this.axios.delete(uri).then(response => {
          console.log(this.faqs);
          console.log(id);
            console.log(this.faqs.indexOf(id));
          this.faqs.splice(this.faqs.indexOf(id), 1);
        }).catch(error => console.log(error));;
      }
    }
  }
</script>