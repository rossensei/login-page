<template>
    <AppLayout title="Edit Bands">
      <template #header>
        <div class="flex">
          <h2 class="flex-1 font-semibold text-xl gray-200 leading-tight">
            Edit Bands
          </h2>
          <Link
            class="bg-blue-500 hover:bg-yellow-200 text-white font-semibold hover:text-white py-3 px-4 border border-gray-500 hover:border-transparent rounded mb-3"
            as="button"
            :href="'/bands/' + band.id"
          >
            Back
          </Link>
        </div>
      </template>

      <div class="container py-3 bg-gray-500">
        <div class="max-w-lg mx-auto">
          <div class="form-container">
            <form @submit.prevent="submit" class="form">
              <h3 class="title">Band Info</h3>

              <div class="form-group">
                <label for="name">Band Name</label>
                <input
                  type="text"
                  id="name"
                  v-model="form.name"
                  class="input rounded-lg"
                />
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <input
                  type="text"
                  id="description"
                  v-model="form.description"
                  class="px-2 py-1 h-[120px] w-full rounded-md"
                />
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <input
                  type="text"
                  id="address"
                  v-model="form.address"
                  class="input rounded-lg"
                />
              </div>

              <div class="form-group">
                <label for="date">Date</label>
                <input
                  type="date"
                  id="date"
                  v-model="form.date"
                  class="input rounded-lg"
                />
              </div>

              <div class="mt-auto flex justify-end">
                <button
                  class="button"
                  type="submit"
                >
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>

<script setup>
import AppLayout from  '@/Layouts/AppLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

const props = defineProps({
    band:Object
})

const form = useForm({
    name: props.band.name,
    description: props.band.description,
    address: props.band.address,
    date: props.band.date,
})

function submit(){
    form.patch('/bands/' + props.band.id)}
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
    .textarea{
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 10px;
        width: 100%;
        resize: vertical;
        overflow-y: auto;
        overflow-x: auto;
    }

    .button {
      padding: 10px 20px;
      background-color: #3490dc;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
