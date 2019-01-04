ko.components.register('customer-add-modal', {
    viewModel: function(params) {
        this.addCustomer = () => {
            var fullName = $('#inputFullName').val();
            var package = $("input[name='opt-package']:checked").val();
            var lastPayment = moment(new Date()).format('YYYY-MM-DD HH:mm:ss');
            var totalRevenue = 0;

            switch(package)
            {
                case 'Monthly':
                    totalRevenue = 10000;
                    break;
                case 'Annually':
                    totalRevenue = 60000;
                    break;
                case 'Lifetime':
                    totalRevenue = 100000;
                    break;
            }

            if(fullName.length > 0 && package.length > 0)
            {
                var obj = {
                    fullName: fullName,
                    package: package,
                    lastPayment: lastPayment,
                    totalRevenue: totalRevenue
                };

                postCustomer(obj);
            }
            else
            {
                toastr["error"](`Missing form data.`, 'Error');
            }
        };
    },
    template:
        `<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="inputFullName">Full Name</label>
                                <input type="text" class="form-control" id="inputFullName" aria-describedby="inputFullName" placeholder="Enter full name..." maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="inputPackageType">Package</label>
                                <div id="inputPackageType">
                                    <label class="radio-inline">
                                        <input type="radio" name="opt-package" value="Trial"> Trial
                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="opt-package" value="Monthly"> Monthly
                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="opt-package" value="Annually"> Annually
                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline">
                                        <input type="radio" name="opt-package" value="Lifetime"> Lifetime
                                    </label>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bind="click: addCustomer">Add Customer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>`
});