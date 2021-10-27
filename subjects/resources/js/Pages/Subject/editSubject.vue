<template>
    <div>
        <jet-dialog-modal :show="editOpen" >

            <template #title>
                <div>
                    edit subject
                </div>
            </template>
            <template #content >
                <label for="">과목명</label>
                    <input type="text" id="" :placeholder="subject.name" v-model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1" >
                    <label for="">학점</label>
                    <input type="text" id="" :placeholder="subject.grade" v-model="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1" >
                    <label for="">과목 설명 입력</label>
                    <input type="text" id="" :placeholder="subject.explanation" v-model="explanation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-1">
            </template>
            <template #footer>
                <div>
                    <!-- <button @click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">create</button> -->
                    <button @click.prevent="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">edit</button>
                    <button @click="$emit('closeSubject')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">close</button>
                </div>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
export default {
    props : ['editOpen', 'subject'],
    components : {
        JetDialogModal,
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

            // if (this.$refs.image) {
            //     this.form.image = this.$refs.image.files[0]
            //     console.log(this.$refs.image.files[0]);
            // }
            // this.form.post('/post/update/'+this.post.id, {
            //     _method: 'patch',
            //     image : this.form.image,
            //     onSuccess: () => {this.$emit('closePost'); this.form.caption = ''; this.form.image = ''; this.imagePreview = null;}
            // })
            axios.post('/subject/update/'+this.subject.id, {
                name : this.name,
                grade : this.grade,
                explanation : this.explanation,
            })
            .then(response => {
                console.log('submit');

                this.name = '';
                this.grade = null;
                this.explanation = '';
                this.$emit('closeSubject');
            })
            .catch(error => {
                console.log(error);
            })
        },

        // openEditModal() {
        //     if(this.editOpen){
        //         this.form.get('/post/edit/'+this.postId, {
        //         onSuccess: () => {console.log('success');}
        //         });
        //     }

        // }
    },


}
</script>
