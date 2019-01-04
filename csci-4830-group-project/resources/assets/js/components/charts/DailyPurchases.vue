<script>
    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,

        data: function () {
            return {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
                purchases: []
            }
        },

        beforeMount: function() {
            this.fetchPurchaseData();
        },

        mounted: function() {
        },

        methods: {
            fetchPurchaseData: function () {
                $.get('/api/metrics/purchases', null, (purchases) => {
                    purchases.forEach((purchase) => {
                        var index = new Date(purchase.date).getMonth();
                        
                        if(this.purchases[index]) {
                            this.purchases[index] += 1;
                        }
                        else {
                            this.purchases[index] = 1;
                        }
                    });

                    this.initChart();
                });
            },

            initChart: function() {
                this.renderChart({
                    labels: this.labels,
                    datasets: [{
                        label: 'Monthly Purchases',
                        backgroundColor: '#228af9',
                        data: this.purchases
                    }]
                },
                {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                });
            }
        }
    }
</script>