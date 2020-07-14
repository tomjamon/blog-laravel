<template>
    <div class="w-full">
        <div v-if="!chargement" v-for="comment in comments">
            <div class="bg-white shadow w-full p-4 my-4">
                <h3 class="font-bold text-gray-900">{{ comment.author }}</h3>
                <br>
                <p class="text-gray-600 text-sm">
                    {{ comment.content }}
                </p>
                <span class="underline text-gray-600 text-sm" v-on:click="responseComment(comment.id)">Répondre à ce commentaire</span>
            </div>
            <div v-for="subComment in comment.comments">
                <div class="ml-8 bg-white shadow-md w-full p-4 my-4">
                    <h3 class="font-bold text-gray-900">{{ subComment.author }}</h3>
                    <br>
                    <p class="text-gray-600 text-sm">
                        {{ subComment.content }}
                    </p>
                </div>
            </div>
        </div>
        <div v-if="chargement">
            Chargement ...
        </div>
        <hr>
        <div v-if="user && user.email" class="bg-white shadow-lg w-full p-4 my-4">
            <span class="text-3xl font-bold hover:text-gray-700 pb-4">Ajoutre un commentaire</span>
            <h3 class="font-bold text-gray-900">{{ user.name }}</h3>
            <span class="text-xm" v-if="comment_id" v-on:click="cancelResponse">Annuler répondre</span>
            <textarea placeholder="Votre commentaire" class="h-32 bg-gray-100 w-full" v-model="message"></textarea>
            <button class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4" v-on:click="sendComment">Envoyer mon commentaire</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                chargement: true,
                message: null,
                comment_id: null,
                user: [],
                comments: []
            }
        },
        props: ['post_id'],
        mounted() {
            axios.get('/api/user')
            .then(response => {
                this.user = response.data;
            });
            this.getPost();
        },
        methods: {
            cancelResponse() {
                this.comment_id = null;
            },
            responseComment(commentId) {
                this.comment_id = commentId;
            },
            sendComment() {
                if (this.message !== '') {
                    this.chargement = true;
                    let obj = this;
                    axios.post('/api/comments/create', {
                        message: this.message,
                        post_id: this.post_id,
                        comment_id: this.comment_id,
                    })
                    .then(function (response) {
                        obj.getPost();
                    })
                }
            },
            getPost() {
                let obj = this;
                axios.get('/api/articles/' + this.post_id)
                .then(function (response) {
                    obj.comments = response.data;
                    obj.chargement = false;
                });
            }
        }
    }
</script>
