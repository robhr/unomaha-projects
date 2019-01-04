ko.components.register('customer-info-modal', {
    viewModel: function(params) {
        this.selected = params.selected;
    },
    template:
        `<div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-labelledby="userInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="text-shadow: -0.35px -0.35px 0 blue, 0.35px -0.35px 0 blue, -0.35px 0.35px 0 blue, 0.35px 0.35px 0 blue;" class="modal-title" id="userInfoModalLabel">
                            User Information
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Full Name: <span class="user-info-item clipboard" data-bind="text: selected().fullName"></span></label><br>
                        <label>Package: <span class="user-info-item clipboard" data-bind="text: selected().package"></span></label><br>
                        <label>Last Payment: <span class="user-info-item clipboard" data-bind="text: moment(selected().lastPayment).format('lll')"></span></label><br>
                        <label>Total Revenue: <span class="user-info-item clipboard" data-bind="text: new Intl.NumberFormat('en', { style: 'currency', currency: 'USD'}).format(selected().totalRevenue)"></span></label><br>
                        <label>GUID: <span class="user-info-item clipboard" data-bind="text: selected().guid"></span></label><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>`
});