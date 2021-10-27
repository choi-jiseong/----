<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                교과목 등록 메뉴
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <label for="">과목명</label>
                    <input type="text" id="" v-model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1" >
                    <label for="">학점</label>
                    <input type="text" id="" v-model="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1" >
                    <label for="">과목 설명 입력</label>
                    <input type="text" id="" v-model="explanation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1">
                     <button @click="submit()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">create</button>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,

        },
        data() {
            return {
                name : '',
                grade : null,
                explanation : '',
            }
        },
        methods: {
            submit() {
                axios.post('/subject/create', {
                    name : this.name,
                    grade : this.grade,
                    explanation : this.explanation,
                })
                .then(response => {
                    console.log('submit');
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
    })
</script>
