<template>
   <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <v-btn href="/" slot="activator" color="default" class="mb-2 deco-none">GO BACK</v-btn>
            </div>
            <div class="col-md-12 mb-3">
                <customer-list-component :id="id"></customer-list-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'id'
        ],

        data: function() {
            return {
                project: {}
            }
        },

        beforeMount: function() {
            this.fetchProject();
        },

        methods: {
            fetchProject: function() {
                $.get('/api/project/' + this.id, null, (project) => {
                    this.project = project;
                });
            }
        },
    }
</script>
