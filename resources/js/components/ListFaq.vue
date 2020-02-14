<template>
  <div>
      <h1>Faq</h1>
       <div v-for="faq in faqs" :key="faq.id">
           <h3><a href="#" @click="faq.visible=!faq.visible">{{ faq.question }}</a></h3>
           <p v-show="faq.visible">{{faq.answer }}</p>
        </div>
  </div>
</template>
<script>
  export default {
      data() {
        return {
          faqs: [],
          lang:document.documentElement.lang,
        }
      },
      created() {
      let uri = '/api/faqs';
      this.axios.get(uri).then(response => {
        this.faqs = response.data.map(faq => {faq.visible=false; return faq;});
      }).catch(error => console.log(error));
    },

    methods: {

    }
  }

  </script>