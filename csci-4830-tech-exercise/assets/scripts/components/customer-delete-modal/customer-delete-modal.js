ko.components.register('customer-delete-modal', {
    viewModel: function(params) {
        this.selected = params.selected;
    },
    template:
        `<div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="text-shadow: -0.35px -0.35px 0 red, 0.35px -0.35px 0 red, -0.35px 0.35px 0 red, 0.35px 0.35px 0 red;" class="modal-title" id="userDeleteModalLabel">
                            Delete User
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure that you want to delete <span style="font-weight: bold" data-bind="text: selected().fullName"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" data-bind="click: () => { deleteCustomer(selected()); }">Delete</button>
                    </div>
                </div>
            </div>
        </div>`
});