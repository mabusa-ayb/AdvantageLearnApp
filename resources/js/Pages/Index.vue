<template>
    <div class="container">

        <h2 class="mb-3 mt-3">Tennis Match Scores</h2>

        <div v-if="result" class="col-6 alert alert-success mt-4">
            Match Results: {{ result }}
        </div>

        <div v-if="Object.keys(errors).length > 0" class="alert alert-danger mt-4">
            Please Input proper scores.
        </div>

        <form action="/score" method="POST" @submit.prevent="scoreMatch">
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" id="playerOne" placeholder="Player One Score" v-model="form.playerOne">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="playerTwo" placeholder="Player Two Score" v-model="form.playerTwo">
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>

</template>

<script>

    export default {
        props: ['result', 'errors'],

        data() {
            return {
                form: {
                    playerOne: '',
                    playerTwo: '',
                }
            }
        },

        methods: {
            scoreMatch() {
                this.$inertia.post('/score', this.form)
            }
        }
    }
</script>

