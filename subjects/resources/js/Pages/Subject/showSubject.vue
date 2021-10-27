<template>
    <div>
        <jet-dialog-modal :show="showOpen == subject.id">
            <template #title>
                    {{ subject.name }}
            </template>
            <template #content>
                <!-- <label for="">image</label>
                <img :src="'/storage/'+post.image" class="w-full h-80" :alt="post.image"> -->
                <label for="">학점</label><br>
                {{ subject.grade }}<br><br>
                <label for="">과목설명</label><br>
                {{ subject.explanation }}<br><br>
                <label for="">등록일</label><br>
                {{ subject.created_at }}<br><br>
                <label for="">변경일</label><br>
                {{ subject.updated_at }}<br><br>
                <div>

                </div>
            </template>
            <template #footer>
                <!-- <label for="message" class="">comment</label><br>
                <input type="text" v-model="message" id="message" class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1">
                <button @click="createComment()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">submit</button>
                <div v-for="comment in comments" :key="comment.id">
                    {{ comment.user.name }} : {{ comment.content }}
                </div> -->
                <!-- <button>ddd</button> -->
                    <button @click="editSubject(subject)" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded my-3">edit</button>
                    <button @click="deleteSubject()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">delete</button>
                    <button @click="$emit('closeSubject')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">close</button>
                    <div>
                        <button v-if="!check" @click="sugangsin()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">수강신청</button>
                        <button v-if="check" @click="sugangsin()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">수강취소</button>
                        <!-- <button v-if="susu == true" @click="sugangcan()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">수강취소</button> -->
                    </div>

                    <!-- <div v-if="$page.props.flash.message" class="text-red-500">
                        {{ $page.props.flash.message }}
                    </div> -->
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import axios from 'axios'

export default {
    props : ['showOpen', 'subject'],
    components : {
        JetDialogModal,
    },
    data() {
        return {

            // form : this.$inertia.form({
            //     id: ''
            // })
            check : null,

        }
    },
    methods: {

        deleteSubject() {
            axios.delete('/subject/delete/'+this.subject.id)
            .then(response => {
                console.log('success');
                this.$emit('closeSubject');
            })
            .catch(error => {
                console.log(error);
            })
        },
        editSubject(subject) {
            this.$emit('closeSubject');
            this.$emit('openEditSubject', subject);
        },
        sugangsin() {
            console.log('1');
            axios.get('/sugang/'+this.subject.id)
            .then(response => {
                console.log('success');
                this.check = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        // sugangcan() {
        //     axios.post('/sugang/{subId}')
        //     .then(response => {
        //         console.log('success');
        //         this.susu = response.data;
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // }


    },




}
</script>
