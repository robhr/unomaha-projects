$(document).ready(() => {
    // copy text to clipboard
    $(document).on('click', '.clipboard', (evt) => {
        var text = evt.target.innerHTML;
        if (text != null) {
            if(evt.target.parentElement.parentElement.className === 'modal-body')
            {
                // maybe use findClosest instead?
                var id = evt.target.parentElement.parentElement.parentElement.parentElement.parentElement.id;
                copyToClipboard(text, document.getElementById(id));
            }
            else
            {
                copyToClipboard(text, document.body);
            }
            
            toastr["success"](`The text \"${text}\" was copied to your clipboard.`, 'Success');
        }
    });
});