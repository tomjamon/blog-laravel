<template>
    <div>
        <h2>Liste des commentaires</h2>
        <hr>
        <div v-if="!chargement" v-for="comment in comments">
            <div class="bg-white shadow-md w-full p-4 my-4">
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
        <div v-if="user" class="bg-white shadow-lg w-full p-4 my-4">
            <h3 class="font-bold text-gray-900">{{ user.name }}</h3>
            <br>
            <small v-if="comment_id" v-on:click="cancelResponse">Annuler répondre</small>
            <br>
            <input placeholder="Votre commentaire" class="bg-gray-200 w-full" v-model="message" type="text">
            <br>
            <button class="bg-blue-100 p-4 m-2 w-full no-border" v-on:click="sendComment">Envoyer mon commentaire</button>
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
                    axios.post('http://blog.test/api/comments/create', {
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
                axios.get('http://blog.test/api/articles/' + this.post_id)
                .then(function (response) {
                    obj.comments = response.data;
                    obj.chargement = false;
                });
            }
        }
    }
</script>
