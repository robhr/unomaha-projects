<template>
   <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3" v-for="project in projects" :key="project.id">
                <div class="card card-default card-project">
                    <div class="card-header subheading text-primary">
                        <a class="deco-none" :href="'/project/' + project.id">{{ project.title }}</a>
                    </div>

                    <div class="card-body body-1">
                        {{ project.description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                projects: []
            }
        },

        beforeMount: function() {
            this.fetchProjects();
        },

        methods: {
            fetchProjects: function() {
                $.get('/api/projects', null, (projects) => {
                    this.projects = projects;
                });
            }
        },
    }
</script>
