<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                교과목 목록
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="subject in subjects.data" :key="subject.id">
                        <div>
                            <p @click="showSubject(subject.id)">{{ subject.name }}</p> 학점 : {{ subject.grade }}
                        </div>
                        <br>
                        <show-subject :subject="subject" :showOpen="showOpen" v-on:closeSubject="closeSubject()" v-on:openEditSubject="openEditSubject"/>
                        <edit-subject :editOpen="editOpen" :subject="editSubject" v-on:closeSubject="closeSubject()"/>
                    </div>
                    <input-link v-if="subjects.links" :links="subjects.links" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ShowSubject from './showSubject.vue'
    import EditSubject from './editSubject.vue'
    import InputLink from './inputLink.vue'

    export default defineComponent({
        props : ['subjects'],
        components: {
            AppLayout,
            ShowSubject,
            EditSubject,
            InputLink,

        },
        data() {
            return {
                showOpen : null,
                 editOpen : false,
                editSubject : null,
            }
        },
        methods: {
            showSubject(id) {
                this.showOpen = id;
            },
            closeSubject() {
            this.showOpen = false;
            this.editOpen = false;
            // this.$page.props.flash.message = '';
            },
            openEditSubject(subject) {
                this.editOpen = true;
                this.editSubject = subject;
            }
        },
        // created() {
        //     axios.get('/subjects')
        //     .then(response => {
        //         this.subjects = response.data;
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     })
        // }
    })
</script>
