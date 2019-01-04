<template>
    <div>
        <v-toolbar flat color="white">
            <v-toolbar-title>Customer List</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
        </v-toolbar>
        <v-data-table :loading="loading" :headers="headers" :items="customers" :search="search" :pagination.sync="pagination" hide-actions class="elevation-1">
            <template slot="items" slot-scope="props">
                <td class="text-xs-left">
                    <a class="deco-none hover-text-primary" :href="'/customer/' + props.item.id">
                        {{ props.item.username }}
                    </a>
                </td>
                <td class="text-xs-center">{{ props.item.license_key }}</td>
                <td class="text-xs-center">{{ props.item.package }}</td>
                <td class="text-xs-center">{{ props.item.amount }}</td>
                <td class="justify-center layout px-0">
                    <v-icon small @click="() => selected = props.item" data-toggle="modal" data-target="#deletePurchaseModal">
                        delete
                    </v-icon>
                </td>
            </template>
            <template slot="no-data">
                <v-btn color="primary" @click="fetchCustomers">Reset</v-btn>
            </template>
        </v-data-table>
        <div class="text-xs-center pt-2">
            <v-pagination v-model="pagination.page" :length="pages" :total-visible="7"></v-pagination>
        </div>
        <confirmation-modal-component :id="'deletePurchaseModal'" :bodyText="'Are you sure you want to delete this purchase information?'" :confirmText="'Delete'" :confirmAction="deleteItem"></confirmation-modal-component>
    </div>
</template>

<script>
    export default {
        props: [
            'id'
        ],
        data: () => ({
            search: '',
            loading: true,
            pagination: { 
                rowsPerPage: 10,
                totalItems: 0
            },
            selected: {},
            headers: [{
                    text: 'Username',
                    align: 'left',
                    value: 'username'
                },
                {
                    text: 'License Key',
                    align: 'center',
                    value: 'license_key',
                    sortable: false
                },
                {
                    text: 'Package',
                    align: 'center',
                    value: 'package',
                    sortable: false
                },
                {
                    text: 'Amount Paid',
                    align: 'center',
                    value: 'amount',
                    sortable: false
                },
                {
                    text: 'Actions',
                    align: 'center',
                    value: 'name',
                    sortable: false
                }
            ],
            customers: []
        }),

        computed: {
            pages: function() {
                if (this.pagination.rowsPerPage == null || this.pagination.totalItems == null)
                    return 0;

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage);
            }
        },

        beforeMount: function() {
            this.fetchCustomers()
        },

        methods: {
            fetchCustomers: function() {
                $.get('/api/project/' + this.id + '/customers', null, (customers) => {
                    this.customers = customers;
                    this.pagination.totalItems = customers.length;
                    
                    setTimeout(() => {
                        this.loading = false;
                    }, 800);
                });
            },

            deleteItem: function() {
                $.post('/api/project/delete', this.selected, (deleted) => {
                    var index = this.customers.indexOf(this.selected);
                    this.customers.splice(index, 1);
                });
            }
        }
    }
</script>