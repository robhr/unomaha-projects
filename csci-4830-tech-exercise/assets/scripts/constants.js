const customerDef = {
    guid: '',
    fullName: '',
    package: '',
    lastPayment: '',
    totalRevenue: ''
};

const dataTableOptions = {
    paging: true,
    columnDefs: [
        { targets: -1, width: "10%" }
    ],
    "language": {
        "emptyTable": "No data available in table 😢"
    },
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "pageLength": 8,
    "dom": '<"dt-grid-button"B><"dt-grid-add-user">frtip'
};

const postCustomer = (customer) => {
    $.post('./assets/controllers/crud', customer, (resp) => {
        location.reload();
    });
};

const deleteCustomer = (customer) => {
    customer["delete"] = true;
    $.post('./assets/controllers/crud', customer, (resp) => {
        location.reload();
    });
};

const copyToClipboard = (str, context) => {
    const el = document.createElement('textarea');
    el.value = str;
    context.appendChild(el);
    el.select();
    document.execCommand('copy');
    context.removeChild(el);
};