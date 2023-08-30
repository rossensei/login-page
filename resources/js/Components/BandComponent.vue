<template>
   <div class="body">
    <div class="band-card" :class="{ 'band-card--enabled': band.enabled }" @click="openBand">
      <img :src="band.picUrl" alt="Product photo" class="aspect-square w-full object-cover mb-4">

      <h4 class="text-2xl">Band: {{ band?.name }}</h4>
      <div class="text-gray-400">{{ band?.description }}</div>
      <div class="flex justify-between mt-4">
        <div>&nbsp;</div>
        <label :for="'enabled' + '-' + band.id" class="switch">
          <input type="checkbox" :id="'enabled' + '-' + band.id" :checked="band.enabled" @change.prevent="toggleEnabled(band)">
          <span class="slider round"></span>
        </label>
      </div>
    </div>
   </div>
  </template>

  <style scoped>
    /* .body{
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyXdIYLIEi9Y52NfCrePo95tEBekGZykWrfDACk9SQ4PjPru_1WOU2HklKwDBlnnwckLk&usqp=CAU');
    } */
    .item-card {
    background-color: white;
    padding: 1.5rem;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
  }

  .item-card:hover {
    background-color: #f7fafc;
  }

  .item-card--enabled {
    background-color: #edf2f7;
  }

  .item-card img {
    width: 100%;
    aspect-ratio: 1/1;
    object-fit: cover;
    margin-bottom: 1rem;
  }

  .item-card h4 {
    font-size: 1.5rem;
  }

  .item-card .text-gray-400 {
    color: #718096;
  }

  .switch {
    position: relative;
    display: inline-block;
    width: 44px;
    height: 24px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 34px;
    transition: 0.4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    border-radius: 50%;
    transition: 0.4s;
  }

  input:checked + .slider {
    background-color: #2196f3;
  }

  input:checked + .slider:before {
    transform: translateX(20px);
  }

  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
  </style>

  <script setup>
  import { defineProps } from 'vue';
  import { router } from '@inertiajs/vue3';

  const prop = defineProps({
    band: Object
  });

  function openBand() {
    router.visit('/bands/' + prop.band.id);
  }

  function toggleEnabled(band) {
    band.enabled = !band.enabled; // Toggle the enabled state locally
    router.visit('/bands/toggle/' + band.id, {
      method: 'post',
      preserveScroll: true
    });
  }
  </script>
