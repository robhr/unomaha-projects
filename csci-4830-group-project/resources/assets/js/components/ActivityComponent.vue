<template>
    <div class="container">
        <div>
            <v-toolbar flat color="white">
                <v-toolbar-title>Activity Log</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
            </v-toolbar>
            <v-data-table :headers="headers" :items="logs" :search="search" :pagination.sync="pagination" hide-actions disable-initial-sort class="elevation-1">
                <template slot="items" slot-scope="props">
                    <td class="text-xs-left">{{ props.item.created_at | moment("from", "now") }}</td>
                    <td class="text-xs-left">{{ props.item.text }}</td>
                </template>
                <template slot="no-data">
                    <v-btn color="primary" @click="fetchLogs">Reset</v-btn>
                </template>
            </v-data-table>
            <div class="text-xs-center pt-2">
                <v-pagination v-model="pagination.page" :length="pages" :total-visible="7"></v-pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            search: '',
            pagination: { 
                rowsPerPage: 10,
                totalItems: 0
            },
            selected: {},
            headers: [{
                    text: 'Timestamp',
                    align: 'left',
                    value: 'created_at',
                },
                {
                    text: 'Message',
                    align: 'left',
                    value: 'text',
                    sortable: false,
                },
            ],
            logs: []
        }),

        computed: {
            pages: function() {
                if (this.pagination.rowsPerPage == null || this.pagination.totalItems == null)
                    return 0;

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage);
            }
        },

        beforeMount: function() {
            this.fetchLogs();
        },

        methods: {
            fetchLogs: function() {
                $.get('/api/logs', null, (logs) => {
                    this.logs = logs;
                    this.pagination.totalItems = logs.length;
                });
            }
        }
    }
</script>