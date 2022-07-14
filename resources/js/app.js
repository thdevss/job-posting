import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



document.getElementById('checkbox-job-all').onclick = function() {
    var checkboxes = document.querySelectorAll('.checkbox-job');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}


document.getElementById('approve-all-job').onclick = function() {
    bulk_update_job('approve_job')
}

document.getElementById('delete-all-job').onclick = function() {
    bulk_update_job('delete')
}

// window. = function() {
function bulk_update_job(action) {
    var checkboxes = document.querySelectorAll('.checkbox-job');

    var hiddenForm = document.createElement('form');
    hiddenForm.setAttribute('action', document.getElementById('bulk-update-url').value);
    hiddenForm.setAttribute('method', 'post');
    hiddenForm.setAttribute('hidden', 'true');

    hiddenForm.appendChild(createElementInForm('_token', document.querySelector('meta[name="csrf-token"]').content))
    hiddenForm.appendChild(createElementInForm('_method', 'PUT'))
    hiddenForm.appendChild(createElementInForm('action', action))


    for (var checkbox of checkboxes) {
        if(checkbox.checked) {
            hiddenForm.appendChild(createElementInForm(checkbox.name, checkbox.value))

        }
    }
    
    document.body.appendChild(hiddenForm);
    hiddenForm.submit();
}


function createElementInForm(name, value) {
    var el = document.createElement('input')
    el.setAttribute('type', 'text')
    el.setAttribute('name', name)
    el.setAttribute('value', value)
    return el
}