<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="title text-primary">Purchase History</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody v-for="purchase in purchases" :key="purchase.id">
                        <tr>
                            <th scope="row">{{ purchase.id }}</th>
                            <td>{{ purchase.project.title }}</td>
                            <td>{{ purchase.amount }}</td>
                            <td>{{ purchase.created_at | moment("MMMM Do, YYYY") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'id'
        ],

        data: function () {
            return {
                purchases: {}
            }
        },

        beforeMount: function () {
            this.fetchPurchases();
        },

        methods: {
            fetchPurchases: function () {
                $.get('/api/customer/' + this.id + '/report', null, (purchases) => {
                    this.purchases = purchases.sort((a, b) => a.created_at < b.created_at);
                });
            }
        },
    }
</script>