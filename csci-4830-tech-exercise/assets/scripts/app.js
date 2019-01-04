$(document).ready(() => {
    // define application view model
    var app = function() {
        var self = this;

        self.selected = ko.observable(customerDef);
        self.customers = ko.observableArray([]);

        // get customers
        $.get('./assets/controllers/crud', (resp) => {
            // decode users and store them in observable array
            var db_customers = JSON.parse(resp);
            self.customers(db_customers);

            // init datatable
            $('#customer-list').DataTable(dataTableOptions);

            // implement add-user within datatable context
            $('div.dt-grid-add-user').html(`<button class="btn btn-default" id="add-user" data-toggle="modal" data-target="#addUserModal">Add User</button>`);
            ko.applyBindings(vm, document.getElementById('add-user'));
        });
    };

    // apply knockout bindings
    var vm = new app();
    ko.applyBindings(vm);

    // jasmine tests
    describe('populateCustomersArray', function() {
        var _customers = vm.customers();

        var dummyCustomer = {
            id: 123,
            guid: '123',
            fullName: 'Dummy Customer',
            package: 'Trial',
            lastPayment: "2018-01-23 10:00:00",
            totalRevenue: 0.0
        };

        it('selected customer observable exists', function() {
            expect(vm.selected()).not.toBeNull();
        });

        it('customer observable array exists', function() {
            expect(vm.customers()).not.toBeNull();
        });

        it('should add user to customers observable array', function() {
            vm.customers.push(dummyCustomer);
            expect(vm.customers()).toContain(dummyCustomer);
            vm.customers(_customers);
        });
    });
});