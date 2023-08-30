<template>
    <div class="container">
      <h1 class="title">Create Band</h1>

      <div class="header">
        <h2>Create Band</h2>
        <div>
          <a href="/bands" class="button">Back</a>
        </div>
      </div>

      <div class="form-container">
        <form @submit.prevent="submit" class="form">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" v-model="form.name" class="input" />
            <div class="error" v-if="form.errors.name">{{ form.errors.name }}</div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" v-model="form.description" class="textarea"></textarea>
            <div class="error" v-if="form.errors.description">{{ form.errors.description }}</div>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" step="0.01" id="address" v-model="form.address" class="input" />
            <div class="error" v-if="form.errors.address">{{ form.errors.address }}</div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" step="0.01" id="email" v-model="form.email" class="input" />
            <div class="error" v-if="form.errors.email">{{ form.errors.email }}</div>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" v-model="form.date" class="input" />
            <div class="error" v-if="form.errors.date">{{ form.errors.date }}</div>
          </div>
          <div class="form-group">
            <label for="pic">Product Picture</label>
            <input type="file" @input="form.pic = $event.target.files[0]" class="input" accept="image/jpeg" />
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
              {{ form.progress.percentage }}%
            </progress>
          </div>
          <button class="button">Create Band</button>
        </form>
      </div>
    </div>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/vue3';

  const form = useForm({
    name: null,
    description: null,
    address: null,
    date: null,
    pic: null,
    email: '',
  });

  function submit() {
    form.post('/bands');
  }
  </script>

  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
  }

  .title {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .form-container {
    padding: 20px;
    background-color: #f0f0f0;
    border-radius: 8px;
  }

  .form {
    display: flex;
    flex-direction: column;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    margin-bottom: 8px;
  }

  .input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
  }

  .textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    height: 100px;
  }

  .error {
    color: red;
    margin-top: 4px;
  }

  .button {
    padding: 10px 20px;
    background-color: #3490dc;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .progress {
    margin-top: 8px;
  }
  </style>
