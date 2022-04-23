<template>
  <div class="test">
    <h1>{{ name }}</h1>
    <h1>{{ title }}</h1>
  </div>
</template>
<script>
export default {
  setup: () => ({
    title: 'How To Install Vue 3 in Laravel 8 From Scratch'
  }),
  data: () => ({
    name: '123'
  })
}
</script>
<style>
  .test {
    border: 1px solid red;
  }
</style>