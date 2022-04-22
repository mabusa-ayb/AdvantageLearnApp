<template>
    <div class="container">

        <h2 class="mb-3 mt-3">Tennis Match Result</h2>

        <a href="/" class="nav-item nav-link">< Back</a>

        <!--Display Results -->
        <div v-if="result" class="col-6 alert alert-success mt-4">
            <strong>{{ result }}</strong>
        </div>
        <!--\ End Display Results -->

    </div>

</template>

<script>

    export default {
        props: ['result'],
    }
</script>

