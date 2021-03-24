function admin(){
    document.getElementById('admin-verify').style.display = 'block';

}

function student(){
    document.getElementById('admin-verify').style.display = 'none';

}


function check() {
    if (document.getElementById('password2').value.length !== 0) {
        if (document.getElementById('password').value === document.getElementById('password2').value) {

            document.getElementById('message').style.color = "green";
            document.getElementById('message').innerHTML = "passwords match";
            document.getElementById('save').disabled = false;
        } else {

            document.getElementById('message').style.color = "red";
            document.getElementById('message').innerHTML = "passwords do not match";
            document.getElementById('save').disabled = true;
            document.getElementById('reset').disabled = true;
        }
    }
}