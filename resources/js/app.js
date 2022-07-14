import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.confirm_action = function() {
    return confirm('are you sure for doing that?')
}

window.onload = function() {
    if(document.getElementById('nav-count-wa-job')) {
        // ajax update
        var request = new XMLHttpRequest();
            request.open('GET', '../../../admin/job/wait_approve/count', true);

            request.onload = function() {
                if (this.status >= 200 && this.status < 400) {
                    // Success!
                    var data = JSON.parse(this.response);
                    if(data.payload.count > 0) {
                        document.getElementById('nav-count-wa-job').innerText = data.payload.count
                        document.getElementById('nav-count-wa-job').classList.remove('hidden')
                    }
                }
            };
            request.send();

        
    }
}

if(document.getElementById('checkbox-job-all')) {
    document.getElementById('checkbox-job-all').onclick = function() {
        var checkboxes = document.querySelectorAll('.checkbox-job');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
}

if(document.getElementById('approve-all-job')) {
    document.getElementById('approve-all-job').onclick = function() {
        if(confirm_action()) {
            bulk_update_job('approve_job')
        }
    }
}

if(document.getElementById('delete-all-job')) {
    document.getElementById('delete-all-job').onclick = function() {
        if(confirm_action()) {
            bulk_update_job('delete')
        }
    }
}

function bulk_update_job(action) {
    // check before process
    var checkboxes = document.querySelectorAll('.checkbox-job:checked');
    if(checkboxes.length < 1) {
        alert('please select some job before doing action')
        return;
    }
    

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