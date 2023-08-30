<template>
    <Head :title="`View Band | ${band.name}`"></Head>

    <AppLayout>
      <template #header>
        <div class="flex justify-between">
          <h2>View Band | {{ band.name }}</h2>
          <div>
            <Link
              href="/bands"
              class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded"
            >
              Back
            </Link>
          </div>
        </div>
      </template>

      <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow rounded py-6 flex">
          <div class="aspect-square w-[40%]">
            <img :src="band.picUrl" alt="Product photo" class="object-cover">
          </div>
          <div class="pl-6 w-full flex flex-col">
            <h4 class="text-3xl mb-6">{{ band.name }}</h4>
            <div v-if="$page.props.auth.user.roles.includes('admin')" class="flex justify-end mt-4">
                <Link
                    :href="'/bands/edit/' + band.id"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700"
            >
                Edit
            </Link>
            </div>
                &nbsp;

            <div class="p-4 bg-gray-100 flex-1">
              {{ band.description }}
            </div>

            <div class="flex justify-between items-center mt-4">
              <div>
                {{ band.date }} bands available.
              </div>
              <h4 class="text-4xl text-blue-500">
                Where: {{ band.address }}
              </h4>
            </div>
            <div v-if="$page.props.auth.user.roles.includes('admin')" class="flex justify-end mt-4">
              <Link
                :href="`/bands/` + band.id"
                method="delete"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
              >
                Delete
              </Link>
            </div>
          </div>
        </div>
      </div>
      <div class="py-12">
            <div class="flex justify-center items-center">
                <!-- <MailCard :subject="form.subject" :message="form.message"  /> -->
                <div class="p-4 rounded-lg bg-white shadow-sm w-1/2">
                    <h1 class="text-2xl text-center mb-10">Send a message to all clients</h1>
                    <form @submit.prevent="submit">
                        <div class="flex items-start space-x-2 mb-4">
                            <label for="subject">Subject&nbsp;&nbsp;</label>
                            <input type="text" id="subject" class="px-2 py-1 w-full rounded-md">
                        </div>
                        <div class="flex items-start space-x-2 mb-4">
                            <label for="message">Message</label>
                            <textarea type="text" id="message" class="px-2 py-1 h-[120px] w-full rounded-md"></textarea>
                        </div>

                        <div v-if="$page.props.auth.user.roles.includes('admin')" class="flex justify-end">
                            <Link :href="'/bands/email/' + band.id" class="flex items-center space-x-2 px-2 py-1 bg-gray-100 hover:bg-gray-400 rounded-md">
                        <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 493.497 493.497" xml:space="preserve">
                        <path d="M444.556,85.218H48.942C21.954,85.218,0,107.171,0,134.16v225.177c0,26.988,21.954,48.942,48.942,48.942h395.613
                            c26.988,0,48.941-21.954,48.941-48.942V134.16C493.497,107.171,471.544,85.218,444.556,85.218z M460.87,134.16v225.177
                            c0,2.574-0.725,4.924-1.793,7.09L343.74,251.081l117.097-117.097C460.837,134.049,460.87,134.096,460.87,134.16z M32.628,359.336
                            V134.16c0-0.064,0.033-0.11,0.033-0.175l117.097,117.097L34.413,366.426C33.353,364.26,32.628,361.911,32.628,359.336z
                            M251.784,296.902c-2.692,2.691-7.378,2.691-10.07,0L62.667,117.846h368.172L251.784,296.902z M172.827,274.152l45.818,45.819
                            c7.512,7.511,17.493,11.645,28.104,11.645c10.61,0,20.592-4.134,28.104-11.645l45.82-45.819l101.49,101.499H71.327L172.827,274.152z
                            "/>
                        </svg>
                        <span>Send Email</span>
                    </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
  </template>

  <script setup>
  import { defineProps } from 'vue'
  import { Link, Head } from '@inertiajs/vue3'
  import AppLayout from '@/Layouts/AppLayout.vue'
  import { usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

  const page = usePage()

  const user = computed(() => page.props.auth.user)

  const props = defineProps({
    band: Object,

  })


  </script>
